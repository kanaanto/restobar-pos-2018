<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */

        $this->load->helper('number');
        $this->load->model('admin/orders_model');
        $this->load->model('admin/sales_model');
		$this->load->model('admin/tables_model');
		$this->load->model('admin/products_model');
		$this->load->model('admin/inventory_model');
		$this->load->model('admin/products_inventory_model');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Title Page */
            $this->page_title->push(lang('menu_tables'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            //$this->data['order_list'] = $this->tables_model->order_list();
            $tables = $this->tables_model->get_table_list();
            $orders = $this->orders_model->get_order_list();
            
            foreach($tables as $table){
            	$arr_list = [];
            	$index = 0;
            	foreach($orders as $order){

            		if($order->table_id == $table->table_id && 
            		 	$order->order_slip == $table->current_order_slip &&
            		 	$table->is_occupied == 1){
            		 	$arr_list[$index++] = $order;
            		}
            	}
            	$this->data[$table->table_id] = $arr_list;
            }
			$this->data['table_list'] = $tables;
            $all_tables = $this->tables_model->get_table_count();           
            $vacant = 0;
            $occupied_unpaid = 0;
            $occupied_paid = 0;

            foreach($this->data['table_list'] as $table){
            	if ($table->is_occupied == 1){
	            	if ($table->is_paid == 1){
	            		$occupied_paid++;
	            	}else{
	            		$occupied_unpaid++;
	            	}	
            	} else {
            		$vacant++;
            	}
            }
            $this->data_table['table_list'] = $this->data['table_list'];
            $this->data['table_stats'] = array($all_tables,$vacant,$occupied_unpaid,$occupied_paid);

			$this->data_product['prod_type_list'] = $this->products_model->get_product_types();
			$this->data_product['prod_inv_list'] = $this->products_model->get_available_products_list();
			
			/* Add additional views (modals) */
			$this->data['add_order_modal'] = $this->load->view('admin/orders/add_order_modal', $this->data_product, TRUE);
			$this->data['bill_out_modal'] = $this->load->view('admin/orders/bill_out_modal', NULL, TRUE);
			$this->data['add_move_table_modal'] = $this->load->view('admin/orders/add_move_table_modal', $this->data_table, TRUE);
			$this->data['delete_order_modal'] = $this->load->view('admin/orders/delete_order_modal', NULL, TRUE);
			/* Load Template */			
			$this->template->admin_render('admin/orders/index', $this->data);
			
        }
	}
	
	public function add_table(){
		$table_name = $this->input->post('table_name');
		$this->form_validation->set_rules('table_name', 
										'Table name', 
										'trim|required|is_unique[tables.table_id]',
		array(
			'required' => '%s is required. Please try again.',
			'is_unique' => '%s you entered already exists. Please choose another name.')
		);
		
		$data = array(
			'table_id' => $table_name
		);

		if ($this->form_validation->run() != FALSE){
			//Transfering data
			$this->tables_model->add_table($data); 
			//Reloading view
			$message = "Success. New table name is saved.";
		} else {
			$message = "Fail. Root cause: " . validation_errors();
		}
		//redirect(site_url('/admin/orders?message=' . $message));
		redirect(site_url('/admin/orders'));
	}

	public function add_orders_to_db(){
		$orders = $this->input->post("orders");
		$table_id = $this->input->post("table_id");
		$orders_array = json_decode($orders); 
        $order_slip = 0;
        //check if the table status is occupied, if yes, no need to update
        $table_status = $this->tables_model->get_table_status($table_id);
        if($table_status == 0){ // new set of orders
       		$order_slip = $this->orders_model->get_new_order_slip();
        	// update table status when an order is made
			$status = array(
	            "is_occupied"  => 1,
	            "table_id"	=> $table_id,
	            "order_slip" => $order_slip		
            );

        	$this->tables_model->update_table_status($status);
        } else {
        	$order_slip = $this->tables_model->get_curr_order_slip_by_tid($table_id);
        }
        foreach($orders_array->orders as $order){
           	$add_order_product = $order->item;
			$add_pmt_status = $order->status;
			$add_order_amt = $order->unit_price;
			$add_order_qty = $order->qty;
	        //"up" for Unpaid Cash, "p" for Paid Cash, "sd" for Salary Deduction; "oth" for On the House

			switch($add_pmt_status){
				case "unpaid":
					$add_pmt_status = "up";
					break;
				case "paid":
					$add_pmt_status = "p";
					break;
			}
			//1. add each order to orders db
	        $order_row = array(
	            "product_id"      => $add_order_product,
	            "payment_type" => $add_pmt_status,
	            "price"        => $add_order_amt,
	            "qty"		   => $add_order_qty,
	            "user_id"      => $this->ion_auth->user()->row()->id,
	            "order_slip"   => $order_slip,
	            "table_id"	   => $table_id
	       		 );


			$this->orders_model->add_order_to_db($order_row); 

			//subtract each order from inventory db 
			$prod_inv_array = $this->products_inventory_model->get_inv_by_prod_id($add_order_product);			
			foreach($prod_inv_array->result() as $prod_inv){
				$this->inventory_model->update_inventory_item($prod_inv->inventory_id, $prod_inv->qty);
			}

			//if payment_type is paid (paid, on the house, salary deduction), save to sales db as well
			if($add_pmt_status != "up"){
				$sales_row = array(
	            "table_id" 		=> $table_id,
	            "order_slip"   	=> $order_slip,
	            "user_id"      	=> $this->ion_auth->user()->row()->id,
	            "total_amount"  => $add_order_amt,
	            "product_id"	=> $add_order_product,
	            "payment_type" => $add_pmt_status
	        	);
				$this->sales_model->add_sales_to_db($sales_row);
			}

        }

	}

	public function delete_order_from_db(){
		$order_id = $this->input->post("order_id");
		$this->orders_model->delete_order_from_db($order_id); 
	}

	public function edit_order_in_db(){
		$order_id = $this->input->post("order_id");
		$product_id = $this->input->post("product_id");
		$qty = $this->input->post("qty");
		$status = $this->input->post("status");

		switch($status){
			case "unpaid":
				$status = "up";
				break;
			case "paid":
				$status = "p";
				break;
		}
		$data = array(
               'product_id' => $product_id,
               'qty' => $qty,
               'payment_type' => $status
            );
		/*
		                        product_id : order_product_id,
                        qty : order_qty,
                        status : order_status
		*/
		$this->orders_model->edit_order_in_db($order_id,$data); 
	}
	public function get_amount_unpaid_orders(){
		$order_slip = $this->input->post("order_slip");
		$data = array('order_slip' => $order_slip, 'payment_type' => 'up');
		$total_amount = $this->orders_model->get_amount_unpaid_orders($data);
         
	}

	public function move_table_orders(){
		$order_slip = $this->input->post("order_slip");
		$to_table = $this->input->post("to_table");
		
		$this->tables_model->move_table_orders($order_slip, $to_table);
		$this->tables_model->move_table_orders($order_slip, $to_table);
	}
	public function edit_sales_in_db(){}
	public function delete_sales_from_db(){}
}

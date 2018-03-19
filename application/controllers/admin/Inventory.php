<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
		//$this->page_title->push("Inventory");
        $this->page_title->push(lang('menu_inventory'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_inventory'), 'admin/inventory');

        /*Load Form Helper*/
        $this->load->helper('form');

        /*Load Model*/
        $this->load->model('admin/inventory_model');
    }


	public function index()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /*Get Bar Inventory List*/
            $this->data['bar_list'] = $this->inventory_model->get_bar_inventory_list();

            /*Get Kitchen Inventory List*/
            $this->data['kitchen_list'] = $this->inventory_model->get_kitchen_inventory_list();

            $this->data['add_inventory_modal'] = $this->load->view('admin/inventory/add_inventory_modal', NULL, TRUE);

            $this->data['edit_inventory_modal'] = $this->load->view('admin/inventory/edit_inventory_modal', NULL, TRUE);
            /* Load Template */
            $this->template->admin_render('admin/inventory/index', $this->data);
        }
	}

    public function add_inventory_item(){
        $this->form_validation
            ->set_rules($this->input->post("new_item_name"),"New Item", "trim|required");
        $data = array(
            "inv_name"      => $this->input->post("new_item_name"),
            "qty"           => $this->input->post("new_item_qty"),
            "min_value"     => $this->input->post("new_item_min_value"),
            "is_kitchen"    => $this->input->post("new_item_in_kitchen")
        );
        //if ($this->form_validation->run() != FALSE && isset($_POST) && ! empty($_POST)){
            $this->inventory_model->add_inventory_item($data);
        //}
        //else{

        //}
        
        redirect(site_url('/admin/inventory'));
    }

    public function update_inventory_item(){
        $this->form_validation
                ->set_rules($this->input->post("item_id"), "Edit ID", "trim|required");
        $data = array(
                "inventory_id"  => $this->input->post("item_id"),
                "inv_name"      => $this->input->post("item_name"),
                "qty"       => $this->input->post("item_beg"),
                "inv_in"        => $this->input->post("item_in"),
                "inv_out"       => $this->input->post("item_out")
        );

        //if ($this->form_validation->run() != FALSE && isset($_POST) && ! empty($_POST)){
            $this->inventory_model->update_inventory_item($data);
        //}
        //else{
            
        //}
        
        redirect(site_url('/admin/inventory'));

    }

    public function get_inventory_items_autocomplete(){
        $list = $this->inventory_model->get_inventory_autocomplete($this->input->get("query"));
        header('Content-Type: application/json');
        print json_encode(array("suggestions"=>$list->result()));
        //print json_encode($list->result());
        die;
    }
}

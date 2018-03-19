<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_products'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_products'), 'admin/products');

        /*Load Helper*/
        $this->load->helper("form");
        $this->load->helper('url');

        /*Load Model*/
        $this->load->model('admin/products_model');
        $this->load->model('admin/inventory_model');
        $this->load->model('admin/products_inventory_model');
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

            /*List of Bar Products*/
            $this->data['products_list_bar'] = $this->products_model->get_bar_prods();

            /*List of Kitchen Products*/
            $this->data['products_list_kitchen'] = $this->products_model->get_kitchen_prods();

            /* Load Template */
            $this->template->admin_render('admin/products/index', $this->data);
        }
	}

    /* Add Product Display*/
    public function add_product(){
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /*List Units*/
            $this->data['prod_types'] = $this->products_model->get_prod_types();
            
             /*List Prod Types*/
            $this->data['prod_units'] = $this->products_model->get_prod_unit();

            /*Load Template*/
            $this->template->admin_render('admin/products/add_product', $this->data);

        }
    }

    /* Add Product Logic*/
    public function insert_product(){
        $this->form_validation
            ->set_rules($this->input->post("prod_name"),"New Product", "trim|required");
        $data = array(
            
            "prod_name"     => $this->input->post("prod_name"),
            "prod_type_id"  => $this->input->post("prod_menu_group"),
            "is_available"  => $this->input->post("prod_is_available"),
            "price"         => $this->input->post("prod_price"),
            "unit"          => $this->input->post("prod_unit")
        );

        $inserted_product_id = $this->products_model->insert_product_db($data);
        
        foreach($this->input->post("prod_affected_inv_id") as $key => $inventory_id){
            $prod_inv = array(
                "inventory_id"  => $inventory_id,
                "product_id"    => $inserted_product_id,
                "qty"           => $this->input->post("prod_affected_qty")[$key]
            );
            $this->products_inventory_model->add_products_inventory($prod_inv);
        }
        redirect(site_url('/admin/products'));
    }

    /* Edit Product Display*/
    public function edit_product(){
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /*List Units*/
            $this->data['prod_types'] = $this->products_model->get_prod_types();
            
             /*List Prod Types*/
            $this->data['prod_units'] = $this->products_model->get_prod_unit();

            /*Product Details*/
            $this->data['prod_details'] = $this->products_model->get_product_details($this->input->get("prod_id"));

            /*Product Invetory*/
            $this->data['prod_inventory'] = $this->products_inventory_model->get_products_inventory($this->input->get('prod_id'));

            /*Load Template*/
            $this->template->admin_render('admin/products/edit_product', $this->data);

        }
    }

    /* Edit Product Logic*/
    public function update_product(){
        $this->form_validation
            ->set_rules($this->input->post("prod_is_kitchen"),"New Product", "trim|required");
        $id = $this->input->post("product_id");
        $data = array(
            "prod_name"     => $this->input->post("prod_name"),
            "prod_type_id"  => $this->input->post("prod_menu_group"),
            "is_available"  => $this->input->post("prod_is_available"),
            "price"         => $this->input->post("prod_price"),
            "unit"          => $this->input->post("prod_unit")
        );

        $updated_product_id = $this->products_model->update_product_db($id, $data);
        
        foreach($this->input->post("prod_affected_inv_id") as $key => $inventory_id){
            $prod_inv = array(
                "inventory_id"  => $inventory_id,
                "product_id"    => $id,
                "qty"           => $this->input->post("prod_affected_qty")[$key]
            );
            $this->products_inventory_model->update_products_inventory($prod_inv);
        }
        redirect(site_url('/admin/products'));
    }
}

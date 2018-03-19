<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_product_types(){
        $this->db->from('prod_types');
        $this->db->order_by('prod_type_name');
        $query = $this->db->get();
        return $query;
    }

    public function get_products_list()
    {
        $query = $this->db->get('products');
		return $query;

    }

    public function get_available_products_list(){
        $this->db->select('*');
        $this->db->from('prod_inv_view');
        $this->db->where('is_available', '1');
        $this->db->order_by('prod_type_name', 'prod_name','price');
        $query = $this->db->get();
        return $query;       
    }

    public function get_bar_prods(){
        $this->db->select('*, GROUP_CONCAT(aff_inv) AS inv_name_qty');
        $this->db->from('prod_inv_view');
        
        $this->db->where('is_kitchen', '0');
        $this->db->group_by("product_id");
        $this->db->order_by('prod_type_name ASC', 'unit DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_kitchen_prods(){
        $this->db->select('*, GROUP_CONCAT(aff_inv) AS inv_name_qty');
        $this->db->from('prod_inv_view');
        
        $this->db->where('is_kitchen', '1');
        $this->db->group_by("product_id");
        $this->db->order_by('prod_type_name ASC', 'unit DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_prod_unit(){
        $this->db->select('unit');
        $this->db->distinct();
        $query = $this->db->get('products');
        return $query;
    }

    public function get_prod_types(){
        $this->db->select('prod_type_id, prod_type_name');
        $query = $this->db->get('prod_types');
        return $query;
    }

    public function insert_product_db($data)
	{
		$this->db->insert('products',$data);
        return $this->db->insert_id();
    } 

    public function update_product_db($id, $data){
        $this->db->set($data);
        $this->db->where('product_id', $id);
        $this->db->update('products');
    }

    public function get_product_details($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
}

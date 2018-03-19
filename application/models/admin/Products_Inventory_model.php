<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_Inventory_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function add_products_inventory($data)
	{
		$this->db->insert('prod_inv',$data);
    } 

    public function get_products_inventory($id){
    	$this->db->select('prod_inv.*, inventories.inv_name');
    	$this->db->from('prod_inv');
    	$this->db->join('inventories','prod_inv.inventory_id = inventories.inventory_id','left');
    	$this->db->where('prod_inv.product_id',$id);
    	return $this->db->get();
    }

    public function update_products_inventory($data){
    	$this->db->replace('prod_inv', $data);
    }


    public function get_inv_by_prod_id($prod_id){
        $this->db->select('inventory_id, qty');
        $this->db->where('product_id',$prod_id);
        $query = $this->db->get('prod_inv');
        return $query;
    }

}

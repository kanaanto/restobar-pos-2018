<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_inventory_items(){
        $this->db->select('inventory_id, inv_name');
        $query = $this->db->get('inventories');
        return $query;
    }

    public function get_inventory_autocomplete($query){
        $this->db->select('inv_name AS value, inventory_id AS data');
        $this->db->like('inv_name',$query);
        $query = $this->db->get('inventories');
        return $query;
    }

    public function get_bar_inventory_list(){
        $this->db->select('*');
        $this->db->where('is_kitchen','0');
        $query = $this->db->get('inventories');
        return $query;
    }

    public function get_kitchen_inventory_list(){
        $this->db->select('*');
        $this->db->where('is_kitchen','1');
        $query = $this->db->get('inventories');
        return $query;
    }

    public function add_inventory_item($data){
        $this->db->insert("inventories", $data);
    }

    public function update_inventory_item($inventory_id, $qty){
        $this->db->set('qty', 'qty-' . $qty, FALSE);
        $this->db->where('inventory_id', $inventory_id);
        $this->db->update('inventories'); 
        //$this->db->replace("inventories", $data);
    }

}

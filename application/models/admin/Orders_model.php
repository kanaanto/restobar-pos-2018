<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_prod_type_list()
    {
        $query = $this->db->get('prod_types');
		return $query;

    }

    public function get_count_record($table)
    {
        $query = $this->db->count_all($table);
        return $query;
    }

    public function get_records_by_table_name($table_id){
        $query = $this->db->get($table_id);
		return $query;
    }

    public function add_order_to_db($order){
        $this->db->insert("orders", $order);
    }

    // public function get_order_by_table_id($table_id){
        
    //     $this->db->select('*');
    //     $this->db->where('table_id', $table_id);
    //     $query = $this->db->get('orders');
    //     return $query;
    // }
    public function get_order_list(){
        $this->db->select('order_id, table_id, order_slip, o.product_id, CONCAT(CONCAT(CONCAT(prod_name," ("), unit), ")") as "prod_name", qty, (o.price * qty) as "total_price", p.price as "unit_price", u.first_name, payment_type');
        $this->db->from('orders o');
        $this->db->join('products p', 'o.product_id = p.product_id');
        $this->db->join('users u', 'o.user_id = u.id');
        

        $query = $this->db->get();
        return $query->result();
    }
    public function get_new_order_slip(){
        $this->db->select('IFNULL(MAX(order_slip), 0) + 1 AS "order_slip"');
        $query = $this->db->get('orders');
        return $query->row()->order_slip;
    }

    public function delete_order_from_db($order_id){
        $this->db->where('order_id',$order_id);
        $this->db->delete('orders');
    }

    public function edit_order_in_db($order_id, $data){
        $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data); 
    }
    public function get_amount_unpaid_orders($data){
        $this->db->select('sum(price) as "total_amount"');
        $this->db->where($data);
        $query = $this->db->get('orders');
        return $query->row()->total_amount;    
    }
}

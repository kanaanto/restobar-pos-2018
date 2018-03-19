<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends CI_Model {
    // columns: sales_id, table_id, order_slip, user_id, datetime, total_amount, product_id
    public function __construct()
    {
        parent::__construct();
    }


    public function get_sales_per_date($from_date, $to_date){

    }

    public function get_sales_per_order_slip($order_slip){

    }

    public function get_sales_per_order_id($order_id){

    }

    public function get_sales_per_product_date($product_id, $from_date, $to_date){

    }

    public function add_sales_to_db($sales){
        $this->db->insert("sales", $sales);
    }

    public function edit_sales($sales_id){
        $this->db->where('sales_id', $sales_id);
        $this->db->update('sales', $data); 
    }

    public function delete_sales($sales_id){
        $this->db->where('sales_id',$sales_id);
        $this->db->delete('sales');
    }
}

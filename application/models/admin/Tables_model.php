<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }


    public function get_table_list()
    {
        $query = $this->db->get('tables');
		return $query->result();
    }
    public function get_table_order_list()
    {
        $this->db->from('tables t');
        $this->db->join('orders o', 't.table_id = o.table_id'); 
        $query = $this->db->get();
        return $query->result();
    }
    public function get_table_count()
    {
        $query = $this->db->count_all('tables');
        return $query;

    }    

    public function add_table($data)
	{
		$this->db->insert('tables',$data);
    } 

    public function get_table_status($table_id){
        $this->db->where('table_id', $table_id);
        $this->db->from('tables'); 
        $this->db->limit(1);
        $query = $this->db->get()->row()->is_occupied;

        //$query = $this->db->select('is_occupied')->from('tables')->where('table_id', $table_id);        
        return $query;       
    }
    public function update_table_status($data){
        $this->db->where('table_id',$data['table_id']);
        $row = array(
            'is_occupied' => $data['is_occupied'],
            'current_order_slip' =>$data['order_slip']);
        $this->db->update('tables', $row);
    }

    public function get_curr_order_slip_by_tid($table_id){
        $this->db->where('table_id', $table_id);
        $this->db->from('tables'); 
        $query = $this->db->get()->row()->current_order_slip;
        return $query;
    }

    public function move_table_orders($order_slip, $to_table){
        $this->db->set('table_id', $to_table, FALSE);
        $this->db->where('current_order_slip', $order_slip);
        $this->db->update('tables'); 
    }
}

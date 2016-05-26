<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{
    public function save($data){
            $this->db->insert('t_admin_user',$data);
            return $this->db->affected_rows();
    }
    public function check_by_username_password($username,$password){
            $query = $this->db->get_where("t_admin_user",array("username"=>$username,"password"=>$password));
            return $query->row();
    }
    public function get_all_user(){
            $this->db->select('*');
            $this->db->from('t_user');
            return $this->db->get()->result();
    }
    public function get_all_product(){
            $this->db->select('*');
            $this->db->from('t_product');
            return $this->db->get()->result();
    }
    public function select_all_order(){
        $this->db->select('*');
        $this->db->from('t_order');
        return $this->db->get()->result();
    }
    public function select_all_order_item($order_id,$user_id){
        $this->db->select('*');
        $this->db->from('t_order_item');
        $this->db->join('t_product','t_product.product_id=t_order_item.product_id');
        $this->db->join('t_product_color','t_product_color.product_color_id=t_order_item.color');
        $this->db->join('t_product_size','t_product_size.product_size_id=t_order_item.size');
        $this->db->join('t_user','t_user.user_id=t_order_item.user_id');
        $this->db->where('t_order_item.order_id',$order_id);
        $this->db->where('t_user.user_id',$user_id);
        return $this->db->get()->result();
    }
    public function select_order_by_state($state){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->where('order_state',$state);
        return $this->db->get()->result();
    }
    public function update_state($id){
        $this->db->where('order_id',$id);
        $this->db->update('t_order',array('order_state'=>1));
    }

}
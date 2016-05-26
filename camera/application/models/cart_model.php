<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart_model extends CI_Model{
    public function add_to_tollery($arr)
    {
        $this->db->insert('t_cart',$arr);
    }
    public function check_all_product_by_userid($user_id)
    {
        $this->db->select('t_product.*,size.*,color.*,t_cart.*');
        $this->db->from('t_cart');
        $this->db->join('t_product','t_product.product_id=t_cart.product_id');
        $this->db->join('t_product_size size','size.product_size_id=t_cart.product_size_id');
        $this->db->join('t_product_color color','color.product_color_id=t_cart.product_color_id');
        $this->db->where('t_cart.user_id',$user_id);
        return $this->db->get()->result();
    }
    public function del_pro_by_id($user_id,$id){
        $this->db->where('t_cart.user_id',$user_id);
        $this->db->where('t_cart.cart_id',$id);
        $this->db->delete('t_cart');
    }
    public function del_pros_by_id($user_id,$id){
        $this->db->where('t_cart.user_id',$user_id);
        $this->db->where_in('t_cart.cart_id',$id);
        $this->db->delete('t_cart');
    }
}
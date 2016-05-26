<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order_model extends CI_Model{
    public function save_order($user_id){
        $this->db->insert('t_order',array('user_id'=>$user_id));
        return $this->db->insert_id();
    }
    public function save_order_item($arr)
    {
        $this->db->insert('t_order_item',$arr);
    }
    public function select_pro_by_id($products_id,$user_id){
        $this->db->select('t_product.*,size.*,color.*,t_cart.cart_amount');
        $this->db->from('t_cart');
        $this->db->join('t_product','t_product.product_id=t_cart.product_id');
        $this->db->join('t_product_size size','size.product_size_id=t_cart.product_size_id');
        $this->db->join('t_product_color color','color.product_color_id=t_cart.product_color_id');
        $this->db->where('t_cart.user_id',$user_id);
        $this->db->where_in('t_product.product_id',$products_id);
        return $this->db->get()->result();
    }
    public function update_num_by_id($products_id,$num)
    {
        $this->db->where('product_id',$products_id);
        $this->db->update('t_cart',array('cart_amount'=>$num));
    }
    public function del_cart_pro_by_id($products_id){
        $this->db->where_in('t_cart.product_id',$products_id);
        $this->db->delete('t_cart');
    }
    public function select_all_order_by_id($user_id){
        $this->db->select('*');
        $this->db->from('t_order');
        $this->db->where('t_order.user_id',$user_id);
        return $this->db->get()->result();
    }
    public function select_all_order_item($order_id){
        $this->db->select('*');
        $this->db->from('t_order_item');
        $this->db->join('t_product','t_product.product_id=t_order_item.product_id');
        $this->db->join('t_product_color','t_product_color.product_color_id=t_order_item.color');
        $this->db->join('t_product_size','t_product_size.product_size_id=t_order_item.size');
        $this->db->where('t_order_item.order_id',$order_id);
        return $this->db->get()->result();
    }
    public function open_huiyuan_by_id($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->update('t_order_item',array('discount'=>0.8));
    }
    public function update_state($id){
        $this->db->where('order_id',$id);
        $this->db->update('t_order',array('order_state'=>2));
    }
}
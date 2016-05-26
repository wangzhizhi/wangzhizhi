<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model{
    public function get_all_product(){
        $this->db->select('*');
        $this->db->from('t_product');
        return $this->db->get()->result();
    }
    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('t_product');
        $this->db->where('t_product.product_id',$id);
        return $this->db->get()->row();
    }
    public function get_product_by_val($val)
    {
        $this->db->like('product_name',$val);
        $this->db->or_like('product_introduce',$val);
        $this->db->or_like('product_kind',$val);
        return $this->db->get('t_product')->result();
    }
}
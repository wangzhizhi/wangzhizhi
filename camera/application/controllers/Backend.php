<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class backend extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    //跳转主页
    public function index()
    {
        if($username = $this->session->userdata('login_user')){
            $username = $this->session->userdata('login_user')->username;
            $user = $this->admin_model->get_all_user();
            $data = array(
                'username'=>$username,
                'users'=>$user
            );
            $this->load->view('user',$data);
        }else{
            $this->load->view('login');
        }

    }
    //跳转登录页面
    public function login()
    {
        $this->load->view('login');
    }
    //跳转注册页面
    public function reg()
    {
        $this->load->view('reg');
    }
    //跳转所有订单页面
    public function order()
    {
        if($username = $this->session->userdata('login_user')){
            $username = $this->session->userdata('login_user')->username;
            $orders = $this->admin_model->select_all_order();
            foreach($orders as $order){
                $amount_price = 0;
                $order->items = $this->admin_model->select_all_order_item($order->order_id,$order->user_id);
                foreach($order->items as $item){
                    $price_count = $item->product_price * $item->amount;
                    $amount_price += $price_count;
                    $name = $item->username;
                }
                $order->price_count = $amount_price;
                $order->name = $name;
            }
            $data = array(
                'username'=>$username,
                'orders'=>$orders
            );
            $this->load->view('order2',$data);
        }else{
            $this->load->view('login');
        }

    }
    //跳转未完成订单页面
    public function order_no()
    {
        if($username = $this->session->userdata('login_user')){
            $username = $this->session->userdata('login_user')->username;
            $orders = $this->admin_model->select_order_by_state(0);
            foreach($orders as $order){
                $amount_price = 0;
                $order->items = $this->admin_model->select_all_order_item($order->order_id,$order->user_id);
                foreach($order->items as $item){
                    $price_count = $item->product_price * $item->amount;
                    $amount_price += $price_count;
                    $name = $item->username;
                }
                $order->price_count = $amount_price;
                $order->name = $name;
            }
            $data = array(
                'username'=>$username,
                'orders'=>$orders
            );
            $this->load->view('order_no',$data);
        }else{
            $this->load->view('login');
        }

    }
    //跳转等待买家收获订单页面
    public function order_mid()
    {
        if($username = $this->session->userdata('login_user')){
            $username = $this->session->userdata('login_user')->username;
            $orders = $this->admin_model->select_order_by_state(1);
            foreach($orders as $order){
                $amount_price = 0;
                $order->items = $this->admin_model->select_all_order_item($order->order_id,$order->user_id);
                foreach($order->items as $item){
                    $price_count = $item->product_price * $item->amount;
                    $amount_price += $price_count;
                    $name = $item->username;
                }
                $order->price_count = $amount_price;
                $order->name = $name;
            }
            $data = array(
                'username'=>$username,
                'orders'=>$orders
            );
            $this->load->view('order_mid',$data);
        }else{
            $this->load->view('login');
        }

    }
    //跳转已完成订单页面
    public function order_over()
    {
        if($username = $this->session->userdata('login_user')){
            $username = $this->session->userdata('login_user')->username;
            $orders = $this->admin_model->select_order_by_state(2);
            foreach($orders as $order){
                $amount_price = 0;
                $order->items = $this->admin_model->select_all_order_item($order->order_id,$order->user_id);
                foreach($order->items as $item){
                    $price_count = $item->product_price * $item->amount;
                    $amount_price += $price_count;
                    $name = $item->username;
                }
                $order->price_count = $amount_price;
                $order->name = $name;
            }
            $data = array(
                'username'=>$username,
                'orders'=>$orders
            );
            $this->load->view('order_over',$data);
        }else{
            $this->load->view('login');
        }

    }
    //跳转所有商品页面
    public function product()
    {
        if($username = $this->session->userdata('login_user')){
            $username = $this->session->userdata('login_user')->username;
            $result = $this->admin_model->get_all_product();
            $data = array(
                'username'=>$username,
                'products'=>$result
            );
            $this->load->view('product',$data);
        }else{
            $this->load->view('login');
        }

    }
    //执行管理员注册操作
    public function do_reg()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($username == "" || $password == ""){
            $this->load->view('reg_error2');
        }else{
            $data = array(
                'username'=>$username,
                'password'=>$password
            );
            $this->admin_model->save($data);
            $this->load->view('reg_success');
        }

    }
    //执行管理员登录操作
    public function do_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->admin_model->check_by_username_password($username,$password);
        if($user){
            $this->session->set_userdata("login_user",$user);
            redirect('backend/index');
        }else{
            $this->load->view('login_error2');
        }
    }
    //执行注销操作

    public function logout()
    {
        $this->session->unset_userdata('login_user');
        redirect('backend/login');
    }
    //更新订单状态操作
    public function update_state()
    {
        $id = $this->input->get('id');
        $this->admin_model->update_state($id);
        redirect('backend/order');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    //连接model
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("product_model");
        $this->load->model('cart_model');
        $this->load->model('order_model');
    }
    //跳到主页
    public function index()
    {
        $re = $this->product_model->get_all_product();
        $result = array(
            'result'=>$re
        );
        $this->load->view('index',$result);

    }
    //主页查找所有商品
    public function check_product()
    {
        $val = $this->input->get('data');
        $res = $this->product_model->get_product_by_val($val);
        echo json_encode($res);
    }
    //跳到商品详情页面(根据商品id显示详细信息)
    public function order_detal()
    {
        if($this->session->userdata('login_user')) {
            $id = $this->input->get('id');
            $re = $this->product_model->get_product_by_id($id);
            $result = array(
                'result' => $re
            );
            $this->load->view('order_detal', $result);
        }else{
            $this->load->view('index');
        }
    }
    //立即付款提交订单页面
    public function order_up()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $id = $this->input->get('id');
        $size = $this->input->get('size');
        $color = $this->input->get('color');
        $num = $this->input->get('num');
        $re = $this->product_model->get_product_by_id($id);
        $user = $this->user_model->get_user_by_id($user_id);
        $num_price = $re->product_price * $num;
        $result = array(
            'result'=>$re,
            'size'=>$size,
            'user'=>$user,
            'color'=>$color,
            'num'=>$num,
            'num_price'=>$num_price,
            'products'=>false
        );
        $this->load->view('order_up',$result);
    }
    //购物车结算提交订单
    public function order_up_all()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $products_id = $this->input->get('prod');
        $num = $this->input->get('num');
        $products_id = explode(',', $products_id);
        $num = explode(',', $num);
        for($i=0;$i<count($products_id);$i++) {
            $this->order_model->update_num_by_id($products_id[$i],$num[$i]);
        }
        $user = $this->user_model->get_user_by_id($user_id);
        $products = $this->order_model->select_pro_by_id($products_id,$user_id);
        $amount_prices = 0;
        foreach($products as $product){
            $num = $product->cart_amount;
            $price = $product->product_price;
            $product->amount_price = $num*$price;
            $amount_prices+=$num*$price;
        }
        $res = array(
            'products'=>$products,
            'user'=>$user,
            'amount_prices'=>$amount_prices
        );
        $this->load->view('order_up',$res);
    }
    //跳转到支付页面
    public function pay()
    {
        $color = $this->input->get('color');
        $size = $this->input->get('size');
        $user_id = $this->session->userdata('login_user')->user_id;
        $id = $this->input->get('id');
        $num = $this->input->get('num');
        $price = $this->input->get('price');
        $order_id = $this->order_model->save_order($user_id);
        $result = $this->user_model->get_user_by_id($user_id);
        $discount = 1;
        if($result->is_huiyuan == 1){
            $discount = 0.8;
        }
        $arr = array(
            'size'=>$size,
            'color'=>$color,
            'product_id'=>$id,
            'amount'=>$num,
            'order_id'=>$order_id,
            'price'=>$price,
            'user_id'=>$user_id,
            'discount'=>$discount
        );
        $this->order_model->save_order_item($arr);
        $this->load->view('pay');
    }
    //购物车支付
    public function pay_all()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $products_id = $this->input->get('prod');
        $products_id = explode(',', $products_id);
        $products = $this->order_model->select_pro_by_id($products_id,$user_id);
        $order_id = $this->order_model->save_order($user_id);
        $result = $this->user_model->get_user_by_id($user_id);
        $discount = 1;
        if($result->is_huiyuan == 1){
            $discount = 0.8;
        }
        foreach($products as $product){
           $arr = array(
               'size'=>$product->product_size_id,
               'color'=>$product->product_color_id,
               'product_id'=>$product->product_id,
               'amount'=>$product->cart_amount,
               'order_id'=>$order_id,
               'price'=>$product->product_price,
               'user_id'=>$user_id,
               'discount'=>$discount
           );
            $this->order_model->save_order_item($arr);
        }
        $this->order_model->del_cart_pro_by_id($products_id);
        $this->load->view('pay');
    }
    //从购物车中删除单个商品
    public function del_product()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $id = $this->input->get('id');
        $this->cart_model->del_pro_by_id($user_id,$id);
    }
    //从购物车中删除多个商品
    public function del_products()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $id = $this->input->get('id');
        $id = explode(',', $id);
        $this->cart_model->del_pros_by_id($user_id,$id);
    }
    //跳到个人信息页面
    public function personal()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $result = $this->user_model->get_user_by_id($user_id);
        $re = array(
            'result'=>$result
        );
        $this->load->view('personal',$re);
    }
    public function open_huiyuan(){
        $user_id = $this->session->userdata('login_user')->user_id;
        $this->user_model->open_huiyuan_by_id($user_id);
        $this->order_model->open_huiyuan_by_id($user_id);
        $this->load->view('huiyuan');
    }
    //跳到购物车页面并且查找购物车内商品
    public function tollery()
    {
        if($this->session->userdata('login_user')){
            $user_id = $this->session->userdata('login_user')->user_id;
            $result = $this->cart_model->check_all_product_by_userid($user_id);
            foreach($result as $pro){
                $price =  $pro->product_price;
                $amount = $pro->cart_amount;
                $pro->amount_price = $price*$amount;
            }
            $arr = array(
                'products'=>$result
            );
            $this->load->view('tollery',$arr);
        }else{
            $this->index();
        }

    }
    //跳到订单页面
    public function order()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $orders = $this->order_model->select_all_order_by_id($user_id);
        foreach($orders as $order){
            $amount_price = 0;
            $order->items = $this->order_model->select_all_order_item($order->order_id);
            foreach($order->items as $item){
                $price_count = $item->product_price * $item->amount;
                $amount_price += $price_count;
            }
            $order->price_count = $amount_price;
        }
        $results = array(
            'results'=>$orders
        );
        $this->load->view('order',$results);
    }
    //跳到联系我们页面
    public function contact()
    {
        $this->load->view('contact');
    }
    //跳到注册失败页面
    public function reg_error()
    {
        $this->load->view('reg_error');
    }
    //跳到登录错误页面
    public function login_error()
    {
        $this->load->view('login_error');
    }
    //注册前姓名查重
    public function check_username(){
        $name = $this->input->get('name');
        $result = $this->user_model->check_name($name);
        if($result){
            echo 'file';
        }else{
            echo 'success';
        }
    }
    //执行注册操作
    public function do_reg()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $address = $this->input->post('address');
        if($username == "" || $password == "" || $phone == "" || $address ==""){
            redirect('user/reg_error');
        }else{
            $data = array(
                'username'=>$username,
                'password'=>$password,
                'phone'=>$phone,
                'address'=>$address
            );
            $this->user_model->save($data);
            redirect('user/index');
        }
    }
    //检查登录操作
    public function check_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->user_model->get_by_username_password($username,$password);
        if($user){
            $this->session->set_userdata("login_user",$user);
            redirect('user/index');
        }else{
            redirect('user/login_error');
        }
    }
    //注销操作
    public function logout()
    {
        $this->session->unset_userdata('login_user');
        redirect('user/index');
    }
    //商品添加到购物车页面
    public function add_to_tollery()
    {
        $user_id = $this->session->userdata('login_user')->user_id;
        $id = $this->input->get('id');
        $size = $this->input->get('size');
        $color = $this->input->get('color');
        $num = $this->input->get('num');
        $arr = array(
            'product_id'=>$id,
            'user_id'=>$user_id,
            'product_size_id'=>$size,
            'product_color_id'=>$color,
            'cart_amount'=>$num
        );
        $this->cart_model->add_to_tollery($arr);
    }
    //更新订单状态
    public function update_state()
    {
        $id = $this->input->get('id');
        $this->order_model->update_state($id);
        redirect('user/order');
    }
}

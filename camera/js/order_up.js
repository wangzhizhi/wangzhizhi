$(function(){
    var arr = new Array();
    var $orders = $('.order img');
    for(var i=0; i<$orders.length; i++){
        arr.push($orders.eq(i).data('id'));
    }
    $('.sub').on('click', function(){
        location.href="user/pay_all?prod="+arr;
    });
});
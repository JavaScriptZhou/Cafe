<template>
    <div class="user_order_detail">
        <top></top>

        <div class="user-orderlist">
            <div class="user-orderlist-header">
                <h3>已完成</h3>
                <p>感谢您的光临 Good Luck!</p>
                <button>再来一单</button>
            </div>

            <div class="panel panel-default orderitem">
                <div class="panel-heading">外卖订单: 32265231542162<span>2018-11-04 13:06</span></div>
                <div class="panel-body">
                    <div class="row a_row">
                        <div class="col-xs-8">
                            <p class="p1">榛果拿铁</p>
                            <p class="p2">大/单糖/热</p>
                            <p class="p1">配送费</p>
                            <br />
                            <p class="p4">优惠券</p>
                        </div>
                        <div class="col-xs-2">
                            <span>x1</span>
                        </div>
                        <div class="col-xs-2">
                            <span>¥ 27</span>
                            <span>¥ 6</span>
                            <span class="p4">- ¥ 6</span>
                        </div>
                    </div>
                    <div class="row b_row">
                        <div class="col-xs-8">
                            <p class="p1">共1件商品</p>
                        </div>
                        <div class="col-xs-4">
                            <p class="p1 p1_price">实付 ¥ 27</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default orderitem">

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <p class="p2">收货地址</p>
                        </div>
                        <div class="col-xs-8">
                            <p class="p2 p2_footer">成华区建设路1号</p><br />
                            <p class="p2 p2_footer">周先生 15928053774</p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4">
                            <p class="p2">送达时间</p>
                        </div>
                        <div class="col-xs-8">
                            <p class="p2 p2_footer">2018-11-04 18:42</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</template>

<script>
    export default {
        name: "Userorderdetail"
    }
</script>

<style scoped>
    body{
        width: 100%;
        height: 100%;
        background-color: #EEEEEE;

    }
    .user_order_detail{
        padding: 1rem 0 1.15rem;
    }
    .user-orderlist .orderitem{
        margin-bottom: 10px;
    }
    .user-orderlist .orderitem .panel-heading,.user-orderlist .orderitem .panel-footer{
        background-image: none;
        background-color: white;
        font-size: 13px;
        color: #8C8C8C;
    }
    .user-orderlist .orderitem .panel-heading span{
        float: right;
    }
    .user-orderlist .orderitem .panel-body p{
        margin-bottom: 5px;
    }
    .user-orderlist .orderitem .panel-body span{
        font-size: 12px;
        text-align: right;
        color: #8C8C8C;
        display: block;
        margin-bottom: 32px;
    }

    .user-orderlist .orderitem .panel-body .p1{

        font-size: 15px;
    }
    .user-orderlist .orderitem .panel-body .p2,.user-orderlist .orderitem .panel-footer .p2{
        font-size: 12px;
        color: black;
    }
    .user-orderlist .orderitem .panel-body .p3{
        margin-top: 10px;
    }
    .user-orderlist .orderitem .panel-body .p4{
        color: #2AABD2;
    }
    .user-orderlist .orderitem .panel-body .p1_price{
        float: right;
    }
    .user-orderlist .orderitem  .panel-body .p2_footer,.user-orderlist .orderitem .panel-footer .p2_footer{
        float: right;
        font-size: 12px;
        margin-bottom: 0px;
    }
    .user-orderlist .a_row{
        height: 130px;
    }
    .user-orderlist .b_row{
        border-top: 1px black solid;
    }
    .user-orderlist .price_num{
        font-weight: 600;
        font-size: 14px;
    }
    .user-orderlist .user-orderlist-header{
        text-align: center;
        height: 145px;
        background-color: white;
        margin-bottom: 10px;
        padding:20px;
    }
    .user-orderlist .user-orderlist-header h3{
        margin-top: 0;
    }
    .user-orderlist .user-orderlist-header button{
        width: 80px;
        font-size: 12px;
        display: block;
        border-style: none;
        border: 1px #C0C0C0 solid;
        background-color: white;
        padding: 3px 5px;
        text-align: center;
        margin: 0 auto;
    }
</style>
<template>
    <div class="user_order">
        <top></top>

        <div class="user-orderlist">
            <nav class="navbar navbar-default navbar-fixed-top mynav">
                <div class="container">
                    <div class="row">
                        <van-tabs v-model="active" :swipeable=true color="#705252">
                            <van-tab title="全部" style="height: 40rem;">
                                <router-link to="/user_order_detail">
                                    <div class="panel panel-default orderitem orderitem_fir">
                                        <div class="panel-heading">外卖订单: 32265231542162<span>已完成</span></div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <p class="p1">成华区建设路1号</p>
                                                    <p class="p2">榛果拿铁等 共 1 件商品</p>
                                                    <p class="p3">¥ 9</p>
                                                </div>
                                                <div class="col-xs-5">
                                                    <span>2018-11-04 13:06</span>

                                                    <button>再来一单</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </router-link>
                            </van-tab>
                            <van-tab title="未完成"style="height: 40rem;text-align: center">未完成</van-tab>
                            <van-tab title="已完成"style="height: 40rem;text-align: center" >已完成</van-tab>
                        </van-tabs>
                        <!--<div class="col-xs-4"><p class="act">全部</p></div>-->
                        <!--<div class="col-xs-4"><p>未完成</p></div>-->
                        <!--<div class="col-xs-4"><p>已完成</p></div>-->
                    </div>
                </div>
            </nav>





        </div>
    </div>
</template>

<script>
    export default {
        name: "Userorder",
        data(){
            return{
                active: 0,

            }
        }
    }
</script>

<style scoped>
    body{

        background-color: #EEEEEE;
    }
    .user_order{
        padding: 1rem 0 1.15rem;
    }
    .user-orderlist h4{
        font-size: 13px;
        padding: 0.5rem 1rem;
        margin: 0;
    }

    .mytab>.van-tabs__content{
    }
    .mynav .col-xs-4 p{
        margin: 0 auto;
        width: 60%;
        text-align: center;
        height: 50px;
        line-height: 50px;
    }
    .user-orderlist .navbar{
        top: 1rem;
    }
    .user-orderlist .mynav .row{
        background-color: white;
    }
    /*.mynav .act{*/
    /*border-bottom: 3px solid #705252;*/

    /*}*/
    .orderitem_fir{
        margin-top:10px
    }
    .user-orderlist .orderitem{
        margin-bottom: 10px;
    }
    .user-orderlist .orderitem .panel-heading{
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
    .user-orderlist .orderitem .panel-body button{
        float: right;
        width: 65px;
        font-size: 12px;
        display: block;
        border-style: none;
        border: 1px #C0C0C0 solid;
        background-color: white;
        padding: 3px 5px;
        color:black;
        text-align: center;

    }
    .user-orderlist .orderitem .panel-body p{
        color: black;
    }
    .user-orderlist .orderitem .panel-body .p1{

        font-size: 15px;

    }
    .user-orderlist .orderitem .panel-body .p2{
        font-size: 12px;
    }
    .user-orderlist .orderitem .panel-body .p3{
        margin-top: 10px;
    }
</style>
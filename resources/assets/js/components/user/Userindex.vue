<template>
    <div id="user">
        <div class="header">
            <span>我的</span>
        </div>
        <div class="user-head" >
            <div class="user-modal">
                <img src="/admin/user_icon/1542785816.jpg" alt="" class="user-headpic img-circle img-responsive"/>
                <h3>{{name}}</h3>
            </div>
        </div>

        <ul class="list-group user-list">
            <router-link to="/user_detail"><a class="list-group-item" href="/user_detail"><i class="glyphicon glyphicon-user"></i>个人资料<i class="glyphicon glyphicon-menu-right"></i></a></router-link>
            <router-link to="/user_order"><a class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i>我的订单<i class="glyphicon glyphicon-menu-right"></i></a></router-link>


            <!--<a class="list-group-item" ><i class="glyphicon glyphicon-credit-card"></i>优惠券<i class="glyphicon glyphicon-menu-right"></i></a>-->
            <a class="list-group-item"><i class="glyphicon glyphicon-heart"></i>我的收藏<i class="glyphicon glyphicon-menu-right"></i></a>
            <van-coupon-cell class="list-group-item"  :coupons="coupons" :chosen-coupon="chosenCoupon" @click="showList = true"  />

            <a class="list-group-item help"><i class="glyphicon glyphicon-pencil"></i>帮助反馈<i class="glyphicon glyphicon-menu-right"></i></a>
        </ul>

        <tab></tab>
        <van-popup v-model="showList" position="bottom">
            <van-coupon-list
                    :coupons="coupons"
                    :chosen-coupon="chosenCoupon"
                    :disabled-coupons="disabledCoupons"
                    @change="onChange"
                    @exchange="onExchange"
            />
        </van-popup>
    </div>
    <!-- 优惠券列表 -->

</template>

<script>

    const coupon = {
        available: 1,
        discount: 0,
        denominations: 150,
        originCondition: 0,
        reason: '',
        value: 150,
        name: '优惠券名称',
        startAt: 1489104000,
        endAt: 1514592000,
    };
    export default {
        name: "Userindex",

        data(){
            return{
                islogin:false,
                name:"",
                photo:"",
                chosenCoupon: -1,
                coupons: [coupon],
                disabledCoupons: [coupon],
                showList:false,
            }
        },
        methods: {
            onChange(index) {
                this.showList = false;
                this.chosenCoupon = index;
            },
            onExchange(code) {
                this.coupons.push(coupon);
            }
        },
        created(){

            this.islogin = localStorage.islogin=="1"?true:false;
            if(!this.islogin){
                this.$router.push("/login");
            }
            this.name = localStorage.name;
            this.photo = localStorage.photo;
            console.log(this.name)
        },
    }
</script>

<style scoped>
    .header{
        height: 1rem;
        width: 100%;
        background-color:#000;
        color: white;
        position:fixed;
        top: 0;
        left: 0;
        z-index: 20;
        display: flex;

    }
    .header span{
        width: 80%;
        flex: 1;
        line-height: 1rem;
        text-align: center;
        font-size: 0.34rem;
    }
    body{
        width: 100%;
        height: 100%;
        background-color: #EEEEEE;

    }
    #user{
        padding: 1rem 0 1.15rem;
    }
    .user-head{
        width: 100%;

        background: url(/user/img/bg1.jpg) no-repeat;
        background-size: 100% 100%;
        /*filter: blur(5px);*/
    }
    .user-modal{
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.3);
        padding-top: 20% ;
        padding-bottom:5%

    }
    .user-modal>h3{
        font-size: 30px;
        color: white;
        text-align: center;
    }
    .user-headpic{
        width: 25%;
        height: 42.5%;
        display: block;
        margin: 0 auto;
    }
    .user-list a{
        height: 1rem;
        font-size: 12px;
        font-style: none;
        color: gray;
        line-height: 1rem;
        padding-top: 0;
        padding-bottom: 0;
    }
    .user-list .list-group-item{
        border-left-style: none;
        border-right-style: none;
        box-shadow: none;
        border: 1px solid #ddd;
    }
    .user-list a>.glyphicon-menu-right{
        float: right;
        font-size: 12px;
    }
    .user-list a>i{
        margin-top: 17px;
        margin-right: 10px;
    }
    .user-list .van-cell .van-cell_title>span>i{
        margin-top: 17px;
        margin-right: 10px;
    }
    .user-list .help{
        margin-top: 0.5rem;
    }
</style>
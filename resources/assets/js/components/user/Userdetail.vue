<template>
    <div class="userdetail">
    <top></top>
        <ul class="list-group user-list">
            <a class="list-group-item sethead">头像<i class="glyphicon glyphicon-menu-right"></i><div class="userpic"><img src="/admin/user_icon/1542785816.jpg" class="img-circle"></div></a>
            <a class="list-group-item">用户名<i class="glyphicon glyphicon-menu-right"></i> <p class="user-info">{{name}}</p></a>
            <a class="list-group-item" v-show="sex=='m'?true:false">性别<i class="glyphicon glyphicon-menu-right"></i><p class="user-info">先生</p></a>
            <a class="list-group-item" v-show="sex=='w'?true:false">性别<i class="glyphicon glyphicon-menu-right"></i><p class="user-info">女士</p></a>
            <a class="list-group-item">绑定手机<i class="glyphicon glyphicon-menu-right"></i><p class="user-info">{{phone}}</p></a>
            <router-link to="/user_address"><a class="list-group-item">收货地址管理<i class="glyphicon glyphicon-menu-right"></i></a></router-link>
        </ul>
        <button class="btn user-logout" type="button" @click="edit">修改信息</button>
        <button class="btn user-logout" type="button" @click="logout">退出登录</button>
    </div>

</template>

<script>
    export default {
        name: "Userdetailedit",
        data(){
            return {
                name:"",
                sex:"",
                phone:"",
                photo:""
            }
        },
        created(){
            this.name = localStorage.name;
            this.sex = localStorage.sex;
            this.phone = localStorage.phone;
            this.photo = localStorage.photo;
        },
        methods:{
            edit(){
                this.$router.push("/user_detail_edit");
            },
            logout(){
                localStorage.islogin="0";
                this.$router.push("/login");
            }
        }
    }
</script>

<style scoped>
    body{

        background-color: #EEEEEE;
    }
    .userdetail{
        padding: 1rem 0 1.15rem;
    }
    .user-list{
        margin-bottom: 0.5rem;
    }
    .user-list a{
        height: 1.1rem;
        font-size: 12px;
        font-style: none;
        color: gray;
        line-height: 1rem;
        padding-top: 0;
        padding-bottom: 0;
    }

    .user-list a>.glyphicon-menu-right{
        float: right;
        font-size: 0.2rem;
    }
    .user-list a>i{
        margin-top: 0.35rem;
        /*margin-right: 15px;*/
    }
    .user-logout{
        display: block;
        margin: 0 auto;
        margin-top:0.2rem;

        width: 90%;
        height: 0.8rem;
        font-size: 14px;
        background-color: /*#4190a7;*/#705252;
        color: white;
        border-radius: 3px;
    }

    .user-list .sethead{
        height: 2rem;
        width:100%;
        line-height: 2rem;
        position: relative;
    }
    .user-list .sethead i{
        margin-top:0.8rem
    }
    .user-list .userpic{
        float: right;
        width: 20%;
    }
    .user-list .sethead img{
        display: block;
        width:50px;
        margin-top: 0.5rem;
        /*margin: auto  2rem;*/
        /*border-radius: 50%;*/
        /*position: absolute;
        top: 10%;*/
    }
    .user-list .user-info{
        float: right;
        height: 1rem;
        line-height: 1rem;
        /*margin-right: 2rem;*/
        margin-bottom: 0;
    }
</style>
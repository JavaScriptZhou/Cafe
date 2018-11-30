<template>
    <ul class="tab" id="tabBar">
        <router-link to="/home" tag="li"><span>主页</span></router-link>
        <router-link to="/theme" tag="li"><span>主题</span></router-link>
        <router-link to="/list" tag="li"><span>菜单</span></router-link>
        <router-link to="/cart" tag="li"><span>购物车</span></router-link>
        <router-link to="/user" tag="li"><span>我的</span></router-link>
    </ul>
</template>

<script>
    export default {
        name: "Tab",

    }
</script>

<style>
    #tabBar .router-link-active{
        color:#594b45;
    }
    #tabBar li:nth-child(1).router-link-active{
        background-image:url(/images/1t.png);
    }
    #tabBar li:nth-child(2).router-link-active{
        background-image:url(/images/t2.png);
    }
    #tabBar li:nth-child(3).router-link-active{
        background-image:url(/images/t3.png);
    }
    #tabBar li:nth-child(4).router-link-active{
        background-image:url(/images/t4.png);
    }
    #tabBar li:nth-child(5).router-link-active{
        background-image:url(/images/t5.png);
    }
    .tab li:nth-child(1){
        background-image:url(/images/t01.png);
        background-repeat: no-repeat;
        background-position: 0.5rem 0.18rem;
        background-size: 0.45rem 0.45rem;
    }
    .tab li:nth-child(2){
        background-image:url(/images/t02.png);
        background-repeat: no-repeat;
        background-position: 0.5rem 0.18rem;
        background-size: 0.45rem 0.45rem;
    }
    .tab li:nth-child(3){
        background-image:url(/images/t03.png);
        background-repeat: no-repeat;
        background-position: 0.5rem 0.18rem;
        background-size: 0.45rem 0.45rem;
    }
    .tab li:nth-child(4){
        background-image:url(/images/t04.png);
        background-repeat: no-repeat;
        background-position: 0.5rem 0.18rem;
        background-size: 0.45rem 0.45rem;
    }
    .tab li:nth-child(5){
        background-image:url(/images/t05.png);
        background-repeat: no-repeat;
        background-position: 0.5rem 0.18rem;
        background-size: 0.45rem 0.45rem;
    }
    .tab li>img{
        width: 0.45rem;
        height: auto;
        margin-bottom:0.1rem;
    }

    .tab{
        display:flex;
        height:1.15rem;
        width:100%;
        position: fixed;
        background-color:#fff;
        left:0;
        bottom:0;
        z-index:20;
    }

    .tab li{
        text-align:center;
        padding-top: 0.1rem;
        flex-grow:1;
        display:flex;
        height:1.15rem;
        justify-content: center;
        align-items: center;
        flex-direction:column;
        font-size:.24rem;
        color: #999;
    }
    .tab li>span{
        margin-top: 0.5rem;
    }

</style>
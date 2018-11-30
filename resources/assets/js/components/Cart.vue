<template>
    <div>
        <div class="header">
            <span>购物车</span>
        </div>
        <div class="cart">
            <img src="/images/cart.png" alt="">
            <p>您的购物车有点寂寞</p>
            <button @click="drink">去喝一杯</button>
        </div>
        <tab></tab>
    </div>

</template>

<script>
    export default {
        name: "Cart",
        methods:{
            drink(){
                this.$router.push("/list")
            }
        }
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
    .header a{
        color:white;
    }
    .header input{
        position: absolute;
        top: 1.1rem;
        left: 8%;
        width: 85%;
        height: 0.7rem;
        border-radius: 40px;
        opacity: 0.4;
        padding-left: 0.2rem;
        /*border: none;*/
        border-style: none;
        outline: none;
    }
    .header span{
        width: 80%;
        flex: 1;
        line-height: 1rem;
        text-align: center;
        font-size: 0.34rem;
    }
    .cart{
        padding-top: 1rem ;
        text-align: center;
    }
    .cart p{
        margin-bottom: 0.6rem;
        font-size:0.28rem;
    }
    .cart img{
        width: 25%;
        margin-top:2.5rem;
        margin-bottom:0.3rem;
    }

    .cart button{
        background-color: #fff;
        color: lightskyblue;
        border:1px #b2f6fd solid;
        border-radius: 4px;
        padding:5px 10px;
    }
</style>
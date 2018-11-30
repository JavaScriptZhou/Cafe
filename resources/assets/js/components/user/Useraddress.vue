<template>
    <div class="user-address">
        <top></top>
        <h4>我的地址</h4>
        <ul class="list-group user-list">
            <router-link to="/user_address_edit">
            <a class="list-group-item">
                <h3>四川省成都市建设路1号</h3>
                <p>15928053774 周先生</p>
                <i class="glyphicon glyphicon-edit"></i>
            </a>
            </router-link>
            <a class="list-group-item">
                <h3>北京市海淀区杏石口路81号</h3>
                <p>15928053774 周先生</p>
                <i class="glyphicon glyphicon-edit"></i>
            </a>

        </ul>
    </div>
</template>

<script>
    export default {
        name: "Useraddress"
    }
</script>

<style scoped>
    body{
        width: 100%;
        height: 100%;
        background-color: #EEEEEE;
    }
    .user-address{
        padding: 1rem 0 1.15rem;
    }
    .user-address h4{
        font-size: 13px;
        padding: 0.1rem 0.1rem;
        margin: 0;
    }
    .user-list a{
        height: 1rem;
        font-size: 0.2rem;
        font-style: none;
        color: gray;
        line-height: 1rem;
        /*padding-left: 2rem;*/
        position: relative;
    }


    .user-list a>i{
        /*margin-top: 1rem;*/
        margin-right: 15px;
        position: absolute;
        right: 3%;
        top: 20.5%;
    }
    .user-list h3{
        font-size: 14px;
        margin: 0;
        height: 0.35rem;
        line-height: 0.35rem;
    }
    .user-list p{
        color: gainsboro;
        font-size: 0.15rem;
        height: 0.25rem;
        line-height: 0.25rem;
        margin: 0;
    }
</style>
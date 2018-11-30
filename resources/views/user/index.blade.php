<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<link rel="stylesheet" href="/user/css/bootstrap.min.css" />
<link rel="stylesheet" href="/user/css/bootstrap-theme.min.css" />
<script src="/user/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/user/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    body{
        width: 100%;
        height: 100%;
        background-color: #EEEEEE;

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
        padding-top: 10% ;

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
        height: 4rem;
        font-size: 12px;
        font-style: none;
        color: gray;
        line-height: 4rem;
        padding-top: 0;
        padding-bottom: 0;
    }

    .user-list a>.glyphicon-menu-right{
        float: right;
        font-size: 12px;
    }
    .user-list a>i{
        margin-top: 17px;
        margin-right: 10px;
    }
    .user-list .help{
        margin-top: 3rem;
    }
</style>

<body>
<div class="user-head">
    <div class="user-modal">
        <img src="/user/img/head.jpg" alt="" class="user-headpic img-circle img-responsive"/>
        <h3>Li Lei</h3>
    </div>
</div>

<ul class="list-group user-list">
    <a class="list-group-item" href="/user_detail"><i class="glyphicon glyphicon-user"></i>个人资料<i class="glyphicon glyphicon-menu-right"></i></a>
    <a class="list-group-item"><i class="glyphicon glyphicon-list-alt"></i>我的订单<i class="glyphicon glyphicon-menu-right"></i></a>
    <a class="list-group-item"><i class="glyphicon glyphicon-credit-card"></i>优惠券<i class="glyphicon glyphicon-menu-right"></i></a>
    <a class="list-group-item"><i class="glyphicon glyphicon-heart"></i>我的收藏<i class="glyphicon glyphicon-menu-right"></i></a>
    <a class="list-group-item help"><i class="glyphicon glyphicon-pencil"></i>帮助反馈<i class="glyphicon glyphicon-menu-right"></i></a>
</ul>
</body>

</html>
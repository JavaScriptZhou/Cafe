<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
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
		
		.user-detail a{
			height: 4rem;
			font-size: 12px;
			font-style: none;
			color: gray;
			line-height: 4rem;
			padding-top: 0;
			padding-bottom: 0;
		}
		
		.user-detail a>.glyphicon-menu-right{
			float: right;
			font-size: 1rem;
			
		}
		.user-detail a>i{
			margin-top: 1.25rem;
			margin-right: 15px;
		}
		.user-logout{
			display: block;
			margin: 0 auto;
			margin-top:3rem;
			
			width: 90%;
			height: 3rem;
			font-size: 14px;
			background-color: /*#4190a7;*/#705252;
			color: white;
			border-radius: 3px;
		}
		.user-detail .sethead{
			height: 6rem;
			width:100%;
			line-height: 6rem;
			position: relative;
		}
		.user-detail .sethead i{
			margin-top:2.5rem		
		}
		.user-detail .userpic{
			float: right;
			width: 20%;
		}
		.user-detail .sethead img{
			display: block;
			width:50px;
			margin-top: 10px;
			/*margin: auto  2rem;*/
			/*border-radius: 50%;*/
			/*position: absolute;
			top: 10%;*/
		}
		.user-detail .user-info{
			float: right;
			height: 3.8rem;
			line-height: 3.8rem;
			margin-right: 2rem;
			margin-bottom: 0;
		}
	</style>
	<body>
		<ul class="list-group user-detail">
		  	<a class="list-group-item sethead">头像<i class="glyphicon glyphicon-menu-right"></i><div class="userpic"><img src="/user/img/head.jpg" class="img-circle"></div></a>
		  	<a class="list-group-item">用户名<i class="glyphicon glyphicon-menu-right"></i> <p class="user-info">周</p></a>
		  	<a class="list-group-item">性别<i class="glyphicon glyphicon-menu-right"></i><p class="user-info">先生</p></a>
		  	<a class="list-group-item">绑定手机<i class="glyphicon glyphicon-menu-right"></i><p class="user-info">159-280-53774</p></a>
		  	<a class="list-group-item">收货地址管理<i class="glyphicon glyphicon-menu-right"></i></a>
		</ul>
		<button class="btn user-logout" type="submit">退出登录</button>
	</body>
</html>

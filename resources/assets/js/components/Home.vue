<template>
    <div class="home">
		<div class="header">

			<span>首页</span>
			<input type="text" placeholder="请输入关键词"/><i class="glyphicon glyphicon-search search_icon"></i>

		</div>
		<div class="container top">
				<div id="Mycarousel" class="carousel slide" data-ride="carousel" data-interval="8000">
				  <!-- Indicators -->
						<!--<ol class="carousel-indicators">-->
							<!--<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
							<!--<li data-target="#carousel-example-generic" data-slide-to="1"></li>-->
							<!--<li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
						<!--</ol>-->

						  <!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<van-swipe :autoplay="3000" indicator-color="white">
								<van-swipe-item>
									<div class="item active">
										<img src="/images/ban1.png" class="top_pic" alt="...">
									</div>
								</van-swipe-item>
								<van-swipe-item>
									<div class="item">
										<img src="/images/013.png" class="top_pic" alt="...">
									</div>
								</van-swipe-item>
								<van-swipe-item>
									<div class="item">
										<img src="/images/ban2.png" class="top_pic" alt="...">
									</div>
								</van-swipe-item>
							</van-swipe>
						</div>
				</div>
		</div>

		<!--中部icon导航-->
		<div class="container con_ban">
			<div class="row">
				<div class="banner_icon"></div>
				<div class="col-xs-3 col-md-3 col-sm-3">
					<a href="#"><img src="/images/i03.png" class="home_pic" @click="go_list"/><p>咖啡菜单</p> </a>
				</div>
				<div class="col-xs-3 col-md-3 col-sm-3">
					<a href="#"><img src="/images/i02.png" class="home_pic"/><p>冲煮方式</p> </a>
				</div>
				<div class="col-xs-3 col-md-3 col-sm-3">
					<a href="#"><img src="/images/i01.png" class="home_pic"/><p>身边好店</p></a>
				</div>
				<div class="col-xs-3 col-md-3 col-sm-3">
					<a href="#"><img src="/images/i04.png" class="home_pic"/><p>记录风味</p></a>
				</div>
			</div>
		</div>

		<!--今日精选轮播图-->
		<div class="container selected clearfix">
			<div class="recommend">
				<h2><i class="glyphicon glyphicon-grain"></i>今日精选</h2>
			</div>
			<!--手动轮播图-->
			<div class="home_selected_wrap">

				<div class="home_selected_list fl" v-for="item in list">
					<img src="/images/timg.jpg" v-if="item.photo==''" alt="...">
					<img :src="'/admin/'+item.photo" v-else alt="...">

			      	<h4>{{item.name}}</h4>
			      	<p>{{item.short_detail}}</p>
				</div>

			</div>
		</div>


		<tab></tab>
    </div>
</template>

<script>
    export default {
        name: "Home",
		data:()=>({
			list:[]
		}),
		created(){
          axios.get('/m/product_leader').then(res=>{
             console.log(res.data);

			     this.list = res.data;


		  });
		},
		methods:{
            go_list(){
                this.$router.push('/list');
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

	.search_icon{
		position: absolute;
		top: 0.95rem;
		right: 0.3rem;
		line-height: 1rem;
		font-size:0.36rem;
		margin-right:0.4rem;
		color: #ccc;
	}




	.home{padding: 1rem 0 1.15rem}
	.home .top .item{width: 100%;height: 4.8rem;}
	.home .top .item>img{width: 100%;height: 100%}

	/*home*/
	.home .top{
		padding: 0;
	}

	.con_ban{
		/*padding-top: 0.28rem;*/
		padding-bottom: 0.35rem;
		text-align: center;
		position: relative;
		background-color: #efefef;
	}
	.banner_icon{
		background-color: #fff;
		border-radius:8px;
		width: 95%;
		margin: auto;
		height: 1.8rem;
		position: absolute;
		top: -15px;
		left: 2.5%;
	}
	.con_ban p{
		line-height: 0.24rem;
		color: #000;
		font-size: 0.24rem;
	}
	.top_pic{
		width: 100%;
		height: 100%;
	}
	.home_pic{
		width: 70%;
		margin-bottom: 0.12rem;
	}
	.selected{
		background-color: #efefef;
		border-top: 1px #e3e3e3 solid;
	}
	.selected .recommend h2{
		line-height: 0.8rem;
		font-size: 0.36rem;
		font-weight: 600;
		color: #000;
		font-family:'宋体';
		margin-left: 0.1rem;
	}

	.selected .home_selected_wrap{
		padding: 0 0.1rem;
		display: flex;
		overflow-x: scroll;
		-webkit-overflow-scrolling: touch;
	}
	.selected .home_selected_wrap::-webkit-scrollbar{
		width: 0;
		height: 0;
	}
	.selected .home_selected_wrap .home_selected_list{
		flex-shrink: 0;
		width: 80%;
		margin-right: 0.10rem;
		white-space: normal;
	}

	.selected .home_selected_wrap .home_selected_list img{
		display: block;
		width: 100%;
		height: 70%;
		margin: 0 auto;
		border-radius: 0.1rem;
	}
	.selected .home_selected_wrap .home_selected_list h4{
		line-height: 0.5rem;
		font-size: 0.26rem;
		color: #000;
		padding-left: 0.10rem;
	}
	.selected .home_selected_wrap .home_selected_list p{
		line-height: 0.3rem;
		font-size: 0.12rem;
		color: #7a7a7a;
		padding-left: 0.10rem;
	}

	.con_footer{
		position: fixed;
		bottom: 0;
		left: 0;
		text-align: center;
		background-color: #fff;
		width: 100%;
	}
	.con_footer p{
		line-height: 0.20rem;
		color: #fff;
		margin-top: 0.5rem;
		font-size: 0.12rem;
	}
	.con_footer .footer_pic{
		width: 30%;
	}

	/*register    login*/

	.register{
		background-image: url(/images/000.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: cover;
		height: 100%;
	}
	.register_login{
		text-align: center;
		padding-top: 0.10rem;
	}
	.register_login p{
		line-height: 0.40rem;
		color: #fff;
	}
	.register_login a{
		color: #fff;
	}
	.icon_cof{
		padding-top: 0.65rem;
		margin: 0 auto;
		margin-bottom: 0.30rem;
		text-align: center;
	}

	.icon_cof img{
		width: 20%;
		border-radius:0.10rem ;
	}
	.re_input{
		padding: 0.20rem 0 0;
	}
	.re_input .inp{
		width: 100%;
		background-color:rgba(0, 0, 0, 0) ;
		border: none;
		border-bottom: 1px #fff solid;
		display: block;
		border-radius: inherit;
	}
	.re_input .button{
		height: 0.26rem;
		width: 0.90rem;
		background: rgba(0, 0, 0, 0) ;
		border: 1px #bfbebd solid;
		border-radius: 0.05rem;
	}
	.re_input .btns{
		width: 73%;
		display: inline-block;
	}
	.re_input .code{
		width: 25%;
		color: #fff;
	}
	.re_page button{
		background-color: #000;
		color: #fff;
	}
	/*payment*/
	.pay{
		text-align: center;
		padding-top: 1rem;
	}

	.pay h4{
		color: #fff;
		line-height: 0.40rem;
	}
	.pay h3{
		color: red;
		line-height: 1rem;
	}

	.pay p{
		line-height: 0.6rem;
		color: #fff;
	}
	.pay .pay_mar{
		margin-bottom: 2rem;
	}
	.pay_bt{
		background-color: #d38f3a;
		border-color: #d38f3a;
		color: #fff;
	}
	.pay_bt:hover{
		background-color: #ccc;
		border-color: #ccc;
	}

	/*pay_selected*/

	.pay_selected{
		border-bottom: 1px #d3d1d1 solid;
		text-align: center;
	}
	.pay_selected p{
		line-height: 1rem;
		font-size: 0.36rem;
	}
	.pay_price{
		border-bottom: 1px #d3d1d1 solid;
	}

	.pay_price p{
		line-height: 0.80rem;
		font-size: 0.14rem;
		margin-left: 0.10rem;

	}
	.pay_blank{
		border-bottom: 1px #d3d1d1 solid;
		border-top: 1px #d3d1d1 solid;
		height: 0.30rem;
		background-color: #f0efed;
	}
	.pay_mode img{
		width: 0.50rem;
		height: auto;
		display: block;
		margin: 0 auto;
	}

	.pay_sl{
		border-bottom: 1px #d3d1d1 solid;
		padding: 0.30rem 0 0.30rem;


	}
	.pay_mode .pay_sl h5{
		line-height: 0.30rem;
		font-size: 0.14rem;
	}
	.pay_mode .pay_sl span{
		padding: 0.02rem;
		line-height: 0.14rem;
		font-size: 0.12rem;
		color: #ffae31;
		border: 1px #ffae31 solid;
		border-radius: 0.03rem;
		margin-right: 0.08rem;

	}
	.pay_mode .pay_sl p{
		display: inline-block;
		line-height: 0.14rem;
		font-size: 0.12rem;
		color: #959595;
	}
	.pay_mode input{
		line-height: 0.40rem;
		font-size: 0.18rem;
		display: block;
		margin-top: 0.20rem;
	}


</style>
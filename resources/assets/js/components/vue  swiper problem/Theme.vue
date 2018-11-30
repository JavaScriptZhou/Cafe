<template>
    <div>
        <top></top>

        <div class="coffee-theme container">
            <div class="row">

                <div class="col-xs-12" v-for="item in list"  @click="theme_detail(item)">
                    <a href="#" v-if="item.photo==''"   :style="'background:url(/images/theme-0'+((index+1)%4)+'.jpg) no-repeat 0;background-size: cover;'">
                        <i class="iconfont icon-16"></i>
                        <span>{{item.name}}</span>
                        <span>{{item.english_name}}</span>
                    </a>
                    <a href="#" v-else  :style="'background:url(/upload/'+item.photo+') no-repeat 0;background-size: cover;'">
                        <i class="iconfont icon-16"></i>
                        <span>{{item.name}}</span>
                        <span>{{item.english_name}}</span>
                    </a>

                </div>


                <!--<div class="col-xs-12"><a href="#"><i class="iconfont icon-16"></i><span>卡布奇诺</span><span>cappuccino</span></a></div>-->


                <!--<div class="col-xs-12"><a href="#"><i class="iconfont icon-16"></i><span>卡布奇诺</span><span>cappuccino</span></a></div>-->


                <!--<div class="col-xs-12"><a href="#"><i class="iconfont icon-16"></i><span>卡布奇诺</span><span>cappuccino</span></a></div>-->
            </div>
        </div>
        <div class="theme-modal" >
            <div class="theme-detail">
                <div id="theme-swiper" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" :data-key="index" v-for="(item,index) in theme_des.des_arr">
                            <div class="item">
                                <h4>{{theme_des.name}}</h4>
                                <div class="img"  :style="'background:url(/images/theme-0'+((index+1)%4)+'.jpg) no-repeat 0;background-size: cover;'"></div>
                                <p>{{item}}</p>
                            </div>
                        </div>

                        <div class="swiper-slide">1111</div>
                        <div class="swiper-slide">2222</div>
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- 下滑去模态层的按钮  -->
            <a href="#" class="close-modal"><i class="iconfont icon-16"></i></a>
        </div>
        <tab></tab>
    </div>
</template>

<script>
    import Swiper from  'swiper';

    export default {
        name: "Theme",
        data:()=>({
          list: [],
          theme_des: {},
          mySwiper:new Swiper ('.swiper-container',{
              pagination: {
                  el:'.swiper-pagination'
              },
              on: {
                  reachEnd: function(){
                      // window.location.href="recommend.html"; //跳转页面
                      ThemeThat.$router.push('/recommend');

                  },
              },
              direction: 'horizontal',
              touchRatio : 0.8,//触摸比例
              slidesPerView: 1.2,
              centeredSlides:true,
              spaceBetween: 20
          })
        }),
        created(){
            axios.get('m/theme_list').then(res=>{
                // console.log(res.data);
                res.data.forEach(el=>{
                   el.des_arr = el.des_arr.split(',');
                   el.des_arr.pop();
                });
                this.list = res.data;
            });
        },
        mounted(){

            $('.theme-modal').hide();

        },
        methods:{
            theme_detail(theme){
                this.theme_des = theme;


                //截流变量
                var theme_cut;

                var ThemeThat = this;




                $(function(){
                    $('.swiper-wrapper .swiper-slide:not("[data-key]")').remove();

                    $('.swiper-wrapper').append('<div class="swiper-slide"></div>');
                    //
                    //
                    ThemeThat.mobile_drag($('.theme-modal'),$('.close-modal'),theme_cut);
                    //
                    console.log($('.theme-modal').get(0));
                    // //弹出模态层
                    if(!theme_cut){
                        $('.theme-modal').show().css('top',0);
                    //
                    //     // if(!$('.swiper-wrapper .swiper-slide:last').prev('.swiper-slide').html()){
                    //     //     console.log(1);
                    //     //     $('.swiper-wrapper .swiper-slide:last').prev('.swiper-slide').remove();
                    //     // }
                    //
                    //
                    //     console.log(ThemeThat.mySwiper.slides);
                        console.log($('.theme-modal'));

                        // ThemeThat.mySwiper.pagination.update();
                        // ThemeThat.mySwiper.update();
                        setTimeout(function(){
                            if(ThemeThat.theme_des  && Object.keys(ThemeThat.theme_des).length !=0){
                                ThemeThat.initSwiper();
                                ThemeThat.mySwiper.update();
                            }
                        },0);


                    //     // mySwiper.pagination.render();
                    //     $('.coffee-theme').addClass('coffee-theme-blur');
                    //
                    //
                    }

                });










            },
            initSwiper(){
                var that = this;
                that.mySwiper = null;
                that.mySwiper = new Swiper ('.swiper-container',{
                    pagination: {
                        el:'.swiper-pagination'
                    },
                    on: {
                        reachEnd: function(){
                            // window.location.href="recommend.html"; //跳转页面
                            that.$router.push('/recommend');

                        },
                    },
                    direction: 'horizontal',
                    touchRatio : 0.8,//触摸比例
                    slidesPerView: 1.2,
                    centeredSlides:true,
                    spaceBetween: 20
                })

            },
            mobile_drag (obj,title,theme_cut){ //移动端的拖拽函数
                var title = title || obj;
                var orientation = 0;  //正为向上   负为向下
                obj.on('touchstart',function(ev){
                    // ev.preventDefault();
                });
                title.on('touchstart',function(ev){
                    // ev.preventDefault();
                    var disY = ev.originalEvent.changedTouches[0].pageY - obj.position().top;
                    $(document).off().on('touchmove',function(ev){
                        var t = ev.originalEvent.changedTouches[0].pageY - disY;

                        orientation = obj.position().top - t;

                        if(t<0)t = 0;
                        obj.css({
                            "top":t
                        });
                    });
                    $(document).on('touchend',function(){
                        $(this).off("touchmove touchend");
                        console.log(orientation);
                        theme_cut = true;
                        if(orientation>0){
                            obj.animate({'top':0},600,function(){
                                theme_cut = false;
                            });
                        }else{
                            obj.animate({'top':$(window).height()},600,function(){

                                $('.coffee-theme').removeClass('coffee-theme-blur');
                                $(this).hide();


                                theme_cut = false;
                            });
                        }
                    });
                });
            }
        }

    }


</script>

<style >
    .coffee-theme {
        width: 92%;
        padding: 1.02rem 4% 1rem;
        position: relative;
        z-index:0;
    }
    .coffee-theme .col-xs-12 {
        margin: 1% 0;
        height: 0;
        padding-top: 50%;
    }
    .coffee-theme .col-xs-12 a, .coffee-theme .col-xs-12 i, .coffee-theme .col-xs-12 span {
        display: block;
        width: 100%;
        color: white;
        font-size: .28rem;
        text-align: center;
    }
    .coffee-theme .col-xs-12 a {
        position: absolute;
        top: 0;
        left: 0;
        padding: 16% 0;
        box-sizing: border-box;
        background-color: rgba(0, 0, 0, 0.2);
        height: 100%;
    }
    /*.coffee-theme .col-xs-12:nth-child(1) {*/
        /*background: url(/images/theme-01.jpg) no-repeat 0;*/
        /*background-size: 100%;*/
    /*}*/
    /*.coffee-theme .col-xs-12:nth-child(2) {*/
        /*background: url(/images/theme-02.jpg) no-repeat 0;*/
        /*background-size: 100%;*/
    /*}*/
    /*.coffee-theme .col-xs-12:nth-child(3) {*/
        /*background: url(/images/theme-03.jpg) no-repeat 0;*/
        /*background-size: 100%;*/
    /*}*/
    /*.coffee-theme .col-xs-12:nth-child(4) {*/
        /*background: url(/images/theme-04.jpg) no-repeat 0;*/
        /*background-size: 100%;*/
    /*}*/

    .coffee-theme-blur {
        -webkit-filter: blur(4px);
    }

    .theme-modal {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
        z-index:30;
    }
    .theme-modal .theme-detail {
        height: 100%;
        padding-top: 20%;
    }
    .theme-modal .theme-detail .swiper-container {
        width: 96%;
        height: 95%;
    }
    .theme-modal .close-modal {
        position: absolute;
        width: 10%;
        height: 10%;
        text-align: center;
        left: 45%;
        top: 10px;
        z-index: 10;
    }
    .theme-modal .close-modal i {
        font-size: .4rem;
        color: white;
    }

    #theme-swiper {
        position: relative;
    }
    #theme-swiper .swiper-slide {
        width: 94%;
        height: 94%;
        padding: 3%;
        background-color: white;
        border-radius: 4px;
    }
    #theme-swiper .swiper-slide .item {
        width: 100%;
        height: 100%;
        padding: 4% 10%;
        border-radius: 4px;
        border: 3px solid #0e0e0c;
        text-align: center;
    }
    #theme-swiper .swiper-slide .item h4 {
        text-align: center;
        line-height: 30px;
        margin-bottom: 1%;
        font-size:.54rem;
    }
    #theme-swiper .swiper-slide .item .img {
        width: 66%;
        height: 0;
        margin: 10% auto 6%;
        padding-bottom: 106%;
    }
    #theme-swiper .swiper-slide .item p {
        margin-top: 1%;
        text-indent: 3em;
        text-align: left;
        font-size: .32rem;
        line-height: .42rem;
    }
    /*#theme-swiper .swiper-slide:nth-child(1) .img {*/
        /*background: url(/images/theme-01.jpg) no-repeat 0;*/
        /*background-size: cover;*/
    /*}*/
    /*#theme-swiper .swiper-slide:nth-child(2) .img {*/
        /*background: url(/images/theme-02.jpg) no-repeat 0;*/
        /*background-size: cover;*/
    /*}*/
    /*#theme-swiper .swiper-slide:nth-child(3) .img {*/
        /*background: url(/images/theme-03.jpg) no-repeat 0;*/
        /*background-size: cover;*/
    /*}*/
    #theme-swiper .swiper-slide:last-child {
        visibility: hidden;
    }
    #theme-swiper .swiper-pagination {
        bottom: 10%;
    }

</style>
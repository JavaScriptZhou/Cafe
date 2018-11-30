<template>
    <div>
        <div class="header">
            <span>主题</span>
        </div>
        <div class="coffee-theme container">

            <div class="row">

                <div class="col-xs-12" v-for="item in list"  @click="theme_detail(item)" @reachEnd="go_recommend()">
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

            </div>
        </div>
        <div class="theme-modal" >
            <div class="theme-detail">
                <swiper id="theme-swiper" :options="swiperOption" ref="mySwiper" @reachEnd="go_recommend(theme_des)">
                        <swiper-slide  :key="index" :data-key="index" v-for="(item,index) in theme_des.des_arr">
                            <div class="item">
                                <h4>{{theme_des.name}}</h4>
                                <div class="img"  :style="'background:url(/images/theme-0'+((index+1)%4)+'.jpg) no-repeat 0;background-size: cover;'"></div>
                                <p>{{item}}</p>
                            </div>
                        </swiper-slide>

                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination" slot="pagination"></div>
                </swiper>
            </div>
            <!-- 下滑去模态层的按钮  -->
            <a href="#" class="close-modal"><i class="iconfont icon-16"></i></a>
        </div>
        <tab></tab>
    </div>
</template>

<script>


    export default {
        name: "Theme",
        data:()=>({
          list: [],
          theme_des: {},
          theme_cut:0, //截流变量
          swiperOption:{
              pagination: {
                  el:'.swiper-pagination'
              },
              direction: 'horizontal',
              touchRatio : 0.8,//触摸比例
              slidesPerView: 1.2,
              centeredSlides:true,
              observer:true,
              observeParents:true,
              spaceBetween: 20
          }
        }),

        created(){
            axios.get('m/theme_list').then(res=>{
                res.data.forEach(el=>{
                   el.des_arr = el.des_arr.split(',');
                   el.des_arr.pop();
                });
                this.list = res.data;
            });
        },
        mounted(){

            $('.theme-modal').hide();

            if(!this.theme_cut)
                this.mobile_drag($('.theme-modal'),$('a.close-modal'),this.theme_cut);

        },
        // computed: {
        //     swiper() {
        //         return this.$refs.mySwiper.swiper
        //     }
        // },
        methods:{
            go_recommend(theme){
                // console.log(theme);
                this.$router.push({name:'recommend',params:{id:theme.id}});
            },
            theme_detail(theme){
                this.theme_des = theme;

                var themeThat = this;


                $(function(){
                    themeThat.$refs.mySwiper.swiper.slideTo(0,0,false);


                    $('.swiper-wrapper .swiper-slide:not("[data-key]")').remove();
                    //
                    $('.swiper-wrapper').append('<div class="swiper-slide"></div>');

                    $('.coffee-theme').addClass('coffee-theme-blur');



                    $('.theme-modal').show().css('top',0);
                });


            },
            mobile_drag (obj,title,theme_cut){ //移动端的拖拽函数
                var title = title || obj;
                var orientation = 0;  //正为向上   负为向下
                obj.on('touchstart',function(ev){
                    ev.preventDefault();
                });
                title.on('touchstart',function(ev){
                    ev.preventDefault();
                    var disY = ev.originalEvent.changedTouches[0].pageY - obj.position().top;
                    $(document).off().on('touchmove',function(ev){
                        theme_cut = true;
                        var t = ev.originalEvent.changedTouches[0].pageY - disY;

                        orientation = obj.position().top - t;


                        if(t<0)t = 0;
                        obj.css({
                            "top":t
                        });
                    });
                    $(document).on('touchend',function(){
                        $(this).off("touchmove touchend");
                        // console.log(orientation);
                        if(orientation>0){
                            obj.animate({'top':0},600,function(){
                                theme_cut = false;
                            });
                        }else{
                            obj.animate({'top':$(window).height()},600,function(){
                                theme_cut = false;
                                $('.coffee-theme').removeClass('coffee-theme-blur');
                                $(this).hide();


                            });
                        }
                    });
                });
            }
        }

    }


</script>

<style >
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
    #theme-swiper .swiper-slide:last-child {
        visibility: hidden;
    }
    #theme-swiper .swiper-pagination {
        bottom: 10%;
    }

</style>
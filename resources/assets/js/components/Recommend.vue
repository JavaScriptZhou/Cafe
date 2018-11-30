<template>
    <div class="container">
        <top></top>
        <div class="recommend-fall-box grid">
            <div class="recom-grid-sizer"></div>
            <div class="recom-gutter-sizer"></div>
            <div class="makeplace"></div>
            <div class="recom-grid-item model-recom" >
                <div class="item-img"></div>
                <section class="section-p">
                    <p class="title-p">北冰洋的夏天</p>
                    <p class="price-p">非卖品</p>
                    <div class="records">
                        <div class="excellent"><i class="iconfont icon-HEART"></i>80</div>
                        <div class="collection"><i class="iconfont icon-STAR"></i>20</div>
                    </div>
                </section>
            </div>


        </div>
        <a href="javascript:;" class="more-a">
            <img src="/images/ic_loading.gif" />
        </a>
    </div>
</template>

<script>


    export default {
        name: "Recommend",
        mounted(){
            $('.theme-modal').remove();


            var that = this;

            //make   Masonry / ImagesLoaded  a  JQuery plugin
            ;(function(){
                var $ = require('jquery');
                var jQueryBridget = require('jquery-bridget');

                var Masonry = require('masonry-layout');

                jQueryBridget('masonry',Masonry,$);


            })();



            $(function() {

                var pageIndex = 0; //每次四条  共三次
                var dataFall = [];
                // var totalItem = 10;

                //进入该页面加载一次
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    dataType: "json",
                    type: 'post',
                    url: '/m/recommend/data/'+that.$route.params.id+'-'+pageIndex,      // +pageIndex url地址    下面  还有要改
                    success: function(result) {
                        pageIndex++;
                        dataFall = result;  //result 返回的值
                        setTimeout(function() {
                            appendFall();
                        }, 500);
                    },
                    error: function(e) {
                        console.log('请求失败');
                    }
                });

                //点赞  和  收藏
                $('.recommend-fall-box ').on('click','i',function(ev){
                    console.log(ev.target);
                    var target = $(ev.target);
                    if(target.hasClass('icon-HEART')){
                        target.parents('.excellent').toggleClass('heart');
                    }else if(target.hasClass('icon-STAR')){
                        target.parents('.collection').toggleClass('star');
                    }
                });

                //瀑布流
                var $grid = $('.grid').masonry({
                    itemSelector: '.recom-grid-item',
                    columnWidth:'.recom-grid-sizer',
                    percentagePositon:true,
                    gutter: '.recom-gutter-sizer'

                });
//
                $grid.masonry('layout');


                var isloading = false;
                $(window).scroll(function() {
                    $grid.masonry('layout');
                    var scrollTop = $(this).scrollTop();
                    var scrollHeight = $(document).height();
                    var windowHeight = $(this).height();
                    if(scrollTop + windowHeight == scrollHeight && pageIndex<3) { //最多翻页两次

                        $.ajax({
                            dataType: "json",
                            type: 'post',
                            url: '/m/recommend/data/'+that.$route.params.id+'-'+pageIndex,      // +pageIndex url地址    下面  还有要改
                            success: function(result) {
                                isloading = false;
                                pageIndex++;
                                if(!result.length){
                                    $('a.more-a').html('到底了');
                                    return false;
                                }
                                dataFall = result;  //result 返回的值
                                setTimeout(function() {
                                    appendFall();
                                }, 500);
                            },
                            error: function(e) {
                                console.log('请求失败');
                            }
                        });
                        isloading = true;
                    }else if(pageIndex>=3){
                        $('a.more-a').html('到底了');
                        return false;
                    }
                });

                function appendFall() {
                    $.each(dataFall, function(index, value) {  //value 为每个产品信息
                        var dataLength = dataFall.length;

                        $grid.masonry('layout');

                        var $griDiv = $('<div class="recom-grid-item">');
                        var $img = $("<div class='item-img'></div>");

                        // console.log(value.photo_size);
                        var  imgSize  = value.photo_size.split(':')[0]*$('.recom-grid-item').innerWidth();
                        var defaultImgSizes = [1,1,1.45,1.4,1.68];

                        if(!value.photo){
                           var imgIndex = Math.floor(Math.random()*5);
                                console.log(Math.random(0,5),imgIndex,defaultImgSizes[imgIndex]);
                            $img.css({'padding-bottom':defaultImgSizes[imgIndex]*$('.recom-grid-item').innerWidth(),'background':'url(/images/works'+imgIndex+'.jpg)','background-size':'cover'}).appendTo($griDiv);

                        }else {
                            $img.css({'padding-bottom':imgSize,'background':'url(/admin/'+value.photo+')','background-size':'cover'}).appendTo($griDiv);

                        }
                        var $section = $('<section class="section-p">');
                        $section.appendTo($griDiv);
                        var $p1 = $("<p class='title-p'>");
                        $p1.html(value.name).appendTo($section);
                        var $p2 = $("<p class='price-p'>");
                        $p2.html("¥"+value.price).appendTo($section);

                        var $p3 = $("<div class='records'>");
                        $p3.html(`<div class="excellent"><i class="iconfont icon-HEART"></i>80</div>
						<div class="collection"><i class="iconfont icon-STAR"></i>20</div>`).appendTo($section);



                        var $items = $griDiv;

                        $grid.masonry('layout');
                        $grid.append($items).masonry('appended', $items);
                    });


                }
            });


        }
    }
</script>

<style >
    body {
        background: #f5f5f5;
        padding-bottom: .2rem;
    }
    * {
        box-sizing: border-box;
    }

    .container {
        max-width: 64rem;
        margin: 0 auto ;
        overflow-x: hidden;
    }

    .recommend-fall-box {
        margin: 1.15rem 8px 10%;
    }
    .recommend-fall-box .recom-grid-item {
        width: 49%;
        margin-bottom: .2rem;
        padding: 2%;
        background-color: white;
    }
    .recommend-fall-box .model-recom {
        display: none;
    }
    .recommend-fall-box .item-img {
        width: 100%;
        display: block;
    }
    .recommend-fall-box .section-p {
        position: relative;
        background: #fff;
        padding-top: .3rem;
        padding-left: 5%;
    }
    .recommend-fall-box .title-p {
        color: #000;
        font-size: .4rem;
        text-align: center;
        margin-bottom: .1rem;
    }
    .recommend-fall-box .records {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-around;
    }
    .recommend-fall-box .records .excellent, .recommend-fall-box .records .collection {
        font-size: .32rem;
        line-height: .44rem;
        display: flex;
    }
    .recommend-fall-box .records .excellent i, .recommend-fall-box .records .collection i {
        font-size: .5rem;
    }
    .recommend-fall-box .records .excellent.heart i {
        color: red;
    }
    .recommend-fall-box .records .collection.star i {
        color: orange;
    }
    .recommend-fall-box .price-p {
        margin-top: .1rem;
        color: #ff6700;
        font-size: .3rem;
        padding-bottom: .8rem;
    }

    .recom-grid-sizer {
        width: 49%;
    }

    .recom-gutter-sizer {
        width: 2%;
    }

    .more-a {
        display: block;
        text-align: center;
        margin-top: 2%;
    }

    .more-a img {
        width: 6%;
    }

</style>
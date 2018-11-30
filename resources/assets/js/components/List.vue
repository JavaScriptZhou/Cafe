<template>

    <div class="product-wrap">
        <div class="header">
            <span>菜单</span>
        </div>
        <div class="container product" >
            <div class="row">
                <aside class="col-xs-3 product-list" id="nav-prodOrder-list">
                    <ul class="list-group nav" >
                        <li v-for="(item,index) in order_list"    :class="['list-group-item', orderIndex==index?'active':'']"><a :href="'#product-type-'+index">{{item.name.substr(0,4)}}</a></li>

                    </ul>
                </aside>
                <div class="col-xs-9 col-xs-offset-3 product-text">
                    <div  v-for="(item,index) in order_list"  :class="['tab-pane', orderIndex==index?'active':'']"  :id="'product-type-'+index" >
                        <div class="product-head">
                            <h2>{{item.name.substr(0,4)}}</h2>
                            <span>{{item.short_des}}</span>
                        </div>
                        <div class="product_body">
                            <div class="product-item" v-for="ite in item.products" @click.stop="my_modal(ite)">
                                <div class="product-pic" >
                                    <a  v-if="ite.photo != ''" :style="'background:url(/admin/'+ite.photo+') no-repeat 0;background-size:cover'"></a>
                                    <a  v-else ></a>
                                </div>

                                <div class="product-detail">
                                    <h3>{{ite.name.substr(0,12)}}</h3>
                                    <h5>{{ite.short_detail}}</h5>
                                    <span>默认:{{ite.defaults}}</span>
                                    <div class="price">¥ {{ite.price}}</div>
                                    <button type="button"></button>
                                </div>



                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!--<van-popup v-model="show">-->
        <div class="modal fade mymodal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" :style="{backgroundImage: 'url(/admin/'+product.photo+')',backgroundRepeat:'no-repeat',backgroundPosition:'center',backgroundSize:'cover'}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="close"><span aria-hidden="true" >&times;</span></button>
                        <h4 class="modal-title ch-title" id="myModalLabel" >{{product.name}}</h4>
                        <h4 class="modal-title" >Extra Americano</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table mytable">

                            <tr v-for="(item ,index) in product.all_props">
                                <td >{{index}}</td>
                                <td><span v-for="itm in item"  :class="{'badge':true,'size':true,'active':(product.defaults.indexOf(itm.id+'')+1)}" >{{itm.name}}</span></td>
                            </tr>
                            <!--<tr>-->
                                <!--<td>温度</td>-->
                                <!--<td><span class="badge temp ">冰</span><span class="badge temp ">常温</span><span class="badge temp ">热</span></td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                                <!--<td>糖度</td>-->
                                <!--<td><span class="badge sugar ">无糖</span><span class="badge sugar ">半糖</span><span class="badge active sugar ">单糖</span></td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                                <!--<td>奶度</td>-->
                                <!--<td><span class="badge milk">无奶</span><span class="badge active milk">单份奶</span><span class="badge milk">双份奶</span></td>-->
                            <!--</tr>-->
                        </table>

                        <div class="panel panel-default mypanel">
                            <div class="panel-body">
                                {{product.detail}}
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn ">Save changes</button>

                    </div>
                </div>
            </div>
        </div>
        <!--</van-popup>-->
        <tab></tab>

    </div>
</template>

<script>


    export default {
        name: "List",
        data:()=>({
           order_list:[],
           orderIndex:0,
            product: {
            "name":"",
            "photo":"",
            "detail":"",
            'all_props':{},
            'defaults':''
            }
        }),

        created(){
            axios.get('/m/order/m_list').then(res=>{

                console.log(res.data);
                this.order_list = res.data;


            });

        },
        beforeRouteLeave(to,from,next){

            $('.header').addClass('down-order-list').removeClass('up-order-list').slideDown();
            next();
        },
        mounted(){

            $('.product-text').on('touchstart',function(ev){

                var startY = ev.originalEvent.changedTouches[0].pageY;
                $(document).off().on('touchmove',function(ev){
                    var moveEndY = ev.originalEvent.changedTouches[0].pageY;
                    //
                    if(startY-moveEndY>0){//向下滚动
                        if(!$('.header').hasClass('down-order-list'))
                            $('.header').addClass('down-order-list').removeClass('up-order-list').stop().slideDown();
                    }else{
                        if(!$('.header').hasClass('up-order-list'))
                            $('.header').addClass('up-order-list').removeClass('down-order-list').stop().slideUp();

                    }


                });
            });
            $(function(){
                var arr = ["size","temp","sugar","milk"]
                for(var i=0;i<arr.length;i++){
                    do_click(arr[i]);
                }
                function do_click($obj){
                    $("."+$obj).click(function(){
                        if($(this).hasClass("active")){
                            $(this).removeClass("active")
                        }else{
                            $("."+$obj).removeClass("active");
                            $(this).addClass("active")
                        }
                    })
                }
            })


            //滑动商品 栏    标题固定在上方

            $(window).scroll(function(){

                var timeId = null;

                timeId = setTimeout(function(){
                    if(timeId){
                        clearTimeout(timeId);
                    }

                    var scrolTop = $(this).scrollTop();


                    $('.product-head h2').each(function(){
                        if($(this).offset().top-20<=scrolTop){
                            $('.product-head h2').removeClass('title').css('left',0);
                            $(this).addClass('title').css('left',$('.product-list').width());
                        }else {
                            $(this).removeClass('title').css('left',0);
                        }
                    });


                },1000);

            });





        },
        methods:{
            my_modal(item){

                var all_props = {};
                 item.all_prop_values.forEach(el=>{
                    // console.log(el);
                     if(all_props[el.prop_name]){
                         all_props[el.prop_name].push(el);
                     }else {
                         all_props[el.prop_name] = [el];
                     }



                 });

                item.prop_defaults = item.prop_defaults.split(',');

                console.log(all_props,item.prop_defaults,item.prop_defaults.indexOf(3));

                this.product= {
                    "name":item.name,
                    "photo":item.photo,
                    "detail":item.detail,
                    'all_props':all_props,
                    'defaults':item.prop_defaults
                };
                $("#myModal").modal();


                return false;
            },
            close(){
                this.product= {
                    "name":"",
                    "photo":"",
                    "detail":""
                }
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
    .header span{
        width: 80%;
        flex: 1;
        line-height: 1rem;
        text-align: center;
        font-size: 0.34rem;
    }

    .product {
        height: 100%;
        background-color:#f5f8fa;
    }
    .product .row {
        height: 100%;
    }

    #nav-prodOrder-list{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        padding: 0;
        z-index:10;
    }
    #nav-prodOrder-list ul {
        height: 100%;
        background-color: #efefef;
    }
    #nav-prodOrder-list ul > li {
        padding: 0;
        font-size: .28rem;
        border: none;
        border-bottom: 2px #ccc solid;
        background-color: #efefef;
    }
    #nav-prodOrder-list ul > li a {
        color: #616464;
        padding: 10% 6%;
    }
    #nav-prodOrder-list ul > li.active {
        border-bottom: 1px #ccc solid;
    }
    #nav-prodOrder-list ul > li.active a {
        color: black;
        background-color: white;
        font-weight: 600;
    }
    #nav-prodOrder-list ul > li:last-child {
        border-bottom: none;
    }

    .product-text {
        padding: 1% 0;
        height: 100%;
    }

    .product-text > div {
        padding-top: .2rem;
    }
    .product-head {
        position: relative;
        height: 1px;
        background-color: #eee;
        margin: 0 4%;
        margin-top: 10%;
    }
    .product-head h2 {
        position: absolute;
        left: 0;
        bottom: .32rem;
        margin: 0;
        font-size: .28rem;
        font-weight: 800;

    }
    .product-head .title {
        position: fixed;
        top: 0;
        padding: 3.2% 0;
        padding-left: 3%;
        width: 100%;
        height: 4%;
        z-index: 10;
        background-color: white;
    }
    .product-head span {
        position: absolute;
        left: 0;
        bottom: -0.16rem;
        display: block;
        padding-right: 2%;
        background-color: #f5f8fa;
        font-size: .24rem;
        color: #8C8C8C;
    }

    .product-item {
        display: flex;
        justify-content: flex-start;
        margin: 0 4%;
        padding: 3% 0;
        border-bottom: 1px #eee solid;
    }

    .product-item:last-child {
        border: none;
    }

    .product-pic {
        width: 34%;
    }
    .product-pic a {
        display: block;
        width: 100%;
        height: 0;
        padding-bottom: 100%;
        border-radius: 5px;
        /*background: url() no-repeat 0 0 darkcyan;*/
    }

    .product-detail {
        position: relative;
        padding: 0 3%;
        width: 66%;
    }
    .product-detail h3 {
        font-size: 16px;
        font-weight: 600;
        line-height: 20px;
        margin: 0;
    }
    .product-detail h5, .product-detail span {
        margin: 0;
        font-size: 12px;
        line-height: 16px;
        color: #8C8C8C;
    }
    .product-detail button {
        position: absolute;
        right: 0;
        bottom: 2%;
        width: 10%;
        height: 0;
        padding-top: 10%;
        border-radius: 50%;
        border: none;
        background: url(/images/jia.png) no-repeat center #8bbcd2;
        background-size: 80%;
    }
    .product-detail .price {
        position: absolute;
        bottom: -2%;
        left: 4%;
        font-size: .28rem;
        font-weight: 600;
    }


</style>
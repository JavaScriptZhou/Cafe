@extends('admin.layouts.public')


@section('title','产品列表首页')

@section('in-place','Product List')


@section ('main--content')


    <!-- Main Content Start -->
    <section class="main--content product-list">


        <div class="panel">
            <!-- Records List Start -->
            <div class="records--list" data-title="Product Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th class="not-sortable">图片</th>
                        <th>产品名</th>
                        <th>价格</th>
                        <th>产品描述</th>
                        <th>销量</th>
                        <th>上线时间</th>
                        <th class="not-sortable">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <span class="btn-link product_id">{{$product->id}}</span>
                            </td>
                            <td>
                                <a href="/admin/product/{{$product->id}}/edit" class="btn-link">
                                    @if($product->photo == '')
                                    <img src="/admin/img/products/thumb-80x60.jpg" alt="">
                                    @else
                                    <img src="/admin/{{$product->photo}}" alt="">
                                    @endif
                                </a>
                            </td>
                            <td>
                                <span  class="btn-link">{{$product->name}}</span>
                            </td>
                            <td>
                                <span href="#" class="btn-link">¥{{$product->price}}</span>
                            </td>
                            <td>{!! str_limit($product->detail,10,"...") !!}</td>
                            <td>{{$product->sell}}</td>
                            <td>{{$product->created_at}}</td>
                            <td class="product-list-options">

                                <a href="/admin/product/recommend/{{$product->id}}">
                                    @if(!$product->recommend)
                                        <i class="far fa-star"></i>推荐
                                    @else
                                        <i class="far fa-star-half"></i>取消推荐
                                </a>
                                @endif
                                <span>|</span>
                                <a href="#DetailModal" class=" product-information" data-toggle="modal"><i class="far fa-calendar-alt"></i>详情</a>
                                <span>|</span>
                                <a href="/admin/product/{{$product->id}}/edit"><i class="far fa-edit"></i>修改</a>
                                <span>|</span>
                                <a href="/admin/product/{{$product->id}}" class="product-destroy" data-sweet-alert="cancel-button"><i class="far fa-trash-alt "></i>删除</a>
                                <input type="hidden" id="{{$product->id}}">

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{$products->links()}}
            </div>
        </div>
            <!-- Records List End -->




        <!-- All Properties -->
        <div class="panel">
            <div class="records--list" data-title="Product Property Value">
                <table class="table">
                    <thead>
                    <tr>
                        <th>所有可能产品属性名</th>
                        <th>所有可能产品属性值</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <td>
                                {{$property->name}}
                            </td>
                            <td>

                                @if(count($property->prop_values))

                                   @foreach ($property->prop_values as $prop_value)
                                      <span class="prop-value-item"><span class="text">{{$prop_value->name}}</span><a href="#editPropModal"  data-prop_value_id="{{$prop_value->id}}" data-toggle="modal">编辑</a></span>
                                   @endforeach

                                @else
                                    没有对应的属性值 请到该属性下添加
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>






    </section>
    <!-- Main Content End -->

@endsection
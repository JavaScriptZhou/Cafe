@extends("admin.layouts.public")

@section('title','分类产品列表页')

@section('in-place','Cate Product')

@section("main--content")
    <section class="main--content">

            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Product Listing">
                    <table id="recordsListView">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th class="not-sortable">图片</th>
                            <th>产品的名称</th>
                            <th>产品的价格</th>
                            <th>产品的描述</th>
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
                                        <img src="/admin/img/products/thumb-80x60.jpg" alt="">
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
                                    <a href="/admin/product/{{$product->id}}/edit"><i class="far fa-edit"></i>修改</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- Records List End -->
            </div>

    </section>

@endsection




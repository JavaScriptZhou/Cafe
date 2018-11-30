@extends('admin.layouts.public')


@section('title','修改产品')

@section('in-place','Edit Product')




@section ('main--content')

    <!-- Main Content Start -->
    <section class="main--content  product-edit">


        <div class="panel">

            <!-- Edit Product Start -->
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Product Details</h6>


                </div>

                <!-- Tabs Nav Start -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">Edit product</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab02" data-toggle="tab" class="nav-link">Edit property Default</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab03" data-toggle="tab" class="nav-link">Edit properties</a>
                    </li>
                </ul>
                <!-- Tabs Nav End -->

                <!-- Tab Content Start -->
                <div class="tab-content">
                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade show active" id="tab01">
                        <form action="/admin/product/{{$product->id}}" method="post" enctype="multipart/form-data">
                            {{method_field('PUT')}}
                            {{csrf_field()}}
                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品名称: *</span>

                                <div class="col-md-9">
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品描述:</span>

                                <div class="col-md-9">
                                    <textarea name="detail" value="" class="form-control">{{$product->detail}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品价格: *</span>

                                <div class="col-md-9">
                                    <!-- Range Slider Start -->
                                    <input type="text" name="price" value="" data-trigger="range-slider" data-prefix="¥" data-min="20" data-max="2000" data-from="{{$product->price}}">
                                    <!-- Range Slider End -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品图片: *</span>

                                <div class="col-md-9">
                                    <!-- Range Slider Start -->
                                    @empty($product->photo)
                                        <img src="/admin/img/products/thumb-80X60.jpg" width="80" height="60" alt="">
                                    @else
                                        <img src="/admin/{{$product->photo}}" width="80" height="80" alt="">
                                    @endempty
                                    <input type="file" name="photo" value="" class="form-control">
                                    <!-- Range Slider End -->
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" value="Update Product" class="btn btn-rounded btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Tab Pane End -->

                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade" id="tab02">
                        <table class="table">
                            <tr>
                                <th>property name</th>
                                <th>property Default Value</th>
                                <th>options</th>
                            </tr>
                            @foreach($properties as $prop_index=>$property)
                            <tr>
                                <td>
                                    {{$property->name}}
                                </td>
                                <td>
                                    @if(!count($property->prop_values))
                                        没有对应的属性值 请到该属性下添加
                                    @else
                                    <select class="form-control prop_value" id="">

                                            <option value="0" @if($prop_defaults[$prop_index]==0) selected @endif>请选择</option>
                                            @foreach($property->prop_values as $prop_value)
                                            <option value="{{$prop_value->id}}" data-prop-name="{{$property->id}}" data-product-id="{{$product->id}}"   @if($prop_defaults[$prop_index]==$prop_value->id) selected @endif>{{$prop_value->name}}</option>
                                            @endforeach

                                    </select>
                                    @endif

                                </td>
                                <td>
                                    @if(count($property->prop_values))
                                    <a href="#EditDefaultModal" data-default="{{$property->id}}" data-toggle="modal">修改</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Tab Pane End -->

                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade" id="tab03">
                        <table class="table">
                            <tr>
                                <th>Product All Properties</th>
                                <th>All Prop_values(choose)</th>
                            </tr>
                            @foreach($prop_names as $prop_name)
                            <tr>
                                <td>{{$prop_name->name}}</td>
                                <td>
                                    @if(count($prop_name->prop_values))
                                        @foreach($prop_name->prop_values as$prop_value)
                                        {{$prop_value->name}}
                                            @if(!$product->hasProp_value($prop_value->id))
                                                <a href="#SureModal" data-prop-id="{{$prop_value->id}}" data-product-id="{{$product->id}}" class="btn btn-outline-secondary btn-sm"  data-toggle="modal">添加到产品</a>
                                            @else
                                                <button type="button" class="btn btn-outline-secondary btn-sm" disabled>已有该属性值</button>
                                            @endif
                                        @endforeach
                                    @else
                                        当前属性名下未有属性值名称 ，请去添加
                                    @endif
                                </td>
                            </tr>
                            @endforeach


                        </table>

                    </div>
                    <!-- Tab Pane End -->
                </div>
                <!-- Tab Content End -->
            </div>
            <!-- Edit Product End -->
        </div>
    </section>
    <!-- Main Content End -->

@endsection

@extends('admin.layouts.public')


@section('title','添加新产品')

@section('in-place','Add  Product')



@section ('main--content')

    <!-- Main Content Start -->
    <section class="main--content  product-build">


        <div class="panel">

            <!-- Edit Product Start -->
            <div class="records--body">
                <div class="title">
                    <h6 class="h6">Product Details</h6>


                </div>

                <!-- Tabs Nav Start -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#tab01" data-toggle="tab" class="nav-link active">New Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab02" data-toggle="tab" class="nav-link">Add New Property</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab03" data-toggle="tab" class="nav-link">All Properties</a>
                    </li>
                </ul>
                <!-- Tabs Nav End -->

                <!-- Tab Content Start -->
                <div class="tab-content">
                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade show active" id="tab01">
                        <form action="/admin/product" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品名称: *</span>

                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品描述:</span>

                                <div class="col-md-9">
                                    <textarea name="detail" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品价格: *</span>

                                <div class="col-md-9">
                                    <!-- Range Slider Start -->
                                    <input type="text" name="price" value="" data-trigger="range-slider" data-prefix="¥" data-min="20" data-max="2000" data-from="200">
                                    <!-- Range Slider End -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">产品图片: *</span>

                                <div class="col-md-9">
                                    <!-- Range Slider Start -->

                                    <img src="/admin/img/avatars/03_80x80.png" alt="">
                                    <input type="file" name="photo" value="" class="form-control">
                                    <!-- Range Slider End -->
                                </div>
                            </div>




                            <div class="row mt-3">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" value="Create Product" class="btn btn-rounded btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Tab Pane End -->


                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade" id="tab02">
                        <form action="/admin/product/prop_name" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">Add Product Property（产品属性名称）</span>


                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" value="Add  Property" class="btn btn-rounded btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Tab Pane End -->

                    <!-- Tab Pane Start -->
                    <div class="tab-pane fade" id="tab03">
                        <form action="/admin/product/prop_value" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">Product Property Values(产品属性值 名称)(choose): </span>

                                <div class="col-md-9">
                                    <input type="text" name="name"  class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <span class="label-text col-md-3 col-form-label">Product Property （所属的产品属性名称）: </span>

                                <div class="col-md-9">
                                    <select name="prop_name_id"  class="form-control">

                                        @foreach ($properties as $property)
                                        <option value="{{$property->id}}">{{$property->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-9 offset-md-3">
                                    <input type="submit" value="Add Property Values" class="btn btn-rounded btn-success">
                                </div>
                            </div>
                        </form>
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


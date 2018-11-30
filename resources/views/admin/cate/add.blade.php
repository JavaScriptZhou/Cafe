@extends("admin.layouts.public")

@section('title','添加新分类')

@section('in-place','Add Cate')

@section("main--content")

    <!--main_top-->
        <section class="main--content">


            <div class="panel">

                <!-- Edit Product Start -->
                <div class="records--body">
                    <div class="title">
                        <h6 class="h6">Cate Details</h6>

                    </div>

                    <!-- Tabs Nav Start -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#tab01" data-toggle="tab" class="nav-link active">Cate</a>
                        </li>

                    </ul>
                    <!-- Tabs Nav End -->

                    <!-- Tab Content Start -->
                    <div class="tab-content">
                        <!-- Tab Pane Start -->
                        <div class="tab-pane fade show active" id="tab01">
                            <form action="/admin/cate" method="post" enctype="multipart/form-data">

                                {{csrf_field()}}
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">主题名称: *</span>

                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" required value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">主题的英文名: *</span>

                                    <div class="col-md-9">
                                        <input type="text" name="english_name" class="form-control" required value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">主题的图片: *</span>
                                    <div class="col-md-9">
                                        <div class="form-group icon>
                                            {{--<img src="/upload/img/123.jpg" width="100" alt=""><br/>--}}
                                            <input type="file" name="photo" id="user_icon">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <span class="label-text col-md-3 col-form-label">主题的长描述:</span>

                                    <div class="col-md-9">
                                        <textarea name="des" class="form-control"></textarea>
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


                        <!-- Tab Pane End -->
                    </div>
                    <!-- Tab Content End -->
                </div>
                <!-- Edit Product End -->
            </div>

        </section>
@endsection




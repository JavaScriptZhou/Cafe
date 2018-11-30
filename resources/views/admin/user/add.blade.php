@extends('admin.layouts.public')


@section('title','添加新用户')

@section('in-place','Add  User')



@section("main--content")
<!-- Main Content Start -->
<section class="main--content">

    <div class="panel">

        <!-- Edit Product Start -->
        <div class="records--body">
            <div class="title">
                <h6 class="h6">User Details</h6>

                <a href="#" class="btn btn-rounded btn-danger">Delete User</a>
            </div>

            <!-- Tabs Nav Start -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#tab01" data-toggle="tab" class="nav-link active">Basic</a>
                </li>

            </ul>
            <!-- Tabs Nav End -->

            <!-- Tab Content Start -->
            <div class="tab-content">
                <!-- Tab Pane Start -->
                <div class="tab-pane fade show active" id="tab01">
                    <form action="/admin/user/insert" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">用户名:*</span>

                            <div class="col-md-9">
                                <input type="text" name="name" class="form-control" value="" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">E-mail:*</span>

                            <div class="col-md-9">
                                <input type="text" name="email" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">密码:*</span>

                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">头像:*</span>

                            <div class="col-md-9">
                                <label class="custom-file">
                                    <input type="file" class="custom-file-input" name="photo" >
                                    <span class="custom-file-label">选择文件</span>
                                </label>
                            </div>
                        </div>


                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">性别:*</span>

                            <div class="col-md-9 form-inline">
                                <label class="form-radio mr-3">
                                    <input type="radio" name="sex" value="m" class="form-radio-input" >
                                    <span class="form-radio-label">男</span>
                                </label>

                                <label class="form-radio">
                                    <input type="radio" name="sex" value="w" class="form-radio-input" >
                                    <span class="form-radio-label">女</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">权限:*</span>

                            <div class="col-md-9">
                                <select name="auth" class="form-control">
                                    <option  value="0">普通用户</option>
                                    <option  value="1">普通管理员</option>
                                    <option  value="2">超级管理员</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <span class="label-text col-md-3 col-form-label">状态:*</span>

                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                    <option  value="1">允许</option>
                                    <option  value="0">禁止</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-9 offset-md-3">
                                <input type="submit" value="提交信息" class="btn btn-rounded btn-success">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- Tab Content End -->
        </div>
        <!-- Edit Product End -->
    </div>
</section>



@endsection

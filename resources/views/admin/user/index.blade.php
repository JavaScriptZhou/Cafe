@extends('admin.layouts.public')





@section('title','用户列表页')

@section('in-place','User List')



@section("main--content")
        <!-- Page Header Start -->

        <!-- Page Header End -->

        <!-- Main Content Start -->
        <script src="/admin/js/fun.js"></script>
        <section class="main--content">
            <div class="panel">
                <!-- Records Header Start -->
                <div class="records--header">
                    <div class="title fa-shopping-bag">
                        <h3 class="h3">All Users <a href="#" class="btn btn-sm btn-outline-info">Manage Products</a></h3>
                        <p>Found Total {{count($users)}} Users</p>
                    </div>

                    <div class="actions">
                        <form action="#" class="search flex-wrap flex-md-nowrap">
                            <input type="text" class="form-control" placeholder="Product Name..." required>
                            <select name="select" class="form-control">
                                <option value="" selected>Product Category</option>
                            </select>
                            <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                        </form>

                        <a href="user/add" class="addProduct btn btn-lg btn-rounded btn-warning">新增用户</a>
                    </div>
                </div>
                <!-- Records Header End -->
            </div>

            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Users Listing">
                    <table id="recordsListView">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th class="not-sortable">头像</th>
                            <th>用户名</th>
                            <th>E-mail</th>
                            <th>性别</th>
                            <th>权限</th>
                            <th>状态</th>
                            <th class="not-sortable">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="#" class="btn-link">{{$user->id}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">
                                    <img src="/admin/user_icon/{{$user->photo}}" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$user->name}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$user->email}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$user->sex}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$user->auth}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$user->status}}</a>
                            </td>
                            <td>
                                <div class="dropleft">
                                    <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                    <div class="dropdown-menu">
                                        <a href="user/{{$user->id}}/edit" class="dropdown-item">编辑</a>
                                        <a href="user/delete/{{$user->id}}" class="dropdown-item">删除</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Records List End -->
            </div>
        </section>
        <!-- Main Content End -->



@endsection

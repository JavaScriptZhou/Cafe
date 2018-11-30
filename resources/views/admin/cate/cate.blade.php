@extends("admin.layouts.public")

@section('title','分类列表首页')

@section('in-place','Cate List')

@section("main--content")
    <!--main_top-->
        <section class="main--content">



            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Product Listing">
                    <table id="recordsListView">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th class="not-sortable">分类展示图</th>
                            <th>分类主题名</th>
                            <th>分类主题英文名</th>
                            <th>分类创建时间</th>
                            <th class="not-sortable">分类编辑</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cates as $cate)

                        <tr>
                            <td>
                                <a href="#" class="btn-link">{{$cate->id}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">
                                    @if($cate->photo)
                                        <img src="/upload/{{$cate->photo}}" alt="">
                                    @else
                                        <img src="/upload/img/123.jpg" alt="">

                                    @endif
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$cate->name}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$cate->english_name}}</a>
                            </td>
                            <td>
                                <a href="#" class="btn-link">{{$cate->created_at}}</a>
                            </td>
                            <td class="cate_edit">
                                <a href="/admin/cate/{{$cate->id}}">Check</a>  |
                                <a href="/admin/cate/{{$cate->id}}/edit">Edit</a>  |
                                <a href="/admin/cate/{{$cate->id}}" >Delete</a>
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




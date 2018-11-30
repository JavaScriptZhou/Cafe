<?php

namespace App\Http\Controllers\admin;

use App\Cate;
use App\Product;
use App\Prop_value;
use App\Prop_name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //显示分类后台视图
    public function index()
    {
        //$cates = Cate::orderBy('created_at','desc')->paginate(5);
        $cates = Cate::all();
        //return $cates;
        return view("admin/cate/cate",compact("cates"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //显示添加分类页面
    public function create()
    {
        //var_dump($cate);die;
        return view("admin/cate/add");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //添加分类
    public function store(Request $request)
    {
        //dd($request->toArray());
        $data = $request->except("_token");
        $data["name"] = $request->name;
        $data["des"] = $request->des;

        //图片上传路劲
        $path=base_path("public\upload\\");
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');  //获取UploadFile实例

            if ( $file->isValid()) { //判断文件是否有效

                //上传图片
                $ext = $file->getClientOriginalExtension(); //扩展名
                $file_name = time() . "." . $ext;    //上传文件的名字重命名
                $res=$file->move($path, $file_name); //将上传文件移动至指定目录
            }
        }
        $data["photo"] = $file_name;
        Cate::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
//        $cates = Cate::all();
//        $cate=Cate::find($id);
        $cate = Cate::find($id);
        $products = $cate->products;
        return view("admin/cate/product",compact('products'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //修改分类，
    public function edit($id)
    {

        $cates = Cate::all();
        $cate=Cate::find($id);
        //var_dump($cate);die;
        return view("admin/cate/cate_edit",compact("cates","cate"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //执行修改
    public function update(Request $request,$id)
    {
        //验证
        //$this->validate(request(),[
        //    'name' => 'required',
        //    'des' => 'required'
        //]);

        //逻辑

        $cate = Cate::find($id);
        //保存数据
        $data = $request->except("_token","_method");
        $data["name"] = $request->name;
        $data["des"] = $request->des;

        Cate::where("id",$id)->update($data);

        //图片上传路劲
        $path=base_path("public\upload\\");

        //原图像路径
        $oldphoto = $path.$cate->photo;
        $flag = $cate->photo;
        //dd($flag);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');  //获取UploadFile实例
            if ( $file->isValid()) { //判断文件是否有效
                //上传图片
                $ext = $file->getClientOriginalExtension(); //扩展名
                $file_name = time() . "." . $ext;    //上传文件的名字重命名
                $res=$file->move($path, $file_name); //将上传文件移动至指定目录

                // 保存新图
                $cate->photo= $file_name;
                $cate->save();

                // 删除原图
                if($flag){
                    unlink($oldphoto);
                }
            }
        }

        //渲染
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //删除分类
    public function destroy($id)
    {
        //判断分类下边有没有产品   没有就可以删除  有就不可以删除


    }





    //移动端

        //主题列表
    public function m_theme_list()
    {
       $themes = Cate::all();

       foreach($themes as $theme){
           for($i = 0;$i<ceil(mb_strlen($theme->des)/14);$i++){
               $theme->des_arr .=mb_substr($theme->des,$i*14,($i+1)*14).",";
           }
       }

       return $themes;
    }

        //菜单列表
    public function m_order_list()
    {
        //所有分类
        $cates = DB::table('cates')->select('des','id','name')->get();




        foreach($cates as $cate){



            $cate->products = Product::where('cate_id',$cate->id)->get();

            $cate->short_des = mb_substr($cate->des,0,6);
            foreach($cate->products as $product){
                $product->short_detail = mb_substr($product->detail,0,6);

                //设定的默认值id
                $prop_default_ids = explode(',',$product->prop_defaults);

                //默认值名称
                $defaults = '';
                foreach($prop_default_ids as $prop_default_id){
                    if($prop_default_id != 0){
                        $defaults .= Prop_value::where('id',$prop_default_id)->value('name').'/';
                    }
                }
                if(!$defaults){
                    $defaults = '暂无默认设定值';
                }else {
                    $defaults = mb_substr($defaults,0,mb_strlen($defaults)-1);
                }
                $product->defaults = $defaults;



                if($product->prop_values){

                    $all_prop_value_ids = explode(",",$product->prop_values);

                    //所有的产品的可能属性值
                    $all_prop_values = [];

                    $all_prop_values = Prop_value::whereIn('id',$all_prop_value_ids)->get();

                    foreach($all_prop_values as  $all_prop_value){
                        $all_prop_value->prop_name = Prop_name::where('id',$all_prop_value->prop_name_id)->value('name');
                    }
                    $product->all_prop_values = $all_prop_values;

                }else {

                    //所有的产品的可能属性值
                    $all_prop_values = "还未设定值";

                    $product->all_prop_values = $all_prop_values;
                }


                unset($product->photo_size);
                unset($product->prop_names);
                unset($product->prop_values);
                unset($product->updated_at);


            }
        }

        return $cates;

    }
}

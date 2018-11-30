<?php

namespace App\Http\Controllers\Admin;

use App\Prop_name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Prop_value;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(6);

//        dd($products[0]);

        $properties = Prop_name::all();
        return view('/admin/product/index',compact('products','properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $properties = Prop_name::all();


        return view('/admin/product/add',compact('properties'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(),[
            'name'=>'required|min:2',
            'detail'=>'required|min:10',
            'price'=>'required'
        ]);

        $product = $request->except('_token');
//        dd($product);

        if($request->hasFile('photo')){
            $picname = $request->photo->store('img/product');

            if($request->file('photo')->isValid()){
                $data = file_get_contents(base_path('public/admin/').$picname);
                $size_info = getimagesizefromstring($data);
            }




            //上传图片路径
            $product['photo'] = $picname;

            //上传图片高宽比
            $product['photo_size'] = ($size_info[1]/$size_info[0]).":1";

        }

        Product::create($product);

        return  redirect('/admin/product/build');

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
        $product = Product::where('id',$id)->select('id','name','price','detail','sell','created_at')->first();
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        //取出产品的四个基本属性

        $product = Product::where('id',$id)->first();
        $pro_name_ids = explode(",",$product->prop_names);


        $properties = Prop_name::whereIn('id',$pro_name_ids)->get();

        $prop_defaults = explode(",",$product->prop_defaults);


        $prop_names = Prop_name::all();

        return view('/admin/product/edit',compact('product','properties','prop_defaults','prop_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate(request(),[
            'name'=>'required|min:2',
            'detail'=>'required|min:10',
            'price'=>'required'
        ]);

        $product = $request->except('_token','_method');
//        dd($product);

        if($request->hasFile('photo')){
            $picname = $request->photo->store('img/product');

            Storage::delete(Product::where('id',$id)->value('photo'));
            if($request->file('photo')->isValid()){
                $data = file_get_contents(base_path('public/admin/').$picname);
                $size_info = getimagesizefromstring($data);

            }




            //上传图片路径
            $product['photo'] = $picname;

            //上传图片高宽比
            $product['photo_size'] = ($size_info[1]/$size_info[0]).":1";

        }

        Product::where('id',$id)->update($product);

        return  redirect('/admin/product');

        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //

        $product->delete();
//
        return "ok";
    }



    /**
     * Coffee store  recommend or cancel recommend  an product
     *
     */
    public function  recommend(Product $product)
    {
        $product->recommend = $product->recommend == 0?1:0;

        $product->save();

        return redirect('/admin/product');
    }


    /**
     * save  product prop_name chart new value
     *
     */
    public function  prop_name(Request $request)
    {
        $this->validate(request(),[
           'name'=>'required'
        ]);

        $prop_name = $request->except('_token');


        Prop_name::create($prop_name);

        return back()->with('success','新属性名添加成功！');
    }

    /**
     * save  product prop_value  chart new value
     *
     */
    public function  prop_value(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required'
        ]);

        $prop_value = $request->except('_token');

//        dd($prop_value);
        Prop_value::create($prop_value);

        return back()->with('success','新属性值名称添加成功！');
    }


    /**
     *
     * save  property value to the product
     *
     */
    public function add_prop_values($ids)
    {
        $ids = explode("-",$ids);



        //属性值 id
        $prop_value_id = $ids[0];


        //产品 id
        $product_id = $ids[1];


        $prop_values = Product::where('id',$product_id)->value('prop_values');


        // 字符拼接   或  空时直接为属性值id
        if($prop_values != ''){
            $prop_values .=','.$prop_value_id;
        }else {
            $prop_values = $prop_value_id;
        }


        Product::where('id',$product_id)->update(['prop_values'=>$prop_values]);


//        $product = Product::find($product_id);
//        dd($product->hasProp_value(1));

        return $ids;
    }


    /**
     *
     * edit  product default  prop_value
     *
     */
    public function edit_default_prop($defaults)
    {
        $defaults = explode('-',$defaults);

        //要设定的属性值id
        $prop_default_id = $defaults[0];

        //所属的属性名id
        $prop_name_id = $defaults[1];

        //产品的id
        $product_id = $defaults[2];

        //该产品的默认值 如  0,0,0,0
        $prop_defaults =Product::where('id',$product_id)->value('prop_defaults');


        //不可加修改、删除属性名 的操作  属性名表（prop_names）只能添加
        $prop_defaults = explode(',',$prop_defaults);

        $prop_defaults[$prop_name_id-1] = $prop_default_id;

        $prop_defaults = implode(",",$prop_defaults);



        //将修改好的$prop_defaults 添加到产品表中
        Product::where('id',$product_id)->update(compact('prop_defaults'));


        return 'ok';


    }


    /**
     *
     * take  all prop_names
     *
     */
    public function all_props($prop_value_id)
    {
        $prop_names = Prop_name::all();

        $prop_value = Prop_value::find($prop_value_id);
        return compact('prop_names','prop_value');

    }


    /**
     *
     * edit  one prop_value    id  or prop_name_id
     *
     */
    public function edit_prop_value(Request $request)
    {

        //取得传过来的值
        $data = $request['data'];

        //修改后的值数组
        $editData = [];

        if(count($data) == 3){
            $prop_name_id = $data['prop_name_id'];
            $editData['prop_name_id'] = $prop_name_id;
        }


        $prop_value_id = $data['prop_value_id'];

        $prop_value_name = $data['prop_value_name'];


        $editData['name'] = $prop_value_name;


        Prop_value::where('id',$prop_value_id)->update($editData);


        return 'ok';
    }

    //移动端
        //产品精选
      public function m_product_leader()
      {
          $recommends = Product::orderBy('recommend','desc')->orderBy('sell','desc')->take(10)->get();

          foreach($recommends as $recommend){
              $recommend->short_detail = mb_substr($recommend->detail,0,15);
          }
    //      dd($recommends);
          return $recommends;
      }


      //主题推荐
    public function m_recommend($theme)
    {
        $theme = explode('-',$theme);

        //主题id
        $theme_id = $theme[0];

        //页码
        $pageIndex = $theme[1];

        //该主题下的推荐
        $recommends = Product::where('cate_id',$theme_id)->orderBy('recommend','desc')->orderBy('sell','desc')->offset($pageIndex*4)->limit(4)->get();


        return $recommends;



    }
}

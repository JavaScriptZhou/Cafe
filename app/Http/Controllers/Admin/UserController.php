<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin/user/index',compact("users"));
    }
    public function edit(User $user){
        return view('admin/user/edit',compact("user"));
    }

    public function save(User $user,Request $request){
        $path=base_path("public\admin\user_icon\\");
        $oldicon = $path.$user->photo;
        $exist = $user->photo;
//        dd($path,$oldicon,$exist);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');  //获取UploadFile实例
            if ( $file->isValid()) { //判断文件是否有效

                //上传图片
                $ext = $file->getClientOriginalExtension(); //扩展名
                $file_name = time() . "." . $ext;    //重命名
                $res=$file->move($path, $file_name); //将上传文件移动至指定目录
                // 保存新图
                $user->photo= $file_name;
                $user->save();

                // 删除原图
                if($exist){
                    unlink($oldicon);
                }
            }
        }
        $res = User::where("id",$user->id)->update(request()->except("_token","photo"));
        if($res){
            return redirect('admin/user')->with('success','修改成功！');
        }else{
            return redirect('admin/user')->with('error','修改失败！');
        }
    }

    public function add(){
        return view('admin/user/add');
    }

    public function insert(Request $request){
        $data=$request->except("_token","photo");
//        dd($data);
        $path=base_path("public\admin\user_icon\\");
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');  //获取UploadFile实例
            if ( $file->isValid()) { //判断文件是否有效

                //上传图片
                $ext = $file->getClientOriginalExtension(); //扩展名
                $file_name = time() . "." . $ext;    //重命名
                $res=$file->move($path, $file_name); //将上传文件移动至指定目录
                // 保存新图
//                $data->photo= $file_name;
//                dd($file->getFilename());
//                $user->save();
                $data['photo'] = $file_name;

            }
        }
        $data['password']=bcrypt($request->password);
//        dd($data);
        $res = User::create($data);
        if($res){
            return redirect('admin/user')->with("success","添加成功！");
        }else{
            return redirect('admin/user/add')->with("error","添加失败！");
        }
    }
    public function delete($id){
        User::destroy($id);
        return redirect('admin/user')->with("success","删除成功！");
    }
}

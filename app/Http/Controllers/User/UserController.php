<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Cast\Object_;

class UserController extends Controller
{
    function dologin(Request $request)
    {
        $user = \request(["email", "password"]);
        // 验证用户名与密码是否匹配
        if(\Auth::guard("web")->attempt($user)){
            return array("islogin"=>true,"user"=>\Auth::user(),"msg"=>"登录成功");
        }else{
            return array("islogin"=>false,"msg"=>"用户名与密码不匹配");
        }
        return $user;
//        if (\Auth::guard("web")->attempt($user)) {
//            //return \Redirect("home/index");
//            $user = \Auth::user();
//            $data = array("islogin" => true, "user" => $user);
//            return json_encode($data);
//        } else {
//            $data = array("islogin" => false);
//            return json_encode($data);
//        }
    }
    function logout(){
        \Auth::guard("web")->logout();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/index');
    }

    public function m_login(Request $request){
        // 验证用户名与密码是否匹配
        $user = \request(["email", "password"]);
        // 验证用户名与密码是否匹配

        if(\Auth::guard("web")->attempt($user)){
            return array("islogin"=>true,"user"=>\Auth::user(),"msg"=>"登录成功");
        }else{
            return array("islogin"=>false,"msg"=>"用户名与密码不匹配");
        }
        return $user;
//        if (Auth::check()) {
//            // 用户已登录...
//            return view('user/index');
//        }else{
//            return redirect('user/login');
//        }
    }
    public function m_register(Request $request){
        $arr = $request->toArray();
        $arr['password']=bcrypt($request['password']);
//        User::create($request);

        User::create($arr);
        return "ok";
    }

    public function m_update(Request $request){
//        return $request;
        $arr = $request->toArray();
        User::where("id",$request->id)->update($arr);
        return array("user"=>\Auth::user());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

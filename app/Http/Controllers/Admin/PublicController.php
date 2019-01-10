<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PublicController extends Controller
{
    public function login(){
    	return view('admin.public.login');
    }


    //验证数据
    public function check(Request $request){
        //开始自动验证
        $this -> validate($request,[
            //验证规则语法   需要验证的字段名 => '验证规则1|验证规则2|验证规则3:20|...'
            //用户名，必填，长度介于2~20
            'username'  =>  'required|min:2|max:20',
            //密码，必填，长度至少是6
            'password'  =>  'required|min:6',
            //验证码，必填，长度等于5，必须是合法的验证码
            'captcha'   =>  'required|size:4|captcha'
        ]);
        //继续开始进行身份核实
        $data = $request -> only(['username','password']);
        $data['status'] = '2';  //要求状态为启动的用户
        $result = Auth::guard('admin') -> attempt($data,$request -> get('online'));
        //判断是否成功
        if($result){
            //跳转到后台页面
            return redirect('/admin/index/index');
        }else{
            //跳到登录页面
            return redirect('/admin/public/login') -> withErrors([
                'loginError'    =>  '用户名或密码错误。'
            ]);
        }
    }


    public function logout(){
        
        Auth::guard('admin')->logout();
        return redirect('/admin/public/login');
    }



}

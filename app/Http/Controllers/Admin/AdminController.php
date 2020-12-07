<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginValidation;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function get_login_page(){
        return view('admin.login');
    }

    /*************************************/

    public function admin_login_info(AdminLoginValidation $request){
        //$data = $request->all();
        if(Auth::guard('admin')->attempt(
            ['email'=>$request->input('email'), 'password'=>$request->input('password')]
        )){
            return redirect()->route('dashboard');
        }

        return redirect()->route('admin.login')->with(['error'=>'هناك خطا في بيانات الدخول']);
    }

    /*************************************/

    public function get_dashboard(){
        return view('admin.dashboard');
    }

    /*************************************/

    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /*************************************/

    
}

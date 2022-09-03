<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
session_start();

class AuthController extends Controller
{
    public function index(){
        $admin = Admin::with('roles')->orderBy('admin_id','desc')->get();
        return view('admin.users.all_users')->with(compact('admin'));
    }

    public function add_user(){
        return view('admin.users.all_users');
    } 

    public function assign_roles(Request $request){
        $data = $request->all();
        $user = Admin::where('admin_email', $data['admin_email'])->first();
        $user->roles()->detach();
        if($request['author_role']){
            $user->roles()->attach(Roles::where('name', 'author')->first());
        }
        if($request['user_role']){
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        if($request['admin_role']){
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        return redirect()->back();
    }

    public function store_users(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name', 'user')->first());
        Session::put('message', 'Thêm người dùng thành công');
        return redirect::to('users');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function register_auth(){
        return view('admin.custom_auth.register');
    }

    public function register(Request $request){
        $this->validation($request);
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        
        return redirect('/register-auth')->with('message','success');
    }

    public function validation($request){
        return $this->validate($request,[
            'admin_name' => 'required|max:255',
            'admin_phone' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
    }

    public function login_auth(){
        return view('admin.custom_auth.login_auth');
    }

    public function login(Request $request){
        // $data = $request->all();
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
            return redirect('/dashboard');
        }else{
            return redirect('/login-auth')->with('message', 'Login failed');
        }
    }  
}

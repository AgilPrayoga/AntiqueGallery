<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Mimin;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function login_form()
    {
        return view('login');
    }
    
    public function login_action(Request $request)
    {
        
        
        $users = Users::where('username',$request->username)->first();
        
        if($users == null){
            
            return redirect()->back()->with('msg','Masukan akun Anda terlebih dahulu!');
        }
        
        $db_password=$users->password;
        $hashed_password =Hash::check($request->password,$db_password);
        
        
        if ($hashed_password){
            
            
            $users->token =Str::random(20);
            $users->save();
            
            $request->session()->put('token',$users->token);
            
            
            
            return to_route('showcase');
        }else{
            
            return redirect()->back()->with('err','Username atau password tidak di temukan!');
        }
        
        
    }
    
    public function sign_up_form()
    {
        return view('signup');
    }
    
    public function sign_up_action(Request $request){
        
        
        
        $request->validate([
            'username'=>['required','unique:Users','max : 30'],
            'email'=>['required'],
            'Notelp'=>['nullable'],
            'admin'=>['require'],
            'password'=>['required','confirmed'],
            'password_confirmation'=>['required',]
        ]);

        $created = Users::create([
            "username"=>$request->username,
            "email"=>$request->email,
            "Notelp"=>$request->no_telp,
            "password"=>bcrypt($request->password),
            "admin"=>false,
            
            
            
        ]);
        
        
        
        if($created){
            
            return to_route('login_form')->with('msg','akun Anda berhasil di buat.');
        }
        else{
            return dd($request);
            // return to_route('login_form')->with('err','akun gagal di buat.!!');
            
        }
        
    }
    public function logout(Request $request)
    {
        Users::where('token',$request->token)->update([
            'token'=>null,
            'admintkn'=>null
        ]);
        
        Session::pull('token','admintkn');
        
        return to_route('login_form')->with('msg','Anda telah logout');
        
    }
    public function card_detail($id){
        if(Session::get('token') == null){
            return to_route('login_form')->with('error','Login terlebih dahulu!!');
        }
        if(Session::has('token')){
            $users= Users::where('token',Session::get('token'))->first();
            $items= Items::find($id);
            return view('detail',[
                "user"=>$users,
                "db_token"=>$users->token,
                "item"=>$items
                
                
            ]);
        }
        else{
            
            //jika tidak terdapat token balik ke login page
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function profile(){
        
        if(Session::get('token') == null){
            return to_route('login_form')->with('error','Login terlebih dahulu!!');
        }
        if(Session::has('token')){
            $users= Users::where('token',Session::get('token'))->first();
            
            return view('userProfile',[
                "users"=>$users,
                "db_token"=>$users->token,
                
            ]);
        }
        else{
            
            //jika tidak terdapat token balik ke login page
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function edit_profile(Request $request){
        $request->validate([
            'username'=>['required'],
            'email'=>['required'],
            'Notelp'=>['nullable'],
            'password'=>['nullable','confirmed'],
            'password_confirmation'=>['required'],
            'alamat'=>['nullable'],
        ]);
        
        
        
        if($request->password==null){
            $edit= Users::where('id',$request->id)->update([
                "username"=>$request->username,
                "email"=>$request->email,
                "Notelp"=>$request->Notelp,
                "alamat"=>$request->alamat,
                "admin"=>false,
                
                
                
                
            ]);
        }else{
            $edit= Users::where('id',$request->id)->update([
                "username"=>$request->username,
                "email"=>$request->email,
                "Notelp"=>$request->Notelp,
                "alamat"=>$request->alamat,
                "admin"=>false,
                "password"=>bcrypt($request->password),
                
                
                
            ]);
        }
        
        
        
        
        
        if($edit){
            return to_route('profile')->with('msg','items berhasil di edit.');
        }
        else{
            return to_route('profile')->with('msg','items gagal di edit.');
        }
    }
    
}

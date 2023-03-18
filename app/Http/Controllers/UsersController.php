<?php

namespace App\Http\Controllers;

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
        
        //validasi login mengecek username
       $users = Users::where('username',$request->username)->first();
        if($users == null){
            //jika tidak terdapat username maka kembalikan ke login page
            return redirect()->back()->with('error','username/password salah!');
        }
        
        //validasi login mengecek password
        //password yang dicek menggunakan hash karena password yang ada di dalam database telah di encrypsi
        $db_password=$users->password;
        $hashed_password =Hash::check($request->password,$db_password);
        

        if ($hashed_password){
            
            //jika password terdapat didatabase maka buat token 
            $users->token =Str::random(20);
            $users->save();

            //menaruh token dari database ke session
            $request->session()->put('token',$users->token);
            

            //->dashboard
            return to_route('showcase');
        }else{
            //jika tidak terdapat password kembali ke login page
            return redirect()->back()->with('error','Username atau password tidak di temukan!');
        }
        
    }

    public function showcase(){

        //mengecek apakah terdapat token pada session
        //pengecekan bertujuan agar user tidak bisa mengakses showcase sebelum login
        
        if(Session::get('token') == null){
            return to_route('login_form')->with('error','Login terlebih dahulu!!');
        }
        if(Session::has('token')){
            $users= Users::where('token',Session::get('token'))->first();
            return view('showcase',[
                "user"=>$users,
                "db_token"=>$users->token
                
                
                
            ]);
        }
        else{
            
            //jika tidak terdapat token balik ke login page
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function showcase_logout(Request $request)
    {
        Users::where('token',$request->token)->update([
            'token'=>null
        ]);
        Session::pull('token');
        return to_route('login_form')->with('msg','anda telah logout');
        
    }

    public function sign_in_form()
    {
        return view('signin');
    }

    public function sign_in_action(Request $request){
        $request->validate([
            'username'=>['required','unique:Users','max : 30'],
            'email'=>['required'],
            'no_telp'=>['nullable'],
            'admin'=>['require'],
            'password'=>['required','confirmed'],
            'password_confirmation'=>['required',]
        ]);
        
        
        $created = Users::create([
            "username"=>$request->username,
            "email"=>$request->email,
            "no-telp"=>$request->no_telp,
            "password"=>bcrypt($request->password),
            "admin"=>false


        ]);
        if($created){
            return to_route('login_form')->with('msg','akun berhasil di buat.');
        }
        else{
            return view('signin')->with('msg','akun gagal di buat.!!');
        }
    }
}

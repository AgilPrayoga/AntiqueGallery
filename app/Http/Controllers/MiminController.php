<?php

namespace App\Http\Controllers;
use App\Models\Items;
use App\Models\Mimin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MiminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login_admin_form()
    {
        return view('admin');
    }
    
    public function admin_action(Request $request)
    {
        
        //validasi login mengecek username
       $users = Mimin::where('username',$request->username)->first();
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
            return to_route('admin_dashboard');
        }else{
            //jika tidak terdapat password kembali ke login page
            return redirect()->back()->with('error','Username atau password tidak di temukan!');
        }
        
    }
    public function admin_dashboard()
    {
        //mengecek apakah terdapat token pada session
        //pengecekan bertujuan agar user tidak bisa mengakses showcase sebelum login
        
        if(Session::get('token') == null){
            return to_route('login_admin_form')->with('error','Login terlebih dahulu!!');
        }
        if(Session::has('token')){
            $mimin= Mimin::where('token',Session::get('token'))->first();
            $items = Items::get();
        
            return view('admin_dashboard',[
                "items"=>$items,
                "user"=>$mimin,
                "db_token"=>$mimin->token
                
                
                
            ]);
        }
        else{
            
            //jika tidak terdapat token balik ke login page
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function admin_logout(Request $request)
    {
        Mimin::where('token',$request->token)->update([
            'token'=>null
        ]);
        Session::pull('token');
        return to_route('login_admin_form')->with('msg','anda telah logout');
        
    }
    
}

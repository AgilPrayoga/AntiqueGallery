<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Users;

class ItemsController extends Controller
{
    public function dashboard_action(Request $request){
        
        $datapost=$request->validate([
            'itemname'=>['required'],
            'quantity'=>['required'],
            'price'=>['required'],
            'tag'=>['nullable'],
            'image'=>['required','file','image'],
            'description'=>['required']
        ]);
        
        $datapost['image']=$request->file('image')->store('images');
        
        
       
        
        $created = Items::create($datapost);
         
        $created->save();
        if($created){
            return to_route('admin_dashboard')->with('msg','items berhasil di buat.');
        }
        else{
            return to_route('login_form')->with('msg','items gagal di buat.!!');
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
            $items= Items::get();
            return view('showcase',[
                "user"=>$users,
                "db_token"=>$users->token,
                "items"=>$items
                
                
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
   
}
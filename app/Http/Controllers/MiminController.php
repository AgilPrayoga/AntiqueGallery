<?php

namespace App\Http\Controllers;
use App\Models\Items;
use App\Models\Users;
use Illuminate\Auth\Events\Validated;
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
       $users = Users::where('username',$request->username)->first();
        if($users == null){
            //jika tidak terdapat username maka kembalikan ke login page
            return redirect()->back()->with('error','username/password salah!');
        }
        
        
        //validasi login mengecek password
        //password yang dicek menggunakan hash karena password yang ada di dalam database telah di encrypsi
       
        if ($users->admin == 1){
            
            $users->admintkn =Str::random(23);
            $users->save();

            $request->session()->put('admintkn',$users->admintkn);
            
            $db_password=$users->password;
            $hashed_password =Hash::check($request->password,$db_password);
            if ($hashed_password){
            
            //jika password terdapat didatabase maka buat token 
            $users->token =Str::random(23);
            $users->save();

            //menaruh token dari database ke session
            $request->session()->put('token',$users->token);
            

            //->dashboard
            return to_route('admin_dashboard');
        }else{
            //jika tidak terdapat password kembali ke login page
            return redirect()->back()->with('error','Username atau password tidak di temukan!');
        }
        
            }else{
                return redirect()->back()->with('error','Anda bukan admin!');
            }
        }

        
    public function admin_dashboard()
    {
        
        
        if(Session::get('admintkn') == null){
            return to_route('login_admin_form')->with('error','Login terlebih dahulu!!');
        }
         $mimin= Users::where('admintkn',Session::get('admintkn'))->first();
        if($mimin){
           
            $items = Items::get();
        
            return view('admin_dashboard',[
                "items"=>$items,
                "user"=>$mimin,
                "db_token"=>$mimin->admintkn
                
                
                
            ]);
        }
        else{
            
            //jika tidak terdapat token balik ke login page
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function admin_logout(Request $request)
    {
        Users::where('token',$request->token)->update([
            'token'=>null,
            'admintkn'=>null
        ]);
        
        Session::pull('token','admintkn');
        
        return to_route('login_admin_form')->with('msg','anda telah logout');
        
    }
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

    public function item_delete(Request $request)
    {   
        
        $delete_item = Items::find($request->id)->delete(); 
        if($delete_item)
        {
            return redirect()->back()->with('msg','item berhasil dihapus!!');
            
        }else
        {
            return redirect()->back()->with('msg','item tidak berhasil dihapus!!');
        }

        
    }
    public function edit_form(Request $request){
        if(Session::get('admintkn') == null){
            return to_route('login_admin_form')->with('error','Login terlebih dahulu!!');
        }
         $mimin= Users::where('admintkn',Session::get('admintkn'))->first();
        if($mimin){
           
            $items = Items::find($request->id);

            
            
            return view('edit',[
                "items"=>$items,
                "user"=>$mimin,
                "db_token"=>$mimin->admintkn
                
                
                
            ]);
        }
        else{
            
            //jika tidak terdapat token balik ke login page
            return redirect()->back()->with('error','Login terlebih dahulu!!');
        }
    }
    public function edit_action(Request $request){
        
        $edited=$request->validate([
            'itemname'=>['required'],
            'quantity'=>['required'],
            'price'=>['required'],
            'tag'=>['nullable'],
            'image'=>['nullable','file','image'],
            'description'=>['required']
        ]);
        
        if ($request->image == null){
            
            $edit= Items::where('id',$request->id)->update($edited);
            
            
        }
        else{

            $edited['image']=$request->file('image')->store('images');
            $edit= Items::where('id',$request->id)->update($edited);
        }
        
        
        
         
        
        if($edit){
            return to_route('admin_dashboard')->with('msg','items berhasil di edit.');
        }
        else{
            return to_route('admin_dashboard')->with('msg','items gagal di edit.');
        }
    }
    
}

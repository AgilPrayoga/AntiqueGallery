<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function dashboard_action(Request $request){
        
        $request->validate([
            'itemname'=>['required'],
            'quantity'=>['required'],
            'price'=>['required'],
            'tag'=>['nullable'],
            'image'=>['required','file','mimes:png,jpg,jpeg'],
            'description'=>['required']
        ]);
        $request->file('image')->store('images');
        $imageName = time().'.'.$request->image->extension();
        
        $created = Items::create([
            "itemname"=>$request->itemname,
            "quantity"=>$request->quantity,
            "price"=>$request->price,
            "tag"=>$request->tag,
            "image"=>$imageName,
            "description"=>$request->description,
        ]);
        
        $created->save();
        if($created){
            return to_route('admin_dashboard')->with('msg','items berhasil di buat.');
        }
        else{
            return to_route('login_form')->with('msg','items gagal di buat.!!');
        }
    }
   
}
<?php

namespace App\Http\Controllers;

use App\Artical;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewsWebController extends Controller
{
    public function index(){
        $category = Category::where('status','active')->get();
        $artical = Artical::where('status','active');
        
        return view('newsweb.index',['category'=>$category,'artical'=>$artical]);
   
}


    public function newsdetials($id)
    {
        $category=Category::where('status','active')->get();
        $Details = Artical::find($id);
  
        return view('newsweb.newsdetailes',['Details'=>$Details,'category'=>$category]);
    
}
public function allnews($id){
    $category=Category::where('status','active')->get();
    $categorys = Category::find($id);
    $artical=$categorys->artical()->paginate(7);

    return view('newsweb.all-news',['artical'=>$artical ,'categorys'=>$categorys,'category'=>$category]);

}
public function create()
{
    $category = Category::where('status','active')->get();
    return view('newsweb.contact',['category'=>$category]);
}
    }



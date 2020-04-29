<?php

namespace App\Http\Controllers;

use App\Artical;
use App\author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorData = author::paginate(5);
        return view('cms.author.index',['authorData'=>$authorData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name'=> 'required|string|min:3|max:40', 
            'email'=>'required|string|email',           
            'mobileNumber'=>'required|string|numeric' ,
            'password'=>'required|string|min:6',

            'age'=>'required|integer|min:16|max:100' ,
            'gender'=>'required|string|in:male,female' ,
            'status'=>'string' ,
            'image'=>'required'


]);
        
        $author = new author();
        $author->name=$request->get('name');
        $author->mobileNumber=$request->get('mobileNumber');
        $author->email=$request->get('email');
        $author->password=Hash::make($request->get('password'));
        $author->age=$request->get('age');
        $imageauthor = $request->file('image');
        $imageName = $request->file('image')->getClientOriginalName().''.$imageauthor->getExtension();
        $imageauthor->move('images/author',$imageName);
        $author->image= $imageName;
        $author->gender=$request->get('gender');
        $author->status=$request->get('status') =='on'? 'active' : 'deactive' ;
        $isSave = $author->save();
        if($isSave){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','author created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','author create failed!');
                  }
          
                  return redirect()->back();
              }
          
    public function ArticalShow($id){
        $ArticalShow = Artical::all();
        return view('cms.artical.index',['ArticalShow'=>$ArticalShow]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorEdit= author::find($id);
        return view ('cms.author.edit',['authorEdit'=>$authorEdit]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'name'=> 'required|string|min:3|max:40', 
            'email'=>'required|string|email',           
            'mobileNumber'=>'required|string|numeric' ,
            'password'=>'required|string|min:6',

            'age'=>'required|integer|min:16|max:100' ,
            'gender'=>'required|string|in:male,female' ,
            'status'=>'string' ,
            'image'=>'required'


]);
        $author= author::find($id);
        $author->name=$request->get('name');
        $author->mobileNumber=$request->get('mobileNumber');
        $author->email=$request->get('email');
        $author->password = Hash::make($request->get('password'));
        $author->age=$request->get('age');
        $imageauthor = $request->file('image');
        $imageauthor->getClientOriginalName();
        $imageauthor->move('images/author');
        $author->image= $imageauthor;
        $author->gender=$request->get('gender');
        $author->status=$request->get('status') =='on'? 'active' : 'deactive' ;
        $isSave = $author->save();
        if($isSave){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','author created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','author create failed!');
                  }
          
                  return redirect()->back();
              }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isdestroy = author::destroy($id);
        if($isdestroy){
            return response()->json([
                'icon' => 'success',
                'title' => 'delete is succesfuly'
            ],200);

        }else{
            return response()->json([
                'icon'=> 'error',
                'title'=>'delete falid'
            ],400);

        }
}

}
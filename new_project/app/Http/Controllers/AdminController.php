<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminData = Admin::paginate(5);
        return view('cms.admin.index',['adminData'=>$adminData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|min:3|max:10',
            'email'=>'required|email',
            'mobileNumber'=>'required|string|numeric',
            'password'=>'required|string|min:6',
           'age'=>'required|integer|min:16|max:100' ,
            'gender'=>'required|string|in:male,female' ,
            'status'=>'string' ,
            'image'=>'required'
        ]);
        $admin = new Admin();
        $admin->name=$request->get('name');
        $admin->email=$request->get('email');
        $admin->password=Hash::make($request->get('password'));
        $admin->mobileNumber=$request->get('mobileNumber');
        $admin->age=$request->get('age');
        $adminImage=$request->file('image');
        $imageName = $request->file('image')->getClientOriginalName().''.$adminImage->getExtension();
        $adminImage->move('images/admin',$imageName);
        $admin->image=$imageName;
        $admin->gender=$request->get('gender');
        $admin->status=$request->get('status')=='on'?'active':'deactive' ;
        $IsSave = $admin->save();
        if($IsSave){
        $request->session()->flash('status','alert-success');
        $request->session()->flash('message','Admin created successfully');
    } else {
        $request->session()->flash('status','alert-danger');
        $request->session()->flash('message','Admin create failed!');
    }

    return redirect()->back();
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
        $adminEdit = Admin::find($id);
        return view('cms.admin.edit',['adminEdit'=>$adminEdit]);
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
        $adminUpdate = Admin::find($id);
        $request->validate([
            'name'=> 'required|string|min:3|max:10',
            'email'=>'required|email',
            'mobileNumber'=>'required|string|numeric',
            'password'=>'required|string|min:6',
            'age'=>'required|integer|min:16|max:100' ,
            'gender'=>'required|string|in:male,female' ,
            'status'=>'string' ,
            'image'=>'required'
        ]);
        $admin = Admin::find($id);
        $admin->name=$request->get('name');
        $admin->email=$request->get('email');
        $admin->password=Hash::make($request->get('password'));
        $admin->mobileNumber=$request->get('mobileNumber');
        $admin->age=$request->get('age');
        $adminImage=$request->file('image');
        $imageName = $request->file('image')->getClientOriginalName().''.$adminImage->getExtension();
        $adminImage->move('images/admin',$imageName);
        $admin->image=$imageName;
        $admin->gender=$request->get('gender');
        $admin->status=$request->get('status')=='on'?'active':'deactive' ;
        $IsSave = $admin->save();
        if($IsSave){
            $request->session()->flash('status','alert-success');
            $request->session()->flash('message','Admin created successfully');
        } else {
            $request->session()->flash('status','alert-danger');
            $request->session()->flash('message','Admin create failed!');
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
        $destroy = Admin::destroy($id);
        if($destroy){
            return response()->json([
                'icon' => 'success',
                'title'=> 'delete success'
            ],200);

        }else{
            return response()->json([
                'icon' => 'error',
                'title'=>'delete faild'
            ],400);

        }

    }
}

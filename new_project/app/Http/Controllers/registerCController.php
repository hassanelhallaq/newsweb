<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registerCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsweb.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|string|min:3|max:40', 
            'email'=>'required|string|email',
            'password'=>'required|string|min:6',
            'password_confirm'=>'required|string|same:password',
            'mobileNumber'=>'required|string|numeric' ,
            'age'=>'required|integer|min:16|max:100' ,

    
        ]);
        $user = new User();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->age=$request->get('age');
        $user->mobileNumber=$request->get('mobileNumber');
        $isSaved= $user->save();
        if($isSaved){
        $request->session()->flash('status','alert-success');
        $request->session()->flash('message','you can login ');
    } else {
        $request->session()->flash('status','alert-danger');
        $request->session()->flash('message','Category create failed!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

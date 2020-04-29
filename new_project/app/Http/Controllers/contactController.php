<?php

namespace App\Http\Controllers;

use App\Category;
use App\contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactsData = contact::all();
        return view('cms.contact.index',['contactsData'=>$contactsData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
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
            'name'=>'required|string|min:3',
            'mobileNumber'=>"required|string|numeric",
            'email'=>'required|email',
            'massge'=>'required|string'
        ]);
        $contacts = new contact();
        $contacts->name=$request->get('name');
        $contacts->email=$request->get('email');
        $contacts->mobileNumber=$request->get('mobileNumber');
        $contacts->massge=$request->get('massge');
        $IsSave = $contacts->save();
        if($IsSave){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','massege created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','massege create failed!');
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
        $contactsShow = contact::find($id);
        return view('cms.contact.view',['contactsShow'=>$contactsShow]);
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

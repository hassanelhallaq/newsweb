<?php

namespace App\Http\Controllers;

use App\Category;
use App\Artical;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryData= Category::paginate(5);
        return view('cms.categories.index',['categoryData'=>$categoryData]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.categories.creat');
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
            'name_en'=> 'required|string|min:3|max:40',            
       
            'name_ar'=>'required|string|min:3|max:40',

            'status'=>'string' ,
            
        ]);
        $category = new Category();
        $category->name_en=$request->get('name_en');
        $category->name_ar=$request->get('name_ar');
        $category->status=$request->get('status')== 'on'? 'active':'deactive' ;
        $isSaved = $category->save();
        if($isSaved){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','Category created successfully');
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
        $categoryedit= Category::find($id);
        return view('cms.categories.edit',['categoryedit'=>$categoryedit]);
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
        $this->validate($request, [
            'name_en'=> 'required|string|min:3|max:40', 
            'name_ar'=>'required|string|min:3|max:40',
            'status'=>'string'
        ]);
        $category = Category::find($id);
        $category->name_en=$request->get('name_en');
        $category->name_ar=$request->get('name_ar');
        $category->status=$request->get('status')== 'on'? 'active':'deactive' ;
        $isSaved = $category->save();
        if($isSaved){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','Category created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','Category create failed!');
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
        $isdestroy = Category::destroy($id);
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
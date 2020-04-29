<?php

namespace App\Http\Controllers;

use App\Artical;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articalData = Artical::where('author_id', Auth::user('author')->id)->get(); 
       
        if(Auth::guard('author')->check()){
        return view('cms.author.auth.index',['articalData'=>$articalData]);

    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    if(Auth::guard('author')->check()){
        return view('cms.author.auth.create')->with('categoryData',Category::all());

    }
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
            'title'=>'required|string|min:5',
            'body'=>'required|string|min:200',
            'image'=>'required',
            'shortDesc'=>'required|string|min:40|max:200'

        ]);

        $artical = new artical();
        $artical->title=$request->get('title');
        $artical->body=$request->get('body');
        $artical->shortDesc=$request->get('shortDesc');
        $artical->author_id= Auth::user()->id;
        $artical->category_id=$request->get('category_id');
        $articalimage=$request->file('image');
        $imageName = $request->file('image')->getClientOriginalName().''.$articalimage->getExtension();
        $articalimage->move('images/artical',$imageName);
        $artical->image=$imageName;
        $artical->status=$request->get('status')=='on'?'active':'deactive';
        $IsSave  = $artical->save();
        if($IsSave){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','artical created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','artical create failed!');
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
        $categoryData=Category::all();
        $articalEdit= Artical::find($id);
        if(Auth::guard('author')->check()){
        if(Auth::user()->id){
     
        return view('cms.author.auth.edit',['articalEdit'=>$articalEdit,'categoryData'=>$categoryData]);

    }
}
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
        $request->validate([
            'title'=>'required|string|min:5',
            'body'=>'required|string|min:200',
            'image'=>'required',
            'shortDesc'=>'required|string|min:40|max:200'


        ]);
        $artical = Artical::find($id);
        $artical->title=$request->get('title');
        $artical->body=$request->get('body');
        $artical->shortDesc=$request->get('shortDesc');
        $artical->author_id=Auth::user()->id;
        $artical->category_id=Auth::user()->id;
        $articalimage=$request->file('image');
        $imageName = $request->file('image')->getClientOriginalName().''.$articalimage->getExtension();
        $articalimage->move('images/artical',$imageName);
        $artical->image=$imageName;
        $artical->status=$request->get('status')=='on'?'active':'deactive';
        $IsSave  = $artical->save();
        if($IsSave){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','artical created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','artical create failed!');
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
        $IsDestroy = Artical::destroy($id);
        if($IsDestroy){
            
        return response()->json([
            'icon'=>'success',
            'title'=>'Artical Deleted'
        ],200);
        }else{
            return response()->json([
                'icon'=>'error',
                'title'=>'delete unsucssfuly'
            ],400);
        }
    }
}

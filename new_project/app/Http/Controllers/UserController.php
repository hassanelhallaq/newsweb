<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData = User::paginate(5);
        return view('cms.users.index',['userData'=>$userData]);
        

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.users.create');
    }

        public function __construct()
        {
            $this->middleware('verified');
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
            'mobileNumber'=>'required|string|numeric' ,
            'password'=>'required|string|min:6',
            'age'=>'required|integer|min:16|max:100' ,
            'gender'=>'required|string|in:male,female' ,
            'status'=>'string' ,
        ]);
        $user = new User();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->mobileNumber=$request->get('mobileNumber');
        $user->age=$request->get('age');
        $user->gender=$request->get('gender');
        $user->status=$request->get('status')=="on"? 'active': 'deactive';
        $IsSave = $user->save();
        dd(123);
        if($IsSave){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','user created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','user create failed!');
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
        $userEdit = User::find($id);
        return view('cms.users.edit',['userEdit'=>$userEdit]);
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
            'name'=> 'required|string|min:3|max:40', 
            'email'=>'required|string|email',           
            'mobileNumber'=>'required|string|numeric' ,
            'password'=>'required|string|min:6',
            'age'=>'required|integer|min:16|max:100' ,
            'gender'=>'required|string|in:male,female' ,
            'status'=>'string' ,
        ]);
        $user = User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->mobileNumber=$request->get('mobileNumber');
        $user->age=$request->get('age');
        $user->gender=$request->get('gender');
        $user->status=$request->get('status')=="on"? 'active': 'deactive';
        $isSaved= $user->save();
        if($isSaved){     
            $request->session()->flash('status','alert-success');
                      $request->session()->flash('message','user created successfully');
                  } else {
                      $request->session()->flash('status','alert-danger');
                      $request->session()->flash('message','user create failed!');
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
        $isDestroy = User::destroy($id);
        if ($isDestroy) {
            return response()->json([
                'icon'=>'success',
                'title'=>'delete successfuly'
    
            ],200);
        } else {
            return response()->json([
                'icon'=>'error',
                'title'=>'delete unsuccessfuly'
    
            ],400);
        }
        
     
    }
}

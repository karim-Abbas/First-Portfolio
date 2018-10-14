<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Product;    
use Image;
use Validator;
class AdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function dashboard()
    {   
        
        $users = User::all();
        $products = Product::all();
        return view('home',compact('users','products'));
    }

    public function delete_product($id)
    {
        Product::find($id)->delete();
        return redirect('/dashboard');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:255',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
            'photo',
          

        ]);

        $users = new User();
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password ='$2y$10$YJEdi.ZZFGKQqEabwlQmwOZHtAEbITCWJs4w6p9MXR1MDx6tpA7UG';
        $users->phone = $request['phone'];
        $users->user_type_id = 2;
        $users->save(); 
        return redirect('/dashboard');
    }
      
       public function delete_user($id)
    {
        User::find($id)->delete();
        return redirect('/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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

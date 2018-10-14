<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Auth;
use Validator;
use App\User;
use App\Order;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
 public function __construct()
    {
        $this->middleware('seller');
    }
    


   


    public function edit($id)
    {
        $products = Product::find($id);
        if(Auth::user()->id == $products->user_id){
        return view('products.update',compact('products'));
    }
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->image = $request['image'];
        $product->quantity = $request['quantity'];

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/images/',$name);
            $product->image = $name;
        }
        $product->save();
        return redirect('/my_products');
    }
       
        
        public function my_products()
        {
            $user_id = Auth::user()->id;
            $products = Product::where('user_id',$user_id)->get();

            return view('/products.my_products',compact('products'));    
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
         
         public function add_product(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:products|max:255',
                'price' => 'required',
                'description',
                'image',
                'quantity',

            ]);

            if ($validator->fails()) {
                return redirect('/products')
                            ->withErrors($validator)
                            ->withInput();
            }

            $product = new Product();
            $product->name = $request['name'];
            $product->price = $request['price'];
            $product->description = $request['description'];
            $product->image = $request['image'];
            $product->quantity = $request['quantity'];
            $product->user_id = Auth::user()->id;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/images/',$name);
                $product->image = $name;
            }

                $product->save();
                    return redirect('/my_products');
          
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

        
        public function delete_product($id)
        {
            Product::find($id)->delete();
            return redirect('/my_products');
        }
         public function showdetails($id)
        {
            $products = Product::find($id);
            if(Auth::user()->id == $products->user_id ){
            $orders = Order::where('product_id','=',$id)->get();
            return view('/showdetails',compact('products','orders'));
        }
        return redirect('/');
        }

}

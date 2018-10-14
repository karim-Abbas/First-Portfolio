@extends('layouts.app')

@section('content')
<table width="100%"  style="text-align:center; border:1px solid green; margin-top:159px;">
                        <tr>
                            <td>Product ID</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Product Image</td>
                            <td>Product Description</td>
                            <td>Buyer Name</td>
                            <td>Buyer ID</td>
                            <td>Buyer Phone</td>
                            <td>Buyer Type</td>
                        </tr>
                        @foreach($orders as $order)
                         <tr>
                            <td>{{$order->product->id}}</td>
                            <td>{{$order->product->name}}</td>
                            <td>{{$order->product->price}}</td>
                            <td><img src="images/{{$order->product->image}}"></td>
                            <td>{{$order->product->description}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->user->id}}</td>
                            <td>{{$order->user->phone}}</td>
                            <td>{{$order->user->user_type_id}}</td>
                            
                        </tr>
                        @endforeach
                    </table>
@endsection('content')
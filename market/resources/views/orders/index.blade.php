@extends('layouts.app')

@section('content')
<div class="wrapper row3" style="margin-top:120px;">
  <main class="hoc container clear"> 
    <table width="100%"  style="text-align:center; border:1px solid green;">
                        <tr>
                            <td>Order ID</td>
                            <td>Product ID</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Delete</td>


                        </tr>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id}}</td>                        
                            <td>{{ $order->product->id }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->product->price}}</td>
                            <td><a href="/delete_order/{{ $order->id }}">Delete</a> </td>

                          
                        </tr>
                        @endforeach
                    </table>
    <div class="clear"></div>
  </main>
</div>
@endsection


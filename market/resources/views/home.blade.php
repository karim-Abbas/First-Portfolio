@extends('layouts.app')

@section('content')
<div class="container" style="height:513px; margin-top:120px;">
     <div style="float:left; width:650px;">
    <div style="text-align:center; color:whitegray; ">
        Products Table
    </div>
    <table style="text-align:center; border:1px solid green; width:600px; ">
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Image</td>
            <td>Quantity</td>
            <td>Delete</td>
            <td>Show Details</td>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product['name'] }} </td>
            <td>{{ $product['price'] }} </td>
            <td>
                <img src="images/{{ $product['image']}}"style="width:100px; height:50px;">
            </td>
            <td>{{ $product['quantity'] }}</td>
            <td><a href="/delete_product1/{{ $product['id'] }}">Delete</a> </td>
            <td><a href="/showdetails/{{ $product['id'] }}">Show Details</a> </td>

        </tr>
        @endforeach
    </table>
      </div>  
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default"> 
                   <div class="panel-heading" style="text-align: center;">Users Table</div>
                    <table width="100%"  style="text-align:center; border:1px solid green;">
                        <tr >
                            <td>Name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Delete</td>

                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user['name'] }} </td>
                            <td>{{ $user['email'] }} </td>
                            <td>{{ $user['phone'] }}</td>
                          
                            <td><a href="/delete_user/{{ $user['id'] }}">Delete</a> </td>
                        </tr>
                        @endforeach
                    </table>

                    @if(Auth::user()->user_type_id == 1)
            <form method="POST" action="/add_user" style="margin-left:65%;">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label  class="col-md-4 control-label">Email</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div><br>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label  class="col-md-4 control-label">phone</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
             <input type="submit" class="btn btn-primary">
        </form>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

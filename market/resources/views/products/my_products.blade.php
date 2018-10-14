@extends('layouts.app')
@section('content')
<h1 style="text-align:center; color:whitegray; margin-top:140px;">My Own Products Table</h1>

<table width="100%"  style="text-align:center; border:1px solid green; margin-top:30px;">
                        <tr>
                            <td>Product ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Description</td>
                            <td>Image</td>
                            <td>Quantity</td>
                            <td>Delete</td>
                            <td>Update</td>
                            <td>Show Details</td>
                           

                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product['id']}}</td>
                            <td>{{ $product['name'] }} </td>
                            <td>{{ $product['price'] }} </td>
                            <td>{{ $product['description']}}</td>
                            <td><img src="images/{{ $product['image']}}"style="width:100px; height:50px;"></td>
                            <td>{{ $product['quantity']}}</td>

                            <td><a href="/delete_product2/{{ $product['id'] }}">Delete</a> </td>
                            <td><a href="/update_product/{{ $product['id'] }}">Update</a> </td>
                            <td><a href="/showdetails/{{ $product['id'] }}">Show Details</a> </td>



                        </tr>
                        @endforeach
                    </table>
              
                    @if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2)
                    <div style="">
                    <form method="POST" action="/add_product" style="margin-left:10%;">
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
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">description</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control" name="description" value="{{ old('description') }}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <br>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">image</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image" value="{{ old('image') }}">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}"><br>

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <input type="submit" class="btn btn-primary">
                    </form>
                    @endif
@endsection

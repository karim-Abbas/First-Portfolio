@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table width="100%" border="1" style="text-align:center;">
                        <tr>
                            <td>name</td>
                            <td>price</td>
                            @if(Auth::check())
                            @if(Auth::user()->user_type_id == 1)
                            <td>Delete</td>
                            <td>Update</td>
                            @endif
                            @endif
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product['name'] }} </td>
                            <td>{{ $product['price'] }} </td>
                            @if(Auth::check())
                              @if(Auth::user()->user_type_id == 1)
                            <td><a href="/delete_product/{{ $product['id'] }}">Delete</a></td>
                            <td><a href="/update_product/{{ $product['id'] }}">Update</a></td>
                            @endif
                            @endif 
                        </tr>
                        @endforeach
                    </table>

                    @if(Auth::user()->user_type_id == 1)
                    <form method="POST" action="/add_product">
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

                         <input type="submit" class="btn btn-primary">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

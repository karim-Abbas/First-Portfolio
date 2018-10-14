@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="margin-top:150px; margin-left:40%;">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" action="/update_product/{{ $products['id'] }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $products['name'] }}">

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
                                <input type="text" class="form-control" name="price" value="{{ $products['price'] }}">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div><br>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" value="{{ $products['description'] }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div><br>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Upload Image</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image" value="{{ $products['image'] }}">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="quantity" value="{{ $products['quantity'] }}">

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <br>

                         <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
 @section('content')
                <div style="background-color:cornflowerblue;margin-top:150px;text-align:center; border-radius:50px; padding:20px;width:510px;height:180px; margin-left:31%; color:white; ">
                 <img src="/uploads/avatars/{{ $user->avatar }}" style="float:left;width:150px; height:150px; border-radius:50%;">
                <div style="  width:200px; color:white; float:left; margin-top:45px; margin-left:90px;">
                <span>Username: {{ $user->name }}</span><br>
                <span>Email: {{ $user->email }} </span><br>
                <span>Phone number: {{ $user->phone }}</span>
                </div>
                
            </div>
            <form enctype="multipart/form-data" action="/profile" method="POST" style=" color:white;margin-left:42%; border-radius:15px;margin-top:20px; background-color:cornflowerblue; width:220px;padding:20px;" > <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text"  name="name"  value="{{ $user->name }}"  id="contact_name" class="contact_input" style="color:black;"required><br>
                            

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text"  name="email"  value="{{ $user->email }}"   class="contact_input" style="color:black;"required><br>
                            

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <input type="text"  name="phone"  value="{{ $user->phone }}"  class="contact_input" style="color:black;"required><br>
                            

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password"  name="price" placeholder="password" style="color:black;"required>
                            

                           
                        
                        </div><br>
                        <input type="submit" class="pull-center btn btn-sm btn-primary" style="margin-left:45px; background-color:darkred; border:none; border-radius:5px;"><br>
                </form> 
           @endsection('content')
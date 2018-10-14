@extends('layouts.app')

@section('content')

<div class="wrapper row3" style="">

  <main class="hoc container clear" style=""> 
    <ul class="nospace clear services " style="width:960px; margin-top:100px;">
        
        @foreach($products as $product)
            <li class="one_quarter" style="margin-right:64px; ">
                <br>   
                <figure style=" padding-top:20px; padding-bottom:10px;border:1px solid black;  background-color:white;; border-top-right-radius:20px; border-top-left-radius:20px; border-bottom-right-radius:20px; border-bottom-left-radius:20px; ">
            
                    <img src="images/{{$product['image']}}"  style="width:250px; height:210px; border-top-right-radius:20px; border-top-left-radius:20px;"alt="">
                    
                    <div style=" margin-top:15px;">
                        <span  style="">{{ $product['description'] }}</span><br><br>
                        <div style="float:left; margin-top:5px;  width:140px;">
                        <span style=" font-size:16px; color:#007bff; ">
                            <strong>
                                {{ $product['name'] }}
                            </strong>
                        </span>
                        <span style=" font-size:16px; color:#ff4c4c; ">
                            <strong>
                                ${{ $product['price'] }}
                            </strong>
                        </span>
                        </div>
                        
                         @if ( $product['user_id'] == Auth::user()->id )
                            
                            <div style="float:left;background-color:#343a40;width:140px; border-radius:5px; padding:10px;padding-top:5px; border:none; color:white;">
                                <span >
                                    Your product
                                </span> 
                             </div>
                        @else
                            @if ($product['quantity']>0)
                                <a style="color:white;" href="/buy/{{ $product['id'] }}">
                                    <button class="buy" style=" ">
                                        <i class="fas fa-shopping-cart" style="font-size:25px;float:left;"></i>
                                        Add To Cart
                                    </button>
                                </a>
                            @else
                                <div class=" btn btn-primary"style="float:right; height:45px;margin-right:10px; margin-bottom:5px;background-color:#dc3545;width:140px; border-radius:5px; padding:10px;padding-top:11px; border:none; color:white;">
                                    <span>
                                        Out Of Stock
                                    </span>
                                </div>
                            @endif
                        @endif  
                    </div>
                   
                </figure>
                
            
        </li>
        @endforeach
    </ul>
    <div class="clear"></div>
  </main>
</div>
@endsection

@extends('tiketing.app') @section('title', 'invoice') @section('content')

<div>
    <div class="col-lg-4 col-10">            
        <h2>Invoice</h2>
        <p>{{$payment->concert_name}}</p>
        <p>{{$payment->total_price}}</p>
        <p>{{$payment->status}}</p>
        <!-- <p>{{$payment->concert_name}}</p> -->
               
    </div>
</div>

@endsection
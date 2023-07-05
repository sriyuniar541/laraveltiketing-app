@extends('tiketing.app') @section('title', 'cart') @section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Consert Name</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payment as $pay)
        <tr>
            <th scope="row">{{ $pay->id}}</th>
            <td>{{ $pay->concert_name}}</td>
            <td>{{ $pay->qty}}</td>
            <td>{{ $pay->total_price}}</td>
            <td>
                <image class='img-fluid col-2' src={{ asset('storage/'. $pay->image) }}
                    alt="image"/>
            </td>
            <td>
                <a href="/tiketing/{{$pay->id}}" onclick="event.preventDefault();
                        document.getElementById(&quot;delete-form-{{$pay->id}}&quot;).submit();
                        ">Hapus</a>
                <form action="/tiketing/cart/payment/{{$pay->id}}" method="POST" id="delete-form-{{$pay->id}}"
                    style="display: none">
                    @method('DELETE') @csrf
                </form>
                <a href="/tiketing/payment/cek_checkout/{{$pay->id}}"> Checkout</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>
                <h2 class="text-center">Total Harga : Rp 0</h2>
            </td>
        </tr>
    </tbody>
</table>

@endsection
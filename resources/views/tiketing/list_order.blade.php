@extends('tiketing.app') @section('title', 'list_order') @section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Consert Name</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
            <th scope="col">Photo</th>
            <th scope="col">Status</th>
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
                @if($pay->status == 'Paid')
                    <p class="btn btn-primary p-2">Lunas</p>
                @else
                <p class="btn btn-danger p-2">Belum Lunas</p>
                @endif
            
            </td>
            <td>
            <a
                        href="/tiketing/{{$pay->id}}"
                        onclick="event.preventDefault();
                        document.getElementById(&quot;delete-form-{{$pay->id}}&quot;).submit();
                        "
                        >Hapus</a
                    >
                    <form
                        action="/tiketing/cart/payment/{{$pay->id}}"
                        method="POST"
                        id="delete-form-{{$pay->id}}"
                        style="display: none"
                    >
                        @method('DELETE') @csrf
                    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
@extends('tiketing.app') @section('title','Index') @section('content')

<style>
    
    .card {
        border: none;
        padding: 20px;
        background-color: white;
        border-radius: 15px;
        box-shadow: 1px 1px 1px rgba(204, 199, 199, .5);
    }

    .card img {
        width: 100%;
        overflow: hidden;
    }

    .price {
        line-height: 2px;
        margin-bottom: 2px;
    }
    .detail_tiket {
        line-height: 10px;
        font-size: 12px;
    }
    .btn-info {
        padding: 0px;
        width: 50px;
        background-color: #ff9494;
        border: #ff9494;
    }
    h5 .btn-link {
        text-decoration: none;
        color: #ff9494;
    }

</style>


<div class="container">
    <!-- card -->
    <div class="row g-4 d-flex justify-content-center">
        @foreach ($tiketing as $tiket)
        <div class="col">
            <div class="card mb-5" style="width: 18rem">
                <img
                    src="https://images.unsplash.com/photo-1671798706476-626e08f0907c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80"
                    class="card-img-top"
                    alt="..."
                />
                <div class="card-body">
                    <p class="btn btn-info text-white">Music</p>
                    <h5 class="card-title"><b>{{$tiket->concert_name}}</b></h5>
                    <div class="price mt-3">
                        <h6>starting from</h6>
                        <h6><b>Rp500.000</b></h6>
                    </div>

                    <div class="detail_tiket mt-3">
                        <p>{{$tiket->date}}</p>
                        <p>12:00 - 23.00</p>
                        <p>{{$tiket->address}}</p>
                    </div>
                    <!-- <a href="/tiketing/getById/{{$tiket->id}}">Edit</a> -->
                    <h5><a href="/tiketing/getById/{{$tiket->id}}" class="btn-link">Go Detail ></a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

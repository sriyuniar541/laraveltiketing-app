@extends('tiketing.app') @section('title', 'page_by_id') @section('content')

<div>
    <div class="container">
        @if(session()->has('success'))
        <div >
            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                <strong>{{ session("success") }}</strong>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <image class='img-preview col-12' src={{ asset('storage/'. $tiketing->image) }}
                    alt='preview' />
            </div>
            <div class="col-lg-6">
                <h2>{{$tiketing->concert_name}}</h2>
                <div class="date">
                    <h6>Date</h6>
                    <p>{{$tiketing->date}}</p>
                </div>
                <div class="price">
                    <h6>Price</h6>
                    <p>Rp{{$tiketing->price}}</p>
                </div>
                <div class="description ">
                    <h4>Description</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid natus placeat molestiae sed quod inventore dolor autem, magni id voluptatibus quasi. Ea consequatur numquam saepe vitae dolorum! Officiis laudantium repudiandae omnis quaerat commodi repellat in tempore voluptatum nisi dolorem eveniet perferendis qui, a, quis amet atque dolores quas earum excepturi beatae rem minima possimus? Minima maiores est itaque? Laboriosam quos iusto repudiandae nisi. Magni dolor possimus doloremque debitis temporibus in sed, veniam molestiae officia dolore? Vero officia animi eos aliquam veniam quis quisquam esse quod, atque laudantium reiciendis inventore ullam ad provident alias repellendus assumenda suscipit nemo quidem. Error, ducimus.</p>
                </div>
            </div>
        </div>
    </div>



    <!-- add to cart -->
    <form
        action="/tiketing/add_to_cart"
        method="POST"
    >
        @csrf
                <input name="concert_name" type="hidden" value="{{$tiketing->concert_name}}" readonly/>
                <input name="address" type="hidden" value="{{$tiketing->address}}" readonly/>
                <input name="gate" type="hidden" value="{{$tiketing->gate}}"  />
               <input name="seat" type="hidden"value="{{$tiketing->seat}}" />
               <input name="date" type="hidden" value="{{$tiketing->date}}" readonly/>
               <input name="price" type="hidden" value="{{$tiketing->price}}" readonly/>
               <input name="qty" type="hidden" value="{{$tiketing->qty}}" />
              <input name="total_price" type="hidden" value="{{$tiketing->price}}" /> 
              <input name="tiketing_id" type="hidden" value="{{$tiketing->id}}" readonly/> 
            <input type="hidden" name="image" value="{{$tiketing->image}}" readonly/> 
            <button type="submit" class="btn btn-primary">Add to cart</button>
        </div>
    </form>
</div>


@endsection

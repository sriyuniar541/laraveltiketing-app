<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="config('midtrans.Client_Key')"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Checkout</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div>
    <form
        
        action="/tiketing/cek_checkout/{{$payment->id}}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="col-lg-4 col-10">
            <div class="mb-3">
                <label for="concert_name" class="form-label"
                    >concert_name</label
                >
                <input name="concert_name" type="concert_name"
                class="form-control @error('concert_name') is-invalid @enderror"
                id="concert_name"                 for="concert_name" value="{{$payment->concert_name}}" required />
                <!-- error handling -->
                @error('concert_name')
                <div id="concert_name" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input name="address" type="address" class="form-control
                @error('address') is-invalid @enderror" id="address"
                for="address" value="{{$payment->address}}" required />
                <!-- error handling -->
                @error('address')
                <div id="address" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gate" class="form-label">gate</label>
                <input name="gate" type="gate" class="form-control
                @error('gate') is-invalid @enderror" id="gate"
                for="gate" value="{{$payment->gate}}"  required />
                <!-- error handling -->
                @error('gate')
                <div id="gate" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="seat" class="form-label">seat</label>
                <input name="seat" type="seat" class="form-control
                @error('seat') is-invalid @enderror" id="seat"
                for="seat" value="{{$payment->seat}}" required />
                <!-- error handling -->
                @error('seat')
                <div id="seat" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">date</label>
                <input name="date" type="date" class="form-control
                @error('date') is-invalid @enderror" id="date"
                for="date" value="{{$payment->date}}" required />
                <!-- error handling -->
                @error('date')
                <div id="date" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> 

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input
                    name="price"
                    type="number"
                    class="form-control @error('price') is-invalid @enderror"
                    id="price"
                    value="{{$payment->price}}"
                    required
                />
                <!-- error handling -->
                @error('price')
                <div id="price" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input
                    name="qty"
                    type="number"
                    class="form-control @error('qty') is-invalid @enderror"
                    id="qty"
                    value="{{$payment->qty}}"
                    required
                />
                <!-- error handling -->
                @error('qty')
                <div id="qty" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- image -->
            <div class="mb-3">
            <input type="hidden" name="oldImage" value="{{$payment->image}}" />
            @if($payment->image) 
            <image class='img-preview col-6 col-lg-4' src={{ asset('storage/'. $payment->image) }}
            alt='preview' /> @else
            <image id="img-preview col-6 col-lg-4" alt="preview" />
            @endif
            <input name="image" type="file" class="form-control
                @error('image') is-invalid @enderror" id="image"
                for="image" value="{{
                    old("image")
                }}"  onchange="previewImage()"/>
                 <!-- error handling -->
                 @error('image')
                 <div id="image" class="invalid-feedback">
                     {{ $message }}
                 </div>
                 @enderror
                 </div>
                 <input name="total_price" type="hidden" value="{{$payment->price * $payment->qty}}" />
               <input name="tiketing_id" type="hidden" value="{{$payment->id}}" readonly/>
            <input type="hidden" name="image" value="{{$payment->image}}" readonly/>
            <button type="submit" class="btn btn-primary">checkout</button>

            <!-- <button id="pay-button">Pay!</button> -->
        </div>
    <!-- </form> -->
</div>

<script>
    // previw image
    function previewImage() {
        const image = document.querySelector("#image");
        const imagePreview = document.querySelector("#img-preview");

        imagePreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imagePreview.src = oFREvent.target.result;
        };
    }
</script>


</body>
</html>

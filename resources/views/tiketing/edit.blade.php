@extends('tiketing.app') @section('title', 'update') @section('content')

<div>
    <form action="/tiketing/{{$tiketing->id}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="col-lg-4 col-10">
            <div class="mb-3">
                <label for="concert_name" class="form-label">concert_name</label>
                <input name="concert_name" type="concert_name"
                    class="form-control @error('concert_name') is-invalid @enderror" id="concert_name"
                    for="concert_name" value="{{$tiketing->concert_name}}" required />
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
                @error('address') is-invalid @enderror" id="address" for="address" value="{{$tiketing->address}}"
                    required />
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
                @error('gate') is-invalid @enderror" id="gate" for="gate" value="{{$tiketing->gate}}" required />
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
                @error('seat') is-invalid @enderror" id="seat" for="seat" value="{{$tiketing->seat}}" required />
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
                @error('date') is-invalid @enderror" id="date" for="date" value="{{$tiketing->date}}" required />
                <!-- error handling -->
                @error('date')
                <div id="date" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <!-- image -->
            <div class="mb-3">
                <input type="hidden" name="oldImage" value="{{$tiketing->image}}" />
                @if($tiketing->image)
                <image class='img-preview col-6 col-lg-4' src={{ asset('storage/'. $tiketing->image) }}
                    alt='preview' /> @else
                    <image id="img-preview col-6 col-lg-4" alt="preview" />
                    @endif
                    <input name="image" type="file" class="form-control
                @error('image') is-invalid @enderror" id="image" for="image" value="{{
                    old(" image") }}" required onchange="previewImage()" />
                    <!-- error handling -->
                    @error('image')
                    <div id="image" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">edit</button>
        </div>
    </form>
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

@endsection
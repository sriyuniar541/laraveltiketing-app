@extends('tiketing.app') @section('title','Index') @section('content')

<div class="container d-flex justify-content-center">
    <div class="bg-white p-5">
        @if(session()->has('success'))
        <div>
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
        @endif @if(session()->has('loginError'))
        <div>
            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
            >
                <strong>{{ session("loginError") }}</strong> You should check in
                on some of those fields below.
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
        </div>
        @endif
        <h2 class="text-center mb-5">Profile</h2>
        <form
            action="/user/profile/{{auth()->user()->id}}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf @method('PUT')
            <div class="row">
                <div class="col-lg-6"> 
                    <image class="img-fluid" src="{{auth()->
                    user()->photo}}" alt='profile'/> 
                    <input name="photo"
                    type="file" class="form-control @error('photo') is-invalid
                    @enderror" id="photo" value="{{ old("photo") }}" required
                    onchange="previewImage()"/>

                    <!-- error handling -->
                    @error('photo')
                    <div id="photo" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            name="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Name"
                            required
                            value="{{auth()->user()->name}}"
                        />
                        <!-- error handling -->
                        @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label"
                            >Username</label
                        >
                        <input
                            name="username"
                            type="text"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            placeholder="Username"
                            required
                            value="{{auth()->user()->username}}"
                        />
                        <!-- error handling -->
                        @error('username')
                        <div id="username" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            name="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            placeholder="name@example.com"
                            required
                            value="{{auth()->user()->email}}"
                        />
                        <!-- error handling -->
                        @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"
                            >New Password</label
                        >
                        <input
                            name="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            placeholder="Password"
                        />
                        <!-- error handling -->
                        @error('password')
                        <div id="password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label"
                            >Confirmasi New Password</label
                        >
                        <input
                            name="confirm_password"
                            type="password"
                            class="form-control @error('confirm_password') is-invalid @enderror"
                            id="confirm_password"
                            placeholder="Confirmasi Password"
                        />
                        <!-- error handling -->
                        @error('confirm_password')
                        <div id="confirm_password" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input name="is_admin" type="hidden" value="{{ true }}" />
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">
                            Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // previw image
    function previewImage() {
        const image = document.querySelector("#photo");
        const imagePreview = document.querySelector("#photo-preview");

        imagePreview.style.display = "block";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imagePreview.src = oFREvent.target.result;
        };
    }
</script>

@endsection

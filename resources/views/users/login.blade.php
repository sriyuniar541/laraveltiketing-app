@extends('users.index') @section('title', 'login') @section('content')

<div class="container d-flex justify-content-center my-5">
    <div class="col-lg-4 col-10 bg-white p-5">
        <!-- error handling -->
        @if(session()->has('success'))
        <div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session("success") }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif @if(session()->has('loginError'))
        <div>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session("loginError") }}</strong> You should check in
                on some of those fields below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <form action="/user/login" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="name@example.com" for="email" value="{{old(" email")}}" required />
                <!-- error handling -->
                @error('email')
                <div id="email" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="Password" for="password" required />
                <!-- error handling -->
                @error('password')
                <div id="password" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn_color col-lg-4">Login</button>
            </div>
            <p>Belum punya akun? <a href="/user/register">Register</a></p>
        </form>
    </div>
</div>

@endsection
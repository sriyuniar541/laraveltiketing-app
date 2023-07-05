@extends('users.index') @section('title', 'register') @section('content')

<div class="container d-flex justify-content-center">
    <div class="col-lg-6 col-12 bg-white p-5">
        @if(session()->has('success'))
        <div>
            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                <strong>{{ session("loginError") }}</strong>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
            <p>{{ session("success") }}</p>
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

        <form action="/user/register" method="POST">
            @csrf
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-danger btn-sm">
                    <a href="/user/register/admin">Admin</a>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                    <a href="/user/register/">User</a>
                </button>
            </div>
            <h2 class="text-center">Register Admin</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input 
                    name="name" 
                    type="text" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="name"
                    placeholder="Name" 
                    required 
                    value="{{ old("name") }}"
                    for="name"
                />
                <!-- error handling -->
                @error('name')
                <div id="name" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input 
                    name="username" 
                    type="text" 
                    class="form-control @error('username') is-invalid @enderror" 
                    id="username"
                    placeholder="Username" 
                    required 
                    value="{{ old("username") }}"
                    for="username"
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
                    class="form-control @error('email') is-invalid @enderror " 
                    id="email"
                    placeholder="name@example.com" 
                    required 
                    value="{{old("email")}}" 
                    for="email"
                /> 
                <!-- error handling -->
                @error('email')
                <div id="email" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    name="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    placeholder="Password"
                    required
                    for="password"
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
                    >Confirmasi Password</label
                >
                <input
                    name="confirm_password"
                    type="password"
                    class="form-control @error('confirm_password') is-invalid @enderror"
                    id="confirm_password"
                    placeholder="Confirmasi Password"
                    required
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
                <button type="submit" class="btn_color col-lg-3">Register</button>
            </div>
            <p>Sudah punya akun? <a href="/user/login">Login</a></p>
        </form>
    </div>
</div>

@endsection

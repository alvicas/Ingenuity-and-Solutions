@extends('base')

@section('content')
<div class="text-center">
    <main class="form-signin">
        <form method="POST"
            action="{{ route('auth.register') }}"
            enctype="multipart/form-data"
        >
            @csrf
            <img class="mb-4" src="{{ asset('assets/images/logo-library.png') }}" alt="" width="150" height="100%">
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            
            @error('globalError')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Full Name">
                <label for="floatingInput">Full Name</label>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
    
            <div class="form-floating">
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Password"
                >
                <label for="floatingPassword">Confirm password</label>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="1" > Remember me
                </label>
                @error('remember')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="actions">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
                <a
                    class="w-100 btn btn-lg btn-outline-primary secundarybutton"
                    href="{{ url('login') }}" role="button"
                >
                    Sign in
                </a>
            </div>
        </form>
    </main>
</div>
@endsection

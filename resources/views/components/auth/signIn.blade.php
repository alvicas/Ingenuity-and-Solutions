@extends('base')

@section('content')
<div class="text-center">
    <main class="form-signin">
        <form
            method="POST"
            action="{{ route('auth.login') }}"
            enctype="multipart/form-data"
        >
            @csrf
            <img class="mb-4" src="{{ asset('assets/images/logo-library.png') }}" alt="" width="150" height="100%">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    
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
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
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
                <button type="submit"class="w-100 btn btn-lg btn-primary" >Sign in</button>
                <a
                    class="w-100 btn btn-lg btn-outline-primary secundarybutton"
                    href="{{ url('register') }}" role="button"
                >
                    Sign up
                </a>
            </div>
        </form>
    </main>
</div>
@endsection

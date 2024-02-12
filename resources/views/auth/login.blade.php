@extends('app')
@push('title')
    <title>Login Page</title>
@endpush

@section('main-content')
    <section class="account-form">

        <form action="{{ route('login.custom') }}" method="post" enctype="multipart/form-data">
         @csrf

            

            @if (session('success'))
                <div class="alert alert-danger">
                    {{ session('success') }}
                </div>
            @else
                <h3>welcome back!</h3>
            @endif


            <p class="placeholder">your email <span>*</span></p>
            <input type="email" name="email"  placeholder="enter your email" class="box">

            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif

            <p class="placeholder">your password <span>*</span></p>
            <input type="password" name="password"  placeholder="enter your password" class="box">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif

            <p class="link">don't have an account? <a href="register">register now</a></p>
            <input type="submit" value="login now" name="submit" class="btn">
        </form>

    </section>
@endsection

@extends('app')
@push('title')
    <title>Register Page</title>
@endpush

@section('main-content')
    <section class="account-form">

        <form action="{{ route('register.custom') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>make your account!</h3>
            <p class="placeholder">your name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" class="box">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

            <p class="placeholder">your email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" class="box">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif

            <p class="placeholder">your password <span>*</span></p>
            <input type="password" name="password" placeholder="enter your password" class="box">
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif

            <p class="placeholder">profile pic</p>
            <input type="file" name="profile_image" class="box" accept="image/*">
            @if ($errors->has('profile_image'))
                <span class="text-danger">{{ $errors->first('profile_image') }}</span>
            @endif

            <p class="link">already have an account? <a href="login">login now</a></p>
            <input type="submit" value="register now" name="submit" class="btn">

        </form>

    </section>
@endsection

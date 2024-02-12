<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('title')

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<header class="header">

    <section class="flex">

        <a href="dashboard" class="logo">Logo.</a>

        <nav class="navbar">
            @if (Auth::check())
                <a href="dashboard" class="far fa-eye"></a>
                <div id="user-btn" class="far fa-user"></div>
            @else
                <a href="login" class="fas fa-arrow-right-to-bracket"></a>
                <a href="register" class="far fa-registered"></a>
            @endif
        </nav>
        

        <div class="profile">

            @if (Auth::check())
                <img src="{{ asset('profile_images/' . Auth::user()->profile_image) }}" alt="Profile Image"
                    class="image">

                <p>Welcome, {{ Auth::user()->name }}</p>
                <a href="signout" class="delete-btn" onclick="return confirm('logout from this website?');">logout</a>
            @else
                <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a>
            @endif
        </div>



    </section>

</header>

<body>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="icon" href="{{asset("front/img/$footerDetails->favicon")}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('front/css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('front/css/flaticon.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

</head>

<body>
    
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="{{asset('front/img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/show_about') }}">About</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/show_blog') }}">Blog</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href=" {{ url("/courses") }} " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Courses
                                    </a>
                                    
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href=" {{ url("/courses") }} ">All Courses</a>
                                       <hr class="dropdown-divider">
                                        @foreach ($showCategories as $category )
                                        <a class="dropdown-item" href="{{ url("category/$category->id") }}">{{ $category->name }}</a>
                                        @endforeach
                                        
                                       
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/contacts') }}">Contact</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="{{ url('/dashboard/login') }}">Employee Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
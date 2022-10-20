@extends('front.layout')
@section('content')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Course Details</h2>
                        <p>Home<span>/</span>Course Details<span>/</span>{{ $course->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--================ Start Course Details Area =================-->
<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="img/single_cource.png" alt="">
                </div>
                <div class="content_wrapper">
                    <h4 class="title_top">Objectives</h4>
                    <div class="content">
                        {{ $course->full_desc }}
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Trainer’s Name</p>
                                <span class="color">{{ $course->trainer->name }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Course Fee </p>
                                <span>EGP {{ $course->price }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Available Seats </p>
                                <span>15</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Schedule </p>
                                <span>2.00 pm to 4.00 pm</span>
                            </a>
                        </li>

                    </ul>
                    <a href="#" class="btn_1 d-block">Enroll the course</a>
                </div>

                <h4 class="title">Reviews</h4>
                <div class="content">
                    <div class="review-top row pt-40">
                        <div class="col-lg-12">
                            <h6 class="mb-15">Provide Your Rating</h6>
                            <div class="d-flex flex-row reviews justify-content-between">
                                <span>Quality</span>
                                <div class="rating">
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/star.svg')}}" alt=""></a>
                                    </div>
                                <span>Outstanding</span>
                            </div>
                            <div class="d-flex flex-row reviews justify-content-between">
                                <span>Puncuality</span>
                                <div class="rating">
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/star.svg')}}" alt=""></a>
                                    </div>
                                <span>Outstanding</span>
                            </div>
                            <div class="d-flex flex-row reviews justify-content-between">
                                <span>Quality</span>
                                <div class="rating">
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                    <a href="#"><img src="{{ asset('front/img/icon/star.svg')}}" alt=""></a>
                                    </div>
                                <span>Outstanding</span>
                            </div>

                        </div>
                    </div>
                    <div class="feedeback">
                        <h6>Your Feedback</h6>
                        <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                        <div class="mt-10 text-right">
                            <a href="#" class="btn_1">Read more</a>
                        </div>
                    </div>
                    <div class="comments-area mb-30">
                        <div class="comment-list">
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/cource/cource_1.png" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Emilly Blunt</a>
                                        </h5>
                                        <div class="rating">
                                             <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/star.svg')}}" alt=""></a>
                                        </div>
                                        <p class="comment">
                                            Blessed made of meat doesn't lights doesn't was dominion and sea earth
                                            form
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/cource/cource_2.png" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Elsie Cunningham</a>
                                        </h5>
                                        <div class="rating">
                                             <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/star.svg')}}" alt=""></a>
                                        </div>
                                        <p class="comment">
                                            Blessed made of meat doesn't lights doesn't was dominion and sea earth
                                            form
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/cource/cource_3.png" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a>
                                        </h5>
                                        <div class="rating">
                                             <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/color_star.svg')}}" alt=""></a>
                                        <a href="#"><img src="{{ asset('front/img/icon/star.svg')}}" alt=""></a>
                                        </div>
                                        <p class="comment">
                                            Blessed made of meat doesn't lights doesn't was dominion and sea earth
                                            form
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Course Details Area =================-->
@endsection
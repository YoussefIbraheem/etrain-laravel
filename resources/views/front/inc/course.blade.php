 @extends('front/layout')


@section('content')
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Our Courses</h2>
                        @if (isset($categories))
                        <p>Home<span>/</span>Courses<span>/</span>{{ $categories->name }}</p> 
                        @else
                        <p>Home<span>/</span>Courses<span>/</span></p> 
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--::review_part start::-->
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>popular courses</p>
                    <h2>Special Courses</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($courses as $course )
                
            
            <div class="col-sm-6 col-lg-4">
                <div class="single_special_cource m-2 g-2">
                    <img src="{{asset("storage/img/special_cource/$course->image")}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="{{ url("category",$course->category->id) }}" class="btn_4">{{ $course->category->name}}</a>
                        <h4>{{ $course->price}} EGP</h4>
                        <a href="{{ url("/course_details/$course->id") }}">
                            <h3>{{ $course->name}}</h3>
                        </a>
                        <p>{{ $course->brief_desc}}</p>
                        <div class="author_info">
                            <div class="author_img">
                                <img style="width: 50px; border-radius:50%; height:50px;" src="{{ asset("storage/img/author"."/".$course->trainer->profile_pic) }}" alt="">
                                <div class="author_info_text">
                                    <p>Conduct by:</p>
                                    <h5><a href="#">{{ $course->trainer->name}}</a></h5>
                                </div>
                            </div>
                            <div class="author_rating">
                                <div class="rating">
                                    <a href="#"><img src="{{asset("front/img/icon/color_star.svg")}}" alt=""></a>
                                    <a href="#"><img src="{{asset("front/img/icon/color_star.svg")}}" alt=""></a>
                                    <a href="#"><img src="{{asset("front/img/icon/color_star.svg")}}" alt=""></a>
                                    <a href="#"><img src="{{asset("front/img/icon/color_star.svg")}}" alt=""></a>
                                    <a href="#"><img src="{{asset("front/img/icon/star.svg")}}" alt=""></a>
                                </div>
                                <p>3.8 Ratings</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--::blog_part end::-->

<!--::review_part start::-->
@include('front.inc.testimonials')
<!--::blog_part end::-->

@endsection 

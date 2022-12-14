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
                                <span>{{ $course->number_of_students }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Schedule </p>
                                <span>2.00 pm to 4.00 pm</span>
                            </a>
                        </li>

                    </ul>
                    
                    <button @if($course->number_of_students <= 0) disabled @endif type="button" class="btn_1 d-block w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Enroll Now
                      </button>
                      @if($course->number_of_students <= 0)<p class='text-danger'>We Apologise as all seats are Taken Please subscribe to our newsletter to get poasted</p> @endif
                      @include('front.errors')
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
{{-- Enroll Modal --}}
<!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal my-5 fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Applicant Information:</h1>
          <button type="button" class="btn-close btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
    <form method="POST" action="{{ url('/enroll') }}">  
       <div class="modal-body">
              <div  class="form-group m-3">
                  <input type="text" name="name" class="form-control" placeholder="Student Full Name">
              </div>
              <div  class="form-group m-3">
                  <input type="email" name="email" class="form-control" placeholder="Student Email">
              </div>
              <div  class="form-group m-3">
                  <input type="text" name="phone" class="form-control" placeholder="Student Phone">
              </div>
              <div  class="form-group m-3">
                  <input type="text" name="spec" class="form-control" placeholder="Studnet Specialty">
              </div>
              <div  class="form-group m-3">
                  <input type="hidden" name="course_id" value="{{ $course->id }}" class="form-control" placeholder="Studnet Specialty">
              </div>
                  @csrf
      </div>
      <div class="modal-footer">
            <button class="btn_1 d-block" type="submit">Enroll Now</button>
      </div>
    </form>
      </div>
    </div>
  </div>
</section> 
<!--================ End Course Details Area =================-->
@endsection
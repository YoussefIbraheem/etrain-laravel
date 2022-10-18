<section class="testimonial_part section_padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>tesimonials</p>
                    <h2>Happy Students</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    @foreach ($testimonials as $testmonial )
                    <div class="testimonial_slider">
                        <div class="row">
                            @foreach ( $testmonial as $singleTest )
                            <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                <div class="testimonial_slider_text">
                                    <p>{{ $singleTest->desc }}</p>
                                        <h4>{{ $singleTest->name }}</h4>
                                        <h5>{{ $singleTest->spec }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset("front/img/testimonial/$singleTest->image") }}" alt="#">
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                            
                            @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
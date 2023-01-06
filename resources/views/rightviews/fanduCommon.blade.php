@section('title')
<title>{{$user->name}}</title>
@endsection


<div class="col-lg-12 col-md-6 col-sm-12 order-lg-12 order-md-12 order-sm-1 order-1 mt-5" style="float: right">

    <div class="rightside8598">

        <div class="bannerright458">
            <div class="bnrttopbanner56">
                <div class="bannertopinfo55">
                    <div class="logo"><a href="#">FANDU.ME</a></div>

                    <h2>
                        The Best
                        <span>Website Creator</span>
                        <small>
                            for Successful <br>
                            Personal Branding.
                        </small>

                    </h2>
                </div>

                <div class="topbanner25"><img src="{{asset('images/topbanner012.jpg')}}"></div>

                <div class="topbtminfo45">

                    <div class="youcan">About Fandu</div>
                    <p>
                        Fandu.me solves the problem of existing personal websites by designing a
                        perfectly
                        balanced website for your personal information and the content you create...
                    </p>



                    <div class="readmorebox">
                        <a href="#" class="readmr568">
                            {{-- <a href="{{route('readAboutUs')}}" class="readmr568"> --}}
                                <img src="{{asset('images/arrowmore02.png')}}"> READ MORE
                            </a>
                    </div>
                </div>
            </div>


            <div class="aboutme56">
                <h2>Why Fandu.me ?</h2>
                <ul class="fndulist456">
                    <li>
                        <img src="{{asset('images/flistimg/fl01.png')}}">
                        <p>
                            Hassle-free & Seamless Interface

                        </p>
                    </li>
                    <li>
                        <img src="{{asset('images/flistimg/fl02.png')}}">
                        <p>
                            A single Repository of all your Content
                        </p>
                    </li>
                    <li>
                        <img src="{{asset('images/flistimg/fl03.png')}}">
                        <p>
                            Effortless Interaction With Your Audience

                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/flistimg/fl04.png')}}">
                        <p>
                            Keep Your Website Fresh & Interesting
                        </p>
                    </li>
                    <li>
                        <img src="{{asset('images/flistimg/fl05.png')}}">
                        <p>
                            Affordable & Single Subscription Plan
                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/flistimg/fl06.png')}}">
                        <p>
                            Grow Your Personal Brand on Social Media
                        </p>
                    </li>
                    <li>
                        <img src="{{asset('images/flistimg/fl03.png')}}">
                        <p>
                            Search Engine Friendly Personal Website
                        </p>
                    </li>

                </ul>

            </div>


            <div class="togethersec15">
                {{-- <a href="{{route('whyMe')}}"> --}}
                    <a href="#">
                        <span>
                            Let's think
                            together.
                        </span>
                        <figure><img src="{{asset('images/flistimg/arrow15.png')}}"></figure>
                    </a>
            </div>


            <div class="servsec012">
                <div class="servtop55">
                    <h3>
                        Why You need Personal Website
                    </h3>
                    <figure><img src="{{asset('images/servimg55.jpg')}}"></figure>
                </div>

                <p>
                    Your personal website is the most important part of your personal branding. Here are
                    the
                    top 8 reasons why you should have your own personal website.
                </p>


                <ul class="servlist58">
                    <li>
                        <img src="{{asset('images/icon/icon01.png')}}">
                        <p>
                            Create a unique identity & digital presence.

                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon02.png')}}">
                        <p>
                            Take control of your personal branding.

                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon03.png')}}">
                        <p>
                            Showcase your talents & achievements.

                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon04.png')}}">
                        <p>
                            Connect better & faster with your audience.

                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon05.png')}}">
                        <p>
                            Provide all the information in one place.

                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon06.png')}}">
                        <p>
                            Take advantage of SEO, SEM, and online ads.
                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon07.png')}}">
                        <p>
                            Share insights and updates easily & quickly.
                        </p>
                    </li>

                    <li>
                        <img src="{{asset('images/icon/icon08.png')}}">
                        <p>
                            Stand out from the crowd.
                        </p>
                    </li>


                </ul>

            </div>


            <div class="featuresec56">
                @if(!empty($content))
                <h2>
                    {{$content->title}}
                </h2>
                <p>
                    {{$content->subtitle}}
                </p>
                <div>
                    {!! $content->description !!}
                </div>
                @endif
                <div class="readmorebox">
                    {{-- <a href="{{route('viewFeatures',['slug'=>'feature'])}}" class="readmr568"> --}}
                        <a href="#" class="readmr568">
                            <img src="{{asset('images/arrowmore02.png')}}"> READ MORE
                        </a>
                </div>


            </div>

            @if(!empty($testimonials))
            <div class="testimonial58">
                <h2><span>100%</span> Customer Satisfaction, Guaranteed.
                </h2>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        @foreach ($testimonials as $key=>$val )
                        <div class="carousel-item @if($key==0) active @endif">
                            <div class="testimonblock99">
                                <figure><img src="{{asset('auther_images')}}/{{$val->auther_image}}">
                                </figure>
                                <div class="testmoinfo55">
                                    <h3>{{$val->auther_name}}</h3>
                                    <span>{{$val->auther_designation}}</span>
                                    <p>
                                        {!! substr($val->quotes, 0,80) !!} .....
                                    </p>

                                </div>
                            </div>

                            <div class="readmorebox">
                                {{-- <a href="{{route('testimonialDetail',['slug'=>$val->auther_name,'id'=>$val->id])}}"
                                    --}} <a href="#" class="readmr568">
                                    <img src="{{asset('images/arrowmoreblue02.png')}}"> READ MORE
                                </a>
                            </div>
                        </div>
                        @endforeach



                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
            @endif




        </div>



        @include('layouts.footer')
    </div>


</div>


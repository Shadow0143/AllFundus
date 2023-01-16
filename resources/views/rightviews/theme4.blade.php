@section('title')
<title>{{$user->name}}</title>

@endsection


@section('css')
<link href="{{ asset('theme4/css/johndoe.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('theme4/vendors/themify-icons/css/themify-icons.css')}}">

    <style>
    .text_style{
            background-color: transparent !important;
            border:none !important;
        }
        .text_style:hover{
            color:red;
            border: 1px solid black !important;
        }

    </style>



@endsection


<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

<div class="helloSec">
    <div class="iContainer">
     
            <header class="header header-bg" >
                <div class="container">
                    <div class="header-content">
                        <h4 class="header-subtitle" >
                            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                            @if(empty($usersDetails->small_title)) 
                                <input type="text" name="small_title" id="small_title" class="text_style small_title" value="Hello! I am">
                            @else 
                                <input type="text" name="small_title" id="small_title" class="text_style small_title" value="{{$usersDetails->small_title}}" >
                            @endif
                            @else
                                @if(empty($usersDetails->small_title)) 
                                    Hello! I am
                                @else 
                                    {{$usersDetails->small_title}} 
                                @endif
                            @endif
                        </h4>
                        <h1 class="header-title">{{$user->name}}</h1>
                    </div>
                </div>
            </header>


            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
                <div class="container">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                       
                        <ul class="navbar-nav brand">
                            

                            @if(empty($usersDetails->user_profile))
                            <img src="{{$user->avatar}}" alt="" class="brand-img">
                        
                            <input type="hidden" name="theme4bannerBG" id="theme4bannerBG" value="@if(empty($usersDetails->user_profile))  {{$user->avatar}} @else {{asset('user_profiles')}}/{{$usersDetails->user_profile}}   @endif">

                            @else
                                <img src="{{asset('user_profiles')}}/{{$usersDetails->user_profile}}" alt="{{$usersDetails->user_profile}}">
                            @endif


                            <li class="brand-txt">
                                <h5 class="brand-title">{{$user->name}}</h5>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                                <a href="javaScript:void(0);" class="mt-5" onclick="changepicmodal()"> Change pic</a>
                                @endif
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div id="about" class="row about-section">
                    <div class="col-lg-12 about-card">
                        <h3 class="font-weight-light">Who am I ?</h3>
                        <span class="line mb-5"></span>
                        <p class="mt-20">                   
                            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                            @if(empty($usersDetails->small_description)) 
                                <textarea name="small_description" id="small_description" cols="30" rows="10" class="small_description text_style"> A Coder, An Entrepreneur and my goal is to create 10 successful business products by 2031. </textarea>
                            @else 
                                <textarea name="small_description" id="small_description" cols="30" rows="10" class="small_description text_style"> {{$usersDetails->small_description}}  </textarea>
                            @endif
                            @else
                                @if(empty($usersDetails->small_description)) 
                                        A Coder, An Entrepreneur and my goal is to create 10 successful business products by 2031.
                                @else 
                                {{$usersDetails->small_description}} 
                                @endif
                            @endif
                        </p>
                        <a class="btn btn-outline-danger" href="{{asset('resumes')}}/{{$usersDetails->resume}}" target="_blank"><i class="icon-down-circled2 "></i>Download My CV</a>

                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                            <a href="javaScript:void(0);" onclick="changeCVModal()" >Change CV</a>
                        @endif
                    </div>
                    <div class="col-lg-12 about-card">
                        <h3 class="font-weight-light">Personal Info</h3>
                        <span class="line mb-5"></span>
                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                            <a href="javaScript:void(0);" onclick="updateInfo()" class="mb-3">Update Info</a>
                        @endif
                        <ul class="mt40 info list-unstyled ">
                            @foreach (json_decode($usersDetails->personal_info) as $key=>$val)
                                <li><span>{{$key}}</span> : {{$val}}</li>
                            @endforeach
                        </ul>

                        <div class="socialFooter mt-3">
                            <div class="social45">
                                <a href="@if(!empty($usersDetails->insta_link)) {{$usersDetails->insta_link}} @endif" class="fa fa-instagram" target="_blank"></a>
                                <a href="@if(!empty($usersDetails->fb_link)) {{$usersDetails->fb_link}} @endif" class="fa fa-facebook" target="_blank"></a>
                                <a href="@if(!empty($usersDetails->whatsapp_number)) https://wa.me/{{$usersDetails->whatsapp_number}} @endif" class="fa fa-whatsapp" target="_blank"></a>
                                <a href="@if(!empty($usersDetails->youtube_link)) {{$usersDetails->youtube_link}} @endif" class="fa fa-youtube-play" target="_blank"></a>
                            </div>
                            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                                <a href="javaScript:void(0);" class="changeRelatedLinks" onclick="changeLinksmodal()"> Change related links</a>
                            @endif
                    </div>


                    </div>
                   
                </div>
            </div>
        
            <!--Resume Section-->
            <section class="section" id="resume">
                <div class="container">
                    <h2 class="mb-5"><span class="text-danger">My</span> Resume</h2>
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                               <div class="card-header">
                                    <div class="mt-2">
                                        <h4>Expertise</h4>
                                        <span class="line"></span>  
                                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                                            <a href="javaScript:void(0)" onclick="addresumeDetails('experties')" >Add experties details</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">

                                    @foreach ($resume  as $key=>$val)    
                                        @if($val->type=='experties')

                                        <h6 class="title text-danger">{{$val->title}}</h6>
                                        <P>{{$val->sub_title}}</P>
                                        <P class="subtitle">{!! $val->description !!}</P>
                                        <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                               <div class="card-header">
                                    <div class="mt-2">
                                        <h4>Education</h4>
                                        <span class="line"></span>  
                                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                                            <a href="javaScript:void(0)" onclick="addresumeDetails('education')" >Add experties details</a>
                                        @endif

                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach ($resume  as $key=>$val)    
                                        @if($val->type=='education')
                                        <h6 class="title text-danger">{{$val->title}}</h6>
                                        <P>{{$val->sub_title}}</P>
                                        <P class="subtitle">{!! $val->description !!}</P>
                                        <hr>
                                        @endif
                                    @endforeach

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                               <div class="card-header">
                                    <div class="pull-left">
                                        <h4 class="mt-2">Skills</h4>
                                        <span class="line"></span> 
                                        
                                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                                        <a href="javaScript:void(0)" onclick="addskillDetails('skill')" >Add skill </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="card-body pb-2">

                                    @foreach ($skills  as $key=>$val)    
                                        @if($val->type=='skill')
                                        <h6>{{ucfirst($val->title)}}</h6>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$val->width}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="card">
                               <div class="card-header">
                                    <div class="pull-left">
                                        <h4 class="mt-2">Languages</h4>
                                        <span class="line"></span> 
                                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                                            <a href="javaScript:void(0)" onclick="addskillDetails('language')" >Add skill </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="card-body pb-2">
                                    @foreach ($skills  as $key=>$val)    
                                        @if($val->type=='language')
                                        <h6>{{ucfirst($val->title)}}</h6>
                                        <div class="progress mb-3">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{$val->width}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
     
            <section class="section" id="service">
                <div class="container">
                    @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                    <a href="javaScript:void(0)" onclick="addresumeDetails('services')" >Add skill </a>
                    @endif
                    <h2 class="mb-5 pb-4"><span class="text-danger">My</span> Services</h2>

                    <div class="row">
                        @foreach ($resume  as $key=>$val)    
                            @if($val->type=='services')
                                <div class="col-md-6 col-sm-12">
                                    <div class="card mb-5">
                                    <div class="card-header has-icon">
                                            <i class="ti-vector text-danger" aria-hidden="true"></i>
                                        </div>
                                        <div class="card-body px-4 py-3">
                                            <h5 class="mb-3 card-title text-dark">{{$val->title}}</h5>
                                            <P class="subtitle">{!! $val->description !!}</P>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        
    </div>
</div>

@section('js')
    

<script src="{{asset('theme4/vendors/bootstrap/bootstrap.bundle.js')}}"></script>

<!-- bootstrap 3 affix -->
<script src="{{asset('theme4/vendors/bootstrap/bootstrap.affix.js')}}"></script>

<!-- Isotope  -->
<script src="{{asset('theme4/vendors/isotope/isotope.pkgd.js')}}"></script>

<!-- Google mpas -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

<!-- JohnDoe js -->
<script src="{{asset('theme4/js/johndoe.js')}}"></script>


@endsection

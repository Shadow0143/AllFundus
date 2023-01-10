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
     
            <header class="header" >
                <div class="container">
                    <div class="header-content">
                        <h4 class="header-subtitle" >Hello, I am</h4>
                        <h1 class="header-title">{{$user->name}}</h1>
                        <h6 class="header-mono" >Frond end Designer | Developer</h6>
                    </div>
                </div>
            </header>
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="510">
                <div class="container">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                           
                            <li class="nav-item">
                                <a href="#about" class="nav-link">About</a>
                            </li>
                           
                        </ul>
                        <ul class="navbar-nav brand">
                            <img src="{{$user->avatar}}" alt="" class="brand-img">
                            <li class="brand-txt">
                                <h5 class="brand-title">{{$user->name}}</h5>
                                <div class="brand-subtitle">Web Designer | Developer</div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                          
                            <li class="nav-item">
                                <a href="#blog" class="nav-link">Blog</a>
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
                        <h5 class="mb-3">A Web Designer / Developer Located In Our Lovely Earth</h5>
                        <p class="mt-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit.sit amet, Qui deserunt consequatur fugit repellendusillo voluptas?</p>
                        <button class="btn btn-outline-danger"><i class="icon-down-circled2 "></i>Download My CV</button>
                    </div>
                    <div class="col-lg-12 about-card">
                        <h3 class="font-weight-light">Personal Info</h3>
                        <span class="line mb-5"></span>
                        <ul class="mt40 info list-unstyled">
                            <li><span>Birthdate</span> : 09/13/1996</li>
                            <li><span>Email</span> : info@website.com</li>
                            <li><span>Phone</span> : + (123) 456-7890</li>
                            <li><span>Skype</span> : John_Doe </li>
                            <li><span>Address</span> :  12345 Fake ST NoWhere AB Country.</li>
                        </ul>
                        <ul class="social-icons pt-3">
                            <li class="social-item"><a class="social-link" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                            <li class="social-item"><a class="social-link" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
                        </ul>  
                    </div>
                    <div class="col-lg-12 about-card">
                        <h3 class="font-weight-light">My Expertise</h3>
                        <span class="line mb-5"></span>
                        <div class="row">
                            <div class="col-1 text-danger pt-1"><i class="ti-widget icon-lg"></i></div>
                            <div class="col-10 ml-auto mr-3">
                                <h6>UX Design</h6>
                                <p class="subtitle"> exercitat Repellendus,  corrupt.</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 text-danger pt-1"><i class="ti-paint-bucket icon-lg"></i></div>
                            <div class="col-10 ml-auto mr-3">
                                <h6>Web Development</h6>
                                <p class="subtitle">Lorem ipsum dolor sit consectetur.</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1 text-danger pt-1"><i class="ti-stats-up icon-lg"></i></div>
                            <div class="col-10 ml-auto mr-3">
                                <h6>Digital Marketing</h6>
                                <p class="subtitle">voluptate commodi illo voluptatib.</p>
                                <hr>
                            </div>
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
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 class="title text-danger">2017 - Present</h6>
                                    <P>UX Developer</P>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                                    <hr>
                                    <h6 class="title text-danger">2016 - 2017</h6>
                                    <P>Front-end Developer</P>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                                    <hr>
                                    <h6 class="title text-danger">2015 - 2016</h6>
                                    <P>UX Designer</P>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                               <div class="card-header">
                                    <div class="mt-2">
                                        <h4>Education</h4>
                                        <span class="line"></span>  
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 class="title text-danger">2017 - Present</h6>
                                    <P>B.E Computer Engineering</P>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error corrupti recusandae obcaecati odit repellat ducimus cum, minus tempora aperiam at.</P>
                                    <hr>
                                    <h6 class="title text-danger">2016 - 2017</h6>
                                    <P>Diploma in Computer Engineering</P>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, id officiis quas placeat quia voluptas dolorum rem animi nostrum quae.aliquid repudiandae saepe!.</P>
                                    <hr>
                                    <h6 class="title text-danger">2015 - 2016</h6>
                                    <P>High School Degree</P>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                               <div class="card-header">
                                    <div class="pull-left">
                                        <h4 class="mt-2">Skills</h4>
                                        <span class="line"></span>  
                                    </div>
                                </div>
                                <div class="card-body pb-2">
                                   <h6>hTL5 &amp; CSS3</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 97%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>JavaScript</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>PHP</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>SQL</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>Laborum</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>Tempora</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                               <div class="card-header">
                                    <div class="pull-left">
                                        <h4 class="mt-2">Languages</h4>
                                        <span class="line"></span>  
                                    </div>
                                </div>
                                <div class="card-body pb-2">
                                   <h6>English</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>French</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h6>Spanish</h6>
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 67%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
     
            <section class="section" id="service">
                <div class="container">
                    <h2 class="mb-5 pb-4"><span class="text-danger">My</span> Services</h2>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card mb-5">
                               <div class="card-header has-icon">
                                    <i class="ti-vector text-danger" aria-hidden="true"></i>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <h5 class="mb-3 card-title text-dark">Ullam</h5>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card mb-5">
                               <div class="card-header has-icon">
                                    <i class="ti-write text-danger" aria-hidden="true"></i>
                                </div>
                                <div class="card-body px-4 py-3">
                                    <h5 class="mb-3 card-title text-dark">Asperiores</h5>
                                    <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam commodi provident, dolores reiciendis enim pariatur error optio, tempora ex, nihil nesciunt! In praesentium sunt commodi, unde ipsam ex veritatis laboriosam dolor asperiores suscipit blanditiis, dignissimos quos nesciunt nulla aperiam officia.</P>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </section>
        
    </div>
</div>

@section('js')
    
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
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
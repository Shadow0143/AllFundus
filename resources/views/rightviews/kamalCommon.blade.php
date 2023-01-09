@section('title')
<title>{{$user->name}}</title>

@endsection


@section('css')
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


{{-- @foreach ($data as $data) --}}

    <div class="helloSec">
        <div class="iContainer">
            <div class="hsLeft">
                <p>
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

                <h2>{{$user->name}}</h2>
                <ul class="qulify01">
                    <li>
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
                    </li>
                </ul>
                </p>
                <div class="socialFooter">
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
            <div class="hsRight">
                <div class="col-lg-6 col-md-6 col-sm-12 order-lg-12 order-md-12 order-sm-1 order-1">
                    <div class="profileimg898">
                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                        <a href="javaScript:void(0);" class="mt-5" onclick="changepicmodal()"> Change pic</a>
                        @endif
                        <figure>
                            @if(empty($usersDetails->user_profile))
                                <img src="{{asset('user_profiles/noimage.jpg')}}" alt="userImage">
                            @else
                                <img src="{{asset('user_profiles')}}/{{$usersDetails->user_profile}}" alt="{{$usersDetails->user_profile}}">
                            @endif
                        </figure>
                    </div>
                </div>
            </div>
        </div>

    </div>

<div class="bioSec">
    <div class="iContainer">
        <h3>Biography </h3>
        <p>
            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
            @if(empty($usersDetails->biography_description)) 
                <textarea name="biography_description" id="biography_description" cols="50" rows="50" class="biography_description text_style"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </textarea>
            @else 
                <textarea name="biography_description" id="biography_description" cols="50" rows="50" class="biography_description text_style"> {{$usersDetails->biography_description}}  </textarea>
            @endif
        @else
            @if(empty($usersDetails->biography_description)) 
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            @else 
                {{$usersDetails->biography_description}} 
                <br>
                <a href="{{route('biographyDetails',['segment'=>Request::segment(1)])}}" class="rmore">Know More</a>
            @endif
        @endif
    </div>
</div>


<div class="myProSec">
    <div class="iContainer">
        <div class="blockHead">
            <div class="bhLeft">
                <div class="titleTag">
                    @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                        @if(empty($usersDetails->book_title)) 
                            <input type="text" name="book_title" id="book_title" class="text_style book_title" value="My Book">
                        @else 
                            <input type="text" name="book_title" id="book_title" class="text_style book_title" value="{{$usersDetails->book_title}}" >
                        @endif
                        @else
                            @if(empty($usersDetails->book_title)) 
                            MY Book
                            @else 
                                {{$usersDetails->book_title}} 
                            @endif
                    @endif
                   
                </div>
                <h4>
                    @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                    @if(empty($usersDetails->book_name)) 
                        <input type="text" name="book_name" id="book_name" class="text_style book_name" value=" Book Name">
                    @else 
                        <input type="text" name="book_name" id="book_name" class="text_style book_name" value="{{$usersDetails->book_name}}" >
                    @endif
                    @else
                        @if(empty($usersDetails->book_name)) 
                        Book Name
                        @else 
                            {{$usersDetails->book_name}} 
                        @endif
                    @endif
                </h4>
                <p class="titleDesco">
                    @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                    @if(empty($usersDetails->book_small_desc)) 
                        <input type="text" name="book_small_desc" id="book_small_desc" class="text_style book_small_desc" value=" Small Description">
                    @else 
                        <input type="text" name="book_small_desc" id="book_small_desc" class="text_style book_small_desc" value="{{$usersDetails->book_small_desc}}" >
                    @endif
                    @else
                        @if(empty($usersDetails->book_small_desc)) 
                        Small Description
                        @else 
                            {{$usersDetails->book_small_desc}} 
                        @endif
                    @endif
                </p>
            </div>
            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                <a href="javaScript:void(0);" class="mt-5" onclick="changebook()"> Change pic</a>
            @endif
            <figure>
                @if(empty($usersDetails->book_image))
                    <img src="{{asset('user_books/No_Image_Available.jpg')}}" alt="userImage">
                @else
                    <img src="{{asset('user_books')}}/{{$usersDetails->book_image}}" alt="{{$usersDetails->book_image}}">
                @endif
            </figure>
        </div>
        <h5>
           Summary
        </h5>
        <p>
            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
            @if(empty($usersDetails->book_summary)) 
                <textarea name="book_summary" id="book_summary" cols="50" rows="50" class="book_summary text_style"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </textarea>
            @else 
                <textarea name="book_summary" id="book_summary" cols="50" rows="50" class="book_summary text_style"> {{$usersDetails->book_summary}}  </textarea>
            @endif
        @else
            @if(empty($usersDetails->book_summary)) 
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
            @else 
                {{$usersDetails->book_summary}} 
            @endif
        @endif
        </p>
      
        {{-- <a href="#" class="rmore">Buy Now</a> --}}
       
    </div>
</div>


<div class="ctaSec">
    <div class="iContainer">
        <h4>Skip to the good part...</h4>
        <ul class="ctaList">
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social01.png')}}" alt="cta1.jpg"></div>
                    <div class="ctaMatr"><i class="ti-twitter"></i>
                        <h5> My Tweets</h5>
                    </div>
                </a>
            </li>
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social02.png')}}" alt="cta2.jpg"></div>
                    <div class="ctaMatr"><i class="ti-write"></i>
                        <h5> Recent Posts</h5>
                    </div>
                </a>
            </li>
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social04.png')}}" alt="cta3.jpg"></div>
                    <div class="ctaMatr"><i class="ti-face-smile"></i>
                        <h5> Social Events</h5>
                    </div>
                </a>
            </li>
            <li><a href="">
                    <div class="ctaImage"><img src="{{asset('new/images/socialbox/social03.png')}}" alt="cta4.jpg"></div>
                    <div class="ctaMatr"><i class="ti-marker-alt"></i>
                        <h5>My Book</h5>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
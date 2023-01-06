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


<div class="col-lg-12 mt-5 col-md-12 col-sm-12 order-lg-12 order-md-12 order-sm-1 order-1">
    <div class="persrightsec88">
        <div class="toprightban458 padd01">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 order-lg-1 order-md-1  order-sm-12 order-12">
                    <div class="topritleftin45">
                        <span class="hello45">
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
                            
                            </span>
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
                        <div class="social45">
                            <a href="@if(!empty($usersDetails->insta_link)) {{$usersDetails->insta_link}} @endif" class="fa fa-instagram" target="_blank"></a>
                            <a href="@if(!empty($usersDetails->fb_link)) {{$usersDetails->fb_link}} @endif" class="fa fa-facebook" target="_blank"></a>
                            <a href="@if(!empty($usersDetails->whatsapp_number)) https://wa.me/{{$usersDetails->whatsapp_number}} @endif" class="fa fa-whatsapp" target="_blank"></a>
                            <a href="@if(!empty($usersDetails->youtube_link)) {{$usersDetails->youtube_link}} @endif" class="fa fa-youtube-play" target="_blank"></a>
                        </div>
                    </div>
                </div>

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


        <div class="goalsection45 padd01 icon_box">
            <h2>Steps towards to my goal</h2> 
            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                <a href="javaScript:void(0);" class="add_goal" onclick="usergoalmoal()"> + ADD</a>
            @endif
            <p>
                These are the Ideas, few lines about the products here will be nice to display.
            </p>

            <div class="goalimgs45 row" style="height:230px">
                <div class="items col-md-4">
                    @forelse ($usergoals as $key=>$val)
                    <div id="main_goal_div{{$val->id}}">
                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                            <a href="javaScript:void(0)" class="delete_goal" data-id="{{$val->id}}"> X </a>
                        @endif
                        <a href="{{$val->link}}" target="_blank"><img src="{{asset('userGoals')}}/{{$val->image}}"></a>
                    </div>
                        
                    @empty
                        <p class="text-danger text-center">No data added.</p>
                    @endforelse
                   
                </div>
               
            </div>

        </div>

        <div class="interest_section568 padd01">
            <h2>My Interests</h2>
            @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                <a href="javaScript:void(0);" class="" onclick="openIntrestForm()"> + ADD</a>
            @endif
            <p>What I Look forward to in my daily life</p>
            <ul class="interest_list55">
                @forelse ($intrests as $val)
                <li><a href="{{route('intrestDetails',['segment'=>Request::segment(1),'id'=>$val->id])}}">{{$val->title}}</a></li>
                @empty
                <li>
                    <p class="text-danger text-center">No Intrest added yet.</p>
                </li>
                @endforelse

            </ul>
        </div>


        <div class="socalpart45 padd01">
            <h2>Skip to the good part</h2>
            <ul>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social01.png')}}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social02.png')}}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social03.png')}}"></a>
                </li>
                <li>
                    <a href="#"><img src="{{asset('new/images/socialbox/social04.png')}}"></a>
                </li>
            </ul>
        </div>

    </div>
</div>


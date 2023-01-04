@extends('kamalkalrafandu::layouts.master')

@section('css')
<style>
    a {
        text-decoration: none !important;
    }

    .select2-dropdown.increasezindex {
        z-index: 99999;
    }


    .text_style {
        background-color: transparent;
        color: white;
        border: none !important;
    }

    .text_style:hover {
        border: 1px solid white;
    }
</style>
@endsection
@section('metadata')
<meta title="Personal-website" />
<meta description="Personal-website:creator for you" />
<meta name="keywords" content="" />
@endsection
@section('content')
<div class="pw-body">
    @if (Auth::check())
    <div class="header_login">
        <div class="header_inner">
            <a href="" data-toggle="collapse" data-target="#demo"> Hi! {{ Auth::user()->name }} <i
                    class="fa fa-angle-down"></i></a>
            <div id="demo" class="collapse header-clp">
                <ul>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                            Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <a class="header_edit" href="{{ route('dashboard') }}">Edit</a> --}}
    </div>
    @endif
    <div class="pw-left">
        <div class="headerContainerMobile">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobileNav">
                        <div id="open-nav-menu" class="nav-icon">
                            <div class="icon-bar"></div>
                            <div class="icon-bar"></div>
                            <div class="icon-bar"></div>
                        </div>
                        <div class="logoArea">
                            <h1><img src="{{ asset('images/kamal-sign.png') }}" alt="kamal-sign.png"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter_wrap">
            <button type="button" data-toggle="collapse" data-target="#filter_options" aria-expanded="false"
                aria-controls="filter_options">
                <i class="ti-filter"></i> Filter by
            </button>
            <div class="collapse filter_opt" id="filter_options">
                <ul>
                    <li> <a href="{{route('filterByposts',['authername'=>'kamal.kalra', 'type'=>'post'])}}">Post </a>
                    </li>
                    <li> <a href="{{route('filterByposts',['authername'=>'kamal.kalra', 'type'=>'blog'])}}">Blog</a>
                    </li>
                    <li><a
                            href="{{route('filterByposts',['authername'=>'kamal.kalra', 'type'=>'twitter'])}}">Twitter</a>
                    </li>
                    <li><a
                            href="{{route('filterByposts',['authername'=>'kamal.kalra', 'type'=>'facebook'])}}">Facebook</a>
                    </li>
                    <li><a
                            href="{{route('filterByposts',['authername'=>'kamal.kalra', 'type'=>'instagram'])}}">Instagram</a>
                    </li>
                    <li><a
                            href="{{route('filterByposts',['authername'=>'kamal.kalra', 'type'=>'linkedin'])}}">LinkedIn</a>
                    </li>
                    <li><a class="reset_filter" href="{{route('home')}}">Reset</a></li>
                </ul>
            </div>
        </div>

        <div class="mobileHeader">
            <div class="mobileHeader_inner">
                <div class="helloSec">
                    <div class="iContainer">
                        <div class="hsLeft">
                            <p>
                                An Engineer by Degree, an Executive by Profession and an Author by Passion.
                            </p>
                            <div class="socialFooter">
                                <ul>
                                    <li><a href=""><i class="ti-twitter-alt"></i></a></li>
                                    <li><a href=""><i class="ti-facebook"></i></a></li>
                                    <li><a href=""><i class="ti-linkedin"></i></a></li>
                                    <li><a href=""><i class="ti-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="hsRight">
                            <img src="{{ asset('images/kamal-kalra.png') }}" alt="kamal-sign.png">
                        </div>
                    </div>
                </div>
                <div class="bioSec">
                    <div class="iContainer">
                        <h3>Biography</h3>
                        <p>I live in Faridabad, with my beautiful wife and two wonderful kids. I proudly call myself an
                            “Intrapreneur”, what does it mean? Well, it means, that I have been an on the job
                            Entrepreneur
                            for last 15
                            years. I love the process of making processes </p>
                        <a href="{{ route('biographyDetails') }}" class="rmore">Know More</a>
                    </div>
                </div>
                <div class="myProSec">
                    <div class="iContainer">
                        <div class="blockHead">
                            <div class="bhLeft">
                                <div class="titleTag">My Book</div>
                                <h4>Leap Ahead</h4>
                                <p class="titleDesco">A framework in
                                    Operational Excellence</p>
                            </div>
                            <div class="bhRight">
                                <img src="{{ asset('images/kk-book.png') }}" alt="kk-book.png">
                            </div>
                        </div>
                        <h5>Summary</h5>
                        <p>Timeless principles to build excellence in business operations. You will learn ideas and
                            techniques to
                            not only improve your business but also to help you transform your life. Fragments of this
                            framework can
                            be seen in the lives of every successful human being, in religions and even in literature
                            throughout the
                            centuries. </p>
                        <a href="" class="rmore">Buy Now</a>
                    </div>
                </div>
                <div class="ctaSec">
                    <div class="iContainer">
                        <h4>Skip to the good part...</h4>
                        <ul class="ctaList">
                            <li><a href="">
                                    <div class="ctaImage"><img src="{{ asset('images/cta1.jpg') }}" alt="cta1.jpg">
                                    </div>
                                    <div class="ctaMatr"><i class="ti-twitter"></i>
                                        <h5> My Tweets</h5>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="ctaImage"><img src="{{ asset('images/cta2.jpg') }}" alt="cta2.jpg">
                                    </div>
                                    <div class="ctaMatr"><i class="ti-write"></i>
                                        <h5> Recent Posts</h5>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="ctaImage"><img src="{{ asset('images/cta3.jpg') }}" alt="cta3.jpg">
                                    </div>
                                    <div class="ctaMatr"><i class="ti-face-smile"></i>
                                        <h5> Social Events</h5>
                                    </div>
                                </a>
                            </li>
                            <li><a href="">
                                    <div class="ctaImage"><img src="{{ asset('images/cta4.jpg') }}" alt="cta4.jpg">
                                    </div>
                                    <div class="ctaMatr"><i class="ti-marker-alt"></i>
                                        <h5>My Book</h5>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="iContainer" id="mainDiv">
            <div class="postsDisplay">
                @forelse($post as $post)
                <div class="col-lg-12 col-md-12 col-sm-12 embeded_post " id="main_post_div{{$post->id}}">
                    <div class="post_remove">
                        <span class="post_date">{{date('d F Y',strtotime($post->created_at))}}</span>
                        @if(Auth::user())
                        @if(Auth::user()->role=='owner')
                        <a href="javaScript:void(0);" class="btn_remove_post" data-id="{{$post->id}}"><i
                                class="ti-close"></i></a>
                        @endif
                        @endif
                        {{-- <button class="btn_remove_post">
                            <i class="ti-close"></i>
                        </button> --}}
                    </div>
                    @if(!empty($post->title))
                    <h3 class="post_title"><a
                            href="{{route('postDetails',['id'=>$post->id])}}">{{ucfirst($post->title)}}</a></h3>
                    @endif
                    @if(!empty($post->sub_title))
                    <h4>{{ucfirst($post->sub_title)}}</h4>
                    @endif


                    @if(!empty($post->title))
                    @if (!empty($post['post_content']))
                    <?php
                    $rem_len = str_word_count($post['post_content']);
                    $extract_data = implode(' ', array_slice(explode(' ', $post['post_content']), 0, 50));

                    ?>
                    @if($rem_len > 50)
                    <p class="post_details">{!! $extract_data !!}
                    </p>
                    <a href="{{route('postDetails',['id'=>$post->id])}}" class="post_read_more"> Read more </a>
                    @else
                    <p class="post_details">{!! $post['post_content'] !!}</p>
                    @endif

                    @endif

                    @else
                    <p class="post_details">{!! $post['post_content'] !!}</p>
                    @endif
                    @if(count($post->post_image) == 1)
                    <div class="light_gallery gitem" id="lightGallery">
                        @foreach($post->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post->post_image) == 2)
                    <div class="light_gallery gitem2" id="lightGallery">
                        @foreach($post->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post->post_image) == 3)
                    <div class="light_gallery gitem3" id="lightGallery">
                        @foreach($post->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post->post_image) == 4)
                    <div class="light_gallery gitem4" id="lightGallery">
                        @foreach($post->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">

                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif
                    @if(count($post->post_image) > 5)
                    <div class="light_gallery gitem5" id="lightGallery">
                        @foreach($post->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            <div class="more_img_overlay">
                                <span>+{{count($post->post_image)-5}}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    @endif

                    <div class="postFtr">
                        <ul class="pftrList">
                            <!-- Button trigger modal -->
                            <li>


                                @if(!Auth::user())
                                <a href="javaScript:void(0);" onclick="goolgelogin()" id="likeremove{{$post['id']}}"
                                    title="like" class="likeremove{{$post['id']}} ">
                                    <i class="ti-heart"></i> <span> {{$post->likes}}</span>
                                </a>
                                @else
                                <a href="javaScript:void(0);" id="datashow{{$post['id']}}"
                                    class="text-danger datashow{{$post['id']}} " title="liked !" style="display: none">
                                    <i class="ti-heart"></i>
                                    <span id="datalike{{$post['id']}}" class="datalike{{$post['id']}}">
                                        {{$post->likes}}</span>
                                </a>
                                @if($post->likeExist)
                                <a href="javaScript:void(0);" id="likeshow{{$post['id']}}"
                                    class="text-danger likeshow{{$post['id']}}" title="liked !">
                                    <i class="ti-heart"></i> <span> {{$post->likes}}</span>
                                </a>
                                @else
                                <a href="javaScript:void(0);" @if(Auth::user()) onclick="likes('{{$post['id']}}')" @else
                                    onclick="goolgelogin()" @endif id="likeremove{{$post['id']}}" title="like"
                                    class="likeremove{{$post['id']}}">
                                    <i class="ti-heart"></i> <span> {{$post->likes}}</span>
                                </a>
                                @endif

                                @endif
                            </li>

                            <li>
                                <a href="javaScript:void(0);" class="comment_icon" data-id="{{$post['id']}}"
                                    data-toggle="collapse" data-target="#comments_view{{$post['id']}}">

                                    <i class="ti-comment"></i>
                                    <span id="commentCount-{{$post->id}}">{{$post['total_comment']}}
                                    </span>
                                </a>
                                <input type="hidden" id="commentCountbox{{$post->id}}" value="0">
                            </li>
                            <li><a href="">
                                    @if (is_array($post->categ) || is_object($post->categ))
                                    <i class="ti-flag-alt"></i>
                                    @foreach($post->categ as $val_tag)
                                    <span> <a
                                            href="{{route('filterByCategory',['authername'=>'kamal.kalra','type'=>$val_tag])}}">{{ucfirst($val_tag)}}</a>
                                    </span> &nbsp;
                                    @endforeach
                                    @endif

                                </a>
                            </li>
                            <div id="comments_view{{$post['id']}}" class="collapse comment_box">
                                <div>
                                    @if(!empty(Auth::user()))
                                    <form action="" id="commet_form{{$post['id']}}" class="comment_form" method="POST">
                                        <div class="comment_input">
                                            <input type="hidden" name="post_new_id" id="post_new_id">
                                            <input type="text" name="" id="comment_message{{$post['id']}}"
                                                class="form-control" placeholder="Write comments">
                                        </div>
                                        <button type="submit" onClick="submitForm(`{{$post->id}}`)">
                                            <i class="ti-location-arrow"></i>
                                        </button>
                                    </form>
                                    @endif
                                    <div id="commentId-{{$post->id}}" class="comment_history">
                                        @forelse ($post['all_comments'] as $comm)
                                        <div id="comment_row{{$post->id}}{{$comm->id}}">
                                            <!-- <div class="row">
                                                <div class="col-6">
                                                    <p class="m-0 p-0">{{$comm->user_name}}</p>
                                                    <span>{{$comm->comments}}</span>
                                                </div>
                                                <div class="col-2">
                                                    @if(Auth::user())
                                                    @if(Auth::user()->role=='owner')
                                                    <a data-toggle="collapse" data-target="#reply_view{{$comm['id']}}" href="javaScript:void(0);" class="comment_icon " style="background: transparent;color:gray" title="Reply">
                                                        Reply
                                                    </a>
                                                    @endif
                                                    @endif
                                                </div>
                                                <div class="col-2 text-right">
                                                    {{-- {{moment($comm->created_at).startOf('hour').fromNow(); }} --}}
                                                    {{$comm->created_at->diffForHumans()}}

                                                </div>
                                                @if(Auth::user())
                                                @if(Auth::user()->role=='owner')
                                                <div class="col-2">
                                                    <a href="javaScript:void(0);" data-id="{{$comm->id}}" class="post_com_delete" onclick="deleteComment('{{$comm->id}},{{$post->id}}')">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                </div>
                                                @endif
                                                @endif
                                            </div> -->
                                            <div class="com_inner" id="comment_row{{$post->id}}{{$comm->id}}">
                                                <div class="com_user">
                                                    <h4>{{$comm->user_name}}</h4>
                                                    <p>{{$comm->comments}}</p>
                                                </div>
                                                @if(Auth::user())
                                                @if(Auth::user()->role=='owner')
                                                <a href="javaScript:void(0);" data-id="{{$comm->id}}"
                                                    class="post_com_delete"
                                                    onclick="deleteComment('{{$comm->id}},{{$post->id}}')">
                                                    <i class="ti-close"></i>
                                                </a>
                                                @endif
                                                @endif
                                                <ul class="com_action">
                                                    <li>
                                                        {{-- {{moment($comm->created_at).startOf('hour').fromNow(); }}
                                                        --}}
                                                        {{$comm->created_at->diffForHumans()}}
                                                    </li>
                                                    @if(Auth::user())
                                                    @if(Auth::user()->role=='owner')
                                                    <li>
                                                        <a data-toggle="collapse"
                                                            data-target="#reply_view{{$comm['id']}}"
                                                            href="javaScript:void(0);" title="Reply">
                                                            Reply
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="collapse com_inner" id="reply_view{{$comm->id}}">
                                                <form class="comment_form reply_form" action="" id="reply{{$comm->id}}">
                                                    <div class="comment_input">
                                                        <input type="hidden" name="reply_for_comment"
                                                            id="reply_for_comment" value="{{$comm->id}}">
                                                        <input type="text" name="reply_message"
                                                            id="reply_message{{$comm->id}}" class="form-control"
                                                            placeholder="Reply on comment">
                                                    </div>
                                                    <button type="submit" onclick="submitReply('{{$comm->id}}')">
                                                        <i class="ti-location-arrow"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div id="replyview{{$comm->id}}" style="margin-left: 20px;">
                                                @foreach($comm['all_reply'] as $reply)
                                                <div class="com_inner">
                                                    <div class="com_user">
                                                        <h4>Replied by : {{$comm->user_name}}</h4>
                                                        <p>{{$reply->replys}}</p>
                                                    </div>
                                                    <ul class="com_action">
                                                        <li>
                                                            {{$reply->created_at->diffForHumans()}}
                                                        </li>
                                                    </ul>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- <div class="co-12 collapse header-clp mb-3" id="reply_view{{$comm->id}}">
                                            <form action="" id="reply{{$comm->id}}">
                                                <div class="row">
                                                    <div class="col-8 ">
                                                        <input type="hidden" name="reply_for_comment"
                                                            id="reply_for_comment" value="{{$comm->id}}">
                                                        <input type="text" name="reply_message"
                                                            id="reply_message{{$comm->id}}" class="form-control"
                                                            placeholder="Reply on comment">
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <button type="submit" class="btn btn-outline-primary btn-sm"
                                                            onclick="submitReply('{{$comm->id}}')">Reply</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}
                                        {{-- <div class="col-12 mb-3 mt-0" id="replyview{{$comm->id}}">

                                            @foreach($comm['all_reply'] as $reply)
                                            <div class="mb-2">
                                                Reply by : <span><strong>{{$reply->user_name}}</strong></span>
                                                <div class="row">
                                                    <div class="col-8" style="word-wrap: break-word">
                                                        {{$reply->replys}}
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        {{$reply->created_at->diffForHumans()}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div> --}}
                                        @empty
                                        <div class="text-center" id="nocomment-{{$post->id}}">No comments.</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <li>
                                <a href="">
                                    @if (is_array($post->tags) || is_object($post->tags))
                                    <i class="ti-tag"></i>
                                    @foreach($post->tags as $val_tag)
                                    <a href="{{route('filterByTag',['authername'=>'kamal.kalra','type'=>$val_tag])}}">
                                        <span> {{ucfirst($val_tag)}}</span> </a>
                                    @endforeach
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                @empty
                <div class="col-lg-12 col-md-12 text-center mt-5">
                    <p class="text-danger">No data found</p>
                </div>
                @endforelse
            </div>
        </div>


    </div>
    <div class="pw-right">
        <div class="pwRightInr">
            @foreach ($data as $data)
            @if ($data['section_name'] == 'Intro')
            <div class="helloSec">
                <div class="iContainer">
                    {{-- @if(Auth::user())
                    @if(Auth::user()->role=='owner')
                    <a href="javaScript:void(0);" type="button" id="edit1section" data-id="{{Auth::user()->id}}"
                        data-type="{{ $data['id'] }}">Edit {{ $data['id'] }}</a>
                    <a href="" type="button" onclick="openForm2()" data-toggle="modal" data-target="#myModal2">Add
                        Section</a>
                    <a href="" type="button" onclick="openForm3()" data-toggle="modal" data-target="#myModal3">Add
                        Item</a>

                    @endif
                    @endif --}}
                    <div class="hsLeft">
                        <p>
                            @foreach ($data['section_item'] as $item)
                            @if(!empty(Auth::user()->id))
                            @if(Auth::user()->role=='owner')
                            @if ($item['section_item_name'] == 'Greeting')
                        <form action="" id="greating_form">
                            <input type="hidden" name="greating_id" id="greating_id" value="{{$item['id']}}">
                            <input type="text" name="section_name" id="section_name"
                                value="{{ $item['section_item_value'] }}" class="text_style">
                        </form>
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Greeting')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Greeting')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif
                        @endforeach

                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Signature')
                        @if(!empty(Auth::user()->id))
                        @if(Auth::user()->role=='owner')
                        <form action="">
                            <input type="hidden" name="change_signature_id" id="change_signature_id"
                                value="{{$item['id']}}">
                            {{-- <input type="file" name="change_signature" id="change_signature" class=""> --}}
                            <span class="text-danger text-left">
                                <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="imgPreview" />
                            </span>
                        </form>
                        @else
                        <span>
                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        </span>
                        @endif
                        @else
                        <span>
                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        </span>
                        @endif
                        @endif
                        @endforeach
                        @foreach ($data['section_item'] as $item)
                        @if(!empty(Auth::user()->id))
                        @if(Auth::user()->role=='owner')
                        @if ($item['section_item_name'] == 'Degree')
                        <form action="">
                            <input type="hidden" name="section_descr_id" id="section_descr_id" value="{{$item['id']}}">
                            <textarea name="section_descr" id="section_descr" cols="10" rows="5"
                                class="text_style">{{ $item['section_item_value'] }}</textarea>
                        </form>
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Degree')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif
                        @else
                        @if ($item['section_item_name'] == 'Degree')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endif

                        @endforeach
                        </p>
                        <div class="socialFooter">
                            <ul>
                                <li>
                                    <a href=""><i class="ti-twitter-alt"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    {{-- @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Twitter_Link')
                                        <input type="hidden" name="twitter_id" id="twitter_id" value="{{$item['id']}}">
                                        <input type="url" name="twitter_link" id="twitter_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif --}}
                                    @endforeach
                                </li>
                                <li>
                                    <a href=""><i class="ti-facebook"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    {{-- @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Facebook_Link')
                                        <input type="hidden" name="facebook_id" id="facebook_id"
                                            value="{{$item['id']}}">
                                        <input type="url" name="facebook_link" id="facebook_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif --}}
                                    @endforeach
                                </li>
                                <li>
                                    <a href=""><i class="ti-linkedin"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    {{-- @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Linkdin_Link')
                                        <input type="hidden" name="linkdin_id" id="linkdin_id" value="{{$item['id']}}">
                                        <input type="url" name="linkdin_link" id="linkdin_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif --}}
                                    @endforeach
                                </li>
                                <li>
                                    <a href=""><i class="ti-youtube"></i></a>
                                    @foreach ($data['section_item'] as $item)
                                    {{-- @if(Auth::user())
                                    @if(Auth::user()->role=='owner')
                                    <form action="">
                                        @if ($item['section_item_name'] == 'Youtube_Link')
                                        <input type="hidden" name="youtube_id" id="youtube_id" value="{{$item['id']}}">
                                        <input type="url" name="youtube_link" id="youtube_link" class="form-control"
                                            value="{{$item['section_item_value']}}">
                                        @endif
                                    </form>
                                    @endif
                                    @endif --}}
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Profile Image')
                    <div class="hsRight">
                        @if(Auth::user())
                        @if(!empty(Auth::user()->role=='owner'))
                        {{-- <a href="javaScript:void(0);" class="btn btn-sm btn-outline-light" data-toggle="modal"
                            data-target="#profilemodal">Change Profile</a> --}}
                        <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" id="profileimgPreview" />
                        @else
                        <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        @endif
                        @else
                        <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        @endif
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
            @endif
            @if ($data['section_name'] == 'Biography')
            <div class="bioSec">
                <div class="iContainer">
                    <h3>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Title')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </h3>
                    <p>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Description')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </p>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Read More Link')
                    {{-- <a href="{{ $item['section_item_value'] }}" class="rmore">Know More</a> --}}
                    {{-- <a href="javaScript:void(0);" class="rmore" onclick="hideMainDiv(); return false"
                        id="knowmorebtn">Know More</a>
                    <a href="javaScript:void(0);" class="rmore" onclick="showMainDiv(); return false" id="knowlessbtn"
                        style="display:none">Know Less</a> --}}
                    <a href="{{ route('biographyDetails') }}" class="rmore">Know More</a>

                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if ($data['section_name'] == 'My Book')
            <div class="myProSec">
                <div class="iContainer">
                    <div class="blockHead">
                        <div class="bhLeft">
                            <div class="titleTag">
                                @foreach ($data['section_item'] as $item)
                                @if ($item['section_item_name'] == 'Section Title')
                                {{ $item['section_item_value'] }}
                                @endif
                                @endforeach
                            </div>
                            <h4>
                                @foreach ($data['section_item'] as $item)
                                @if ($item['section_item_name'] == 'Section Sub Title')
                                {{ $item['section_item_value'] }}
                                @endif
                                @endforeach
                            </h4>
                            <p class="titleDesco">
                                @foreach ($data['section_item'] as $item)
                                @if ($item['section_item_name'] == 'Section Description')
                                {{ $item['section_item_value'] }}
                                @endif
                                @endforeach
                            </p>
                        </div>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Image')
                        <div class="bhRight">
                            <img src="{{ asset('package') }}/{{ $item['section_item_value'] }}" />
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <h5>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Title')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </h5>
                    <p>
                        @foreach ($data['section_item'] as $item)
                        @if ($item['section_item_name'] == 'Description')
                        {{ $item['section_item_value'] }}
                        @endif
                        @endforeach
                    </p>
                    @foreach ($data['section_item'] as $item)
                    @if ($item['section_item_name'] == 'Buy Now Link')
                    <a href="{{ $item['section_item_value'] }}" class="rmore">Buy Now</a>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
            <div class="ctaSec">
                <div class="iContainer">
                    <h4>Skip to the good part...</h4>
                    <ul class="ctaList">
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta1.jpg') }}" alt="cta1.jpg"></div>
                                <div class="ctaMatr"><i class="ti-twitter"></i>
                                    <h5> My Tweets</h5>
                                </div>
                            </a>
                        </li>
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta2.jpg') }}" alt="cta2.jpg"></div>
                                <div class="ctaMatr"><i class="ti-write"></i>
                                    <h5> Recent Posts</h5>
                                </div>
                            </a>
                        </li>
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta3.jpg') }}" alt="cta3.jpg"></div>
                                <div class="ctaMatr"><i class="ti-face-smile"></i>
                                    <h5> Social Events</h5>
                                </div>
                            </a>
                        </li>
                        <li><a href="">
                                <div class="ctaImage"><img src="{{ asset('images/cta4.jpg') }}" alt="cta4.jpg"></div>
                                <div class="ctaMatr"><i class="ti-marker-alt"></i>
                                    <h5>My Book</h5>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Auth::check())
@if(Auth::user()->role=='owner')
<button class="open-button" onclick="openForm()" data-toggle="modal" data-target="#myModal">Post</button>
<div class="modal fade pw_modal" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('createPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create Post</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="user_info">
                        <div class="user_info_inner">
                            <figure>
                                <img src="{{ asset('images/profile.jpg') }}" alt="alt=" cta1.jpg"">
                            </figure>
                            <h4>Kamal Kalra</h4>
                        </div>
                        <select class="user_post_type " name="postType" id="postType">
                            <option value="post">Post</option>
                            <option value="blog">Blog</option>
                            <option value="twitter">Twitter</option>
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="linkedin">LinkedIn</option>
                        </select>
                    </div>


                    <div id="postEditor" name="postEditor">
                        <div class="fieldrow">
                            <input type="text" placeholder="Title" name="post_title" />
                        </div>
                        <textarea rows="4" cols="50" name="post_post" id="post_post"
                            placeholder="Describe yourself here..."></textarea>
                    </div>



                    <div id="otherEditor" name="otherEditor">
                        <textarea rows="4" cols="50" name="post" id="post"
                            placeholder="Describe yourself here..."></textarea>
                    </div>



                    <div id="blogEditor" name="blogEditor">
                        <div class="fieldrow">
                            <input type="text" placeholder="Title" name="blog_title" />
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Subtitle" name="blog_subtitle" />
                        </div>
                        <textarea id="editor1" name="blog_post"></textarea>
                    </div>
                    <div class="post_options">
                        <h3>Add to Your Post</h3>
                        <div class="row">
                            <div class="col-4">
                                {{-- <a href="javaScript:void(0);" class="btn btn-sm btn-outline-primary"
                                    onclick="postImageModal()">
                                    <i class="fa fa-picture-o"></i>
                                </a> --}}
                                <label for="tags">Select Image </label>
                                <input type="file" name="post_image[]" id="post_image" class="form-control" multiple>

                            </div>
                            <div class="col-4">
                                <label for="tags">Select Tags</label>
                                <select name="tags[]" id="tags" class="select2 form-control" multiple="multiple"
                                    style="width:150px">
                                    <option value="entertainment">Entertainment</option>
                                    <option value="art">Art</option>
                                    <option value="hobbies">Hobbies</option>
                                    <option value="self care">Self Care</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="categories">Select Categories</label>
                                <select name="categories[]" id="categories" class="select2 form-control"
                                    multiple="multiple" style="width:150px">
                                    <option value="entertainment">Entertainment</option>
                                    <option value="art">Art</option>
                                    <option value="hobbies">Hobbies</option>
                                    <option value="self care">Self Care</option>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="gallery uploaded_img">
                        </div>
                        <div class="col-4 text-left" style="display: none" id="imageremovebtn">
                            <a href="javaScript:void(0);" class="btn btn-outline-danger btn-sm"
                                onclick="removeImage()">Remove Image</a>
                        </div>
                    </div>
                    {{-- <ul class="uploaded_img">
                        <li>
                            <img src="https://personal-website.iudyog.com/images/profile.jpg" alt="profile.jpg">
                            <button class="remove_img">
                                <i class="ti-close" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <img src="https://personal-website.iudyog.com/images/profile.jpg" alt="profile.jpg">
                            <button class="remove_img">
                                <i class="ti-close" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <img src="https://personal-website.iudyog.com/images/profile.jpg" alt="profile.jpg">
                            <button class="remove_img">
                                <i class="ti-close" aria-hidden="true"></i>
                            </button>
                        </li>
                    </ul> --}}
                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Publish</button>
                </div>

                {{-- <div class="modal fade" id="post_Image" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" id="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Images</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    onclick="closemodal()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="file" name="post_image[]" id="post_image" class="form-control" multiple>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="container">
                <form action="/action_page.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Greeting</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="greeting" name="greeting" placeholder="Your greeting.."
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Signature</label>
                        </div>
                        <div class="col-75">
                            <input type="file" id="signature" name="signature" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Profile Image</label>
                        </div>
                        <div class="col-75">
                            <input type="file" id="profile" name="profile" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Facebook</label>
                        </div>
                        <div class="col-75">
                            <input type="url" id="facebook" name="facebook" placeholder="https://" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Instagram</label>
                        </div>
                        <div class="col-75">
                            <input type="url" id="instagram" name="instagram" placeholder="https://"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Twitter</label>
                        </div>
                        <div class="col-75">
                            <input type="url" id="twitter" name="twitter" placeholder="https://" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Youtube</label>
                        </div>
                        <div class="col-75">
                            <input type="url" id="youtube" name="youtube" placeholder="https://" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Linked In</label>
                        </div>
                        <div class="col-75">
                            <input type="url" id="linkdin" name="linkdin" placeholder="https://" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer_btn">
                        <a href="">POST</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="container">
                <form action="{{ route('createSection') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Section Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="sectionName" name="sectionName" placeholder="Section name.."
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Sequence</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="sequence" name="sequence" placeholder="Section name.." required>
                        </div>
                        <input type="file" id="myFile" name="filename">
                    </div>
                    <div class="modal-footer_btn">
                        <input type="submit" value="Publish">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="container">
                <form action="{{ route('createSectionItem') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-25">
                            <label for="country">Item type</label>
                        </div>
                        <div class="col-75">
                            <select id="itemType" name="itemType">
                                <option value="text">Text</option>
                                <option value="long_text">Long Text</option>
                                <option value="image">Image</option>
                                <option value="html">HTML</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Item Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="itemName" name="itemName" placeholder="Item name.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fname">Item Value</label>
                        </div>
                        <div class="col-75" id="itemValue2">
                            <input type="text" id="itemValue" name="itemValue" placeholder="Item name..">
                        </div>
                        <div class="col-75" id="textareaItem">
                            <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-75" id="editorItem">
                            <textarea id="editor" name="editor1"></textarea>
                        </div>
                        <div class="col-75" id="fileItem">
                            <input type="file" id="myFile" name="filename">
                        </div>
                    </div>
                    <div class="modal-footer_btn">
                        <input type="submit" value="Publish">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file" name="change_profile" id="change_profile" class="form-control">
            </div>

        </div>
    </div>
</div>
@endif
@endif
@endsection

@if(!Auth::user())
<div class="modal google_sign fade" id="loginwithgooglemodal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn_close" data-dismiss="modal" aria-label="Close" onclick="closemodal()">
                    <i class="ti-close"></i>
                </button>
                <a href="{{ route('redirectToGoogle') }}" class="btn_google">
                    <h5>Sign in with Google</h5><i class="fa-brands fa-google-plus-g"></i>
                </a>
            </div>

        </div>
    </div>
</div>
@endif
@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
    $(document).on('click', '.btn_remove_post', function(e) {
    e.preventDefault();
    var post_id = $(this).data('id');
    swal({
        title: 'Are you sure?',
        text: "You won't delete this post!",
        icon: 'warning',
        buttons: true,
        buttonsStyling: false,
        reverseButtons: true
    }).then((confirm) => {
        if (confirm) {
            $.ajax({
                type: "GET",
                url: "{{route('deletePost')}}",
                data: { id: post_id },
                success: function(data) {
                    swal({
                        title: 'Success',
                        text: "Deleted",
                        icon: 'success',
                        buttons: true,
                        buttonsStyling: false,
                        reverseButtons: true
                    });
                    $('#main_post_div' + post_id).hide();
                }
            });
        }

    });

});
</script>

<script>
    function goolgelogin() {
        $('#loginwithgooglemodal').modal('show');
    }

    function likes(postid) {
        // alert(postid);
        var postid = postid;
        $.ajax({
            type: "GET",
            url: "{{route('likes')}}",
            data: {
                postid: postid
            },
            success: function(res) {
                $('.likeshow' + postid).hide();
                $('.likeremove' + postid).hide();
                $('#datalike' + postid).html(res);
                $('#datashow' + postid).show();
            },
        });
    }


    function deleteComment(ids) {


        var ids = ids.split(',');
        var post_id = ids[1];
        var comment_id = ids[0];
        var counter = $('#commentCountbox' + post_id).val();
        var desc = parseInt(counter) - 1;

        $('#commentCount-' + post_id).html(desc);
        $('#commentCountbox' + post_id).val(desc);




        $.ajax({
            type: "GET",
            url: "{{route('deletesComment')}}",
            data: {
                comment_id: comment_id
            },
            success: function(res) {
                $('#comment_row' + post_id + comment_id).hide();

            },
        });
    }
</script>

<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $('.gallery').show();
                        $($.parseHTML('<img style="width:100px;height:100px;margin:20px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#post_image').on('change', function() {
            imagesPreview(this, 'div.gallery');
            $('#imageremovebtn').show();
        });
    });


    function removeImage() {
        $('#post_image').val('');
        $('.gallery').html('');
        $('.gallery').hide();
        $('#imageremovebtn').hide();

    }
</script>

<script>
    $(document).ready(() => {
        $("#change_signature").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#imgPreview")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
            $("#signaturemodal").modal('hide');
            $('.modal-backdrop').remove();

            var form_data = {
                "_token": "{{ csrf_token() }}",
                id: $("#change_signature_id").val(),
                type: 'image',
                value: $("#change_signature").val()

            };

        });


        $("#change_profile").change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $("#profileimgPreview")
                        .attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
            $("#profilemodal").modal('hide');
            $('.modal-backdrop').remove();

        });


    });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: 'increasezindex'
        });
    });


    setTimeout(function() {
        $(document).ready(function() {

            $("#loginwithgooglemodal").modal('show');
            $('.modal-backdrop').remove();
        }, 10000);

        $(".comment_icon").click(function(event) {
            var id = $(this).data('id');
            var first_value = $('#commentCount-' + id).text();
            var value = parseInt(first_value);
            var counter = $('#commentCountbox' + id).val(value);
            $('#post_new_id').val(id);
        });
    });

    $('#post_image').change(function(event) {
        $('#post_Image').modal('hide');
    });

    function closemodal() {
        $('#loginwithgooglemodal').modal('hide');
    }

    // function postImageModal(){
    //     $('#post_Image').modal('show');

    // }

    function submitForm(id) {
        var counter = $('#commentCountbox' + id).val();
        var incr = parseInt(counter) + 1;

        $('#commentCount-' + id).html(incr);
        $('#commentCountbox' + id).val(incr);

        $("#commet_form" + id).submit(function(event) {
            var formData = {
                "_token": "{{ csrf_token() }}",
                comment_message: $("#comment_message" + id).val(),
                post_id: $("#post_new_id").val(),
            };

            $.ajax({
                type: "POST",
                url: "{{route('sendComment')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(res) {
                    if (res.success == true) {
                        $('#commentId-' + id).prepend(res.data);
                        $('#comment_message' + id).val('');
                        $('#nocomment-' + id).hide();
                        //$('#commentCount-'+id).html(incr);
                        // $('#commentCountbox'+id).val(incr);
                    }

                },
            });
            event.preventDefault();
            event.stopImmediatePropagation();
        });
    }

    function submitReply(id) {
        $("#reply" + id).submit(function(event) {
            var formData = {
                "_token": "{{ csrf_token() }}",
                reply_message: $("#reply_message" + id).val(),
                comment_id: id,
            };
            // alert(formData.reply_message);
            // alert(formData.comment_id);

            $.ajax({
                type: "POST",
                url: "{{route('sendReply')}}",
                data: formData,
                dataType: "json",
                encode: true,
                success: function(res) {
                    if (res.success == true) {
                        $('#replyview' + id).prepend(res.data);
                        $('#reply_message' + id).val('');
                    }

                },
            });
            event.preventDefault();
            event.stopImmediatePropagation();
        });
    }
</script>



<script>
    $("#section_name").blur(function(event) {
        var formData = {
            "_token": "{{ csrf_token() }}",
            id: $("#greating_id").val(),
            value: $("#section_name").val(),
        };

        $.ajax({
            type: "POST",
            url: "{{route('editSection')}}",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                alert('Save changes.');
            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $("#section_descr").blur(function(event) {
        var formData = {
            "_token": "{{ csrf_token() }}",
            id: $("#section_descr_id").val(),
            value: $("#section_descr").val(),
        };

        $.ajax({
            type: "POST",
            url: "{{route('editSection')}}",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                alert('Save changes.');
            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $("#twitter_link").blur(function(event) {
        var formData = {
            "_token": "{{ csrf_token() }}",
            id: $("#twitter_id").val(),
            value: $("#twitter_link").val(),
        };

        $.ajax({
            type: "POST",
            url: "{{route('editSection')}}",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                alert('Save changes.');
            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $("#facebook_link").blur(function(event) {
        var formData = {
            "_token": "{{ csrf_token() }}",
            id: $("#facebook_id").val(),
            value: $("#facebook_link").val(),
        };

        $.ajax({
            type: "POST",
            url: "{{route('editSection')}}",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                alert('Save changes.');
            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $("#linkdin_link").blur(function(event) {
        var formData = {
            "_token": "{{ csrf_token() }}",
            id: $("#linkdin_id").val(),
            value: $("#linkdin_link").val(),
        };

        $.ajax({
            type: "POST",
            url: "{{route('editSection')}}",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                alert('Save changes.');
            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });

    $("#youtube_link").blur(function(event) {
        var formData = {
            "_token": "{{ csrf_token() }}",
            id: $("#youtube_id").val(),
            value: $("#youtube_link").val(),
        };

        $.ajax({
            type: "POST",
            url: "{{route('editSection')}}",
            data: formData,
            dataType: "json",
            encode: true,
            success: function(res) {
                alert('Save changes.');
            },
        });
        event.preventDefault();
        event.stopImmediatePropagation();
    });
</script>



<script>
    $('#edit1section').click(function() {
        var id = $(this).data('id');
        var sectionId = $(this).data('type');
        $.ajax({
            url: "{{route('editSection')}}",
            type: 'GET',
            data: {
                id: id,
                sectionId: sectionId
            },
            success: function(data) {
                jQuery('#myModal1').modal('show');
            }

        });
    });
</script>


<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function openForm1() {
        document.getElementById("myForm1").style.display = "block";
    }

    function openForm2() {
        document.getElementById("myForm2").style.display = "block";
    }

    function openForm2() {
        document.getElementById("myForm3").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
<script>
    CKEDITOR.replace('editor1');
</script>
<script>
    $(document).ready(function() {
        $("#postEditor").show();
        $("#blogEditor").hide();
        $("#otherEditor").hide();

        $("#postType").on("change", function() {
            var postType = $("#postType").val();

            if (postType == "blog") {
                $("#blogEditor").show();
                $("#postEditor").hide();
                $("#otherEditor").hide();
                console.log(postType);
            } else if (postType == "post") {
                $("#postEditor").show();
                $("#blogEditor").hide();
                $("#otherEditor").hide();

            } else {
                $("#blogEditor").hide();
                $("#postEditor").hide();
                $("#otherEditor").show();
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        console.log("*********************");
        $("#itemValue2").show();
        $("#textareaItem").hide();
        $("#editorItem").hide();
        $("#fileItem").hide();
        $("#itemType").on("change", () => {
            var type = $("#itemType").val();
            if (type == "long_text") {
                $("#itemValue2").hide();
                $("#textareaItem").show();
                $("#editorItem").hide();
                $("#fileItem").hide();
            } else if (type == "image") {
                $("#itemValue2").hide();
                $("#textareaItem").hide();
                $("#editorItem").hide();
                $("#fileItem").show();
            } else if (type == "html") {
                $("#itemValue2").hide();
                $("#textareaItem").hide();
                $("#editorItem").show();
                $("#fileItem").hide();
            } else {
                $("#itemValue2").show();
                $("#textareaItem").hide();
                $("#editorItem").hide();
                $("#fileItem").hide();
            }
        })



   

    });
</script>



@endsection
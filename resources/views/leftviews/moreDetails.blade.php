@extends('layouts.app')
@section('css')
@endsection

<style>
    .modal-open .modal {
        background: transparent;
    }

    .modal.show #modal-dialog {
        margin-right: 30px;
    }

    .select2-dropdown.increasezindex {
        z-index: 99999;
    }

    a:link {
        text-decoration: none;
    }

    .scrollable {
        scrollbar-color: #6969dd #e0e0e0;
        scrollbar-width: thin;
    }

    .scrollable::-webkit-scrollbar-thumb {
        background-image: linear-gradient(180deg, #D0368A 0%, #708AD4 99%);
        box-shadow: inset 2px 2px 5px 0 rgba(#fff, 0.5);
        border-radius: 100px;
    }
</style>

@section('content')
<div class="pw-body">
    <div class="pw-left">
        {{-- <div class="mobileHeader">
            <div class="mobileHeader_inner">
                @if(Route::current()->getName() =='fandupostDetails')
                @include('rightviews.fanduCommon')
                @elseif(Route::current()->getName() =='vineetpostDetails')
                @include('rightviews.vineetCommon')
                @elseif(Route::current()->getName() =='kamalpostDetails')
                @include('rightviews.kamalCommon')
                @endif

            </div>
        </div> --}}


        <div class="iContainer" id="mainDiv">
            <div class="postsDisplay">
                <a class="back_details" onclick="window.history.back()"><i class="fa fa-angle-left"
                        aria-hidden="true"></i>Back</a>
                <div class="col-lg-12 col-md-12 col-sm-12 embeded_post ">
                    <span class="post_date">{{date('d F Y',strtotime($post->created_at))}}</span>
                    @if(!empty($post->title))
                    <h3 class="post_title">{{ucfirst($post->title)}}</h3>
                    @endif
                    @if(!empty($post->sub_title))
                    <h4>{{ucfirst($post->sub_title)}}</h4>
                    @endif


                    @if(!empty($post->title))
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
                    @if(count($post->post_image) >= 5)
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
                                            href="{{route('filterByCategory',['segment'=>Request::segment(1),'type'=>$val_tag])}}">{{ucfirst($val_tag)}}</a>
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

                                    @if(Request::segment(1) !='')
                                    <a href="{{route('filterByTag',['type'=>$val_tag])}}">
                                        @else
                                        <a href="{{route('filterByTag',['type'=>$val_tag])}}">
                                            @endif


                                            <span> {{ucfirst($val_tag)}}</span> </a>
                                        @endforeach
                                        @endif
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="pw-right">
        <div class="pwRightInr">
            @if(Request::segment(1) =='')
            @include('rightviews.fanduCommon')
            @elseif(Request::segment(1) =='vineet-agarwala')
            @include('rightviews.vineetCommon')
            @elseif(Request::segment(1) =='kamal-kalra')
            @include('rightviews.kamalCommon')
            @else
            @include('rightviews.fanduCommon')

            @endif
        </div>
    </div>
</div>



@endsection

@section('js')


@endsection
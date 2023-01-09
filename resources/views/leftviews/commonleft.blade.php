   
@if(!empty($post))
<div class="iContainer" id="mainDiv">
    <div class="postsDisplay" >
        @forelse($post as $post)
            <div class="col-lg-12 col-md-12 col-sm-12 embeded_post " id="main_post_div{{$post->id}}">
                <div class="post_remove">
                    <span class="post_date">{{date('d F Y',strtotime($post->created_at))}}</span>
                    @if(Auth::user() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                        <a href="javaScript:void(0);" class="btn_remove_post" data-id="{{$post->id}}"><i
                            class="ti-close"></i></a>
                    @endif

                </div>
                @if(!empty($post->title))
                    <h3 class="post_title">
                        @if(Request::segment(1) !='')
                            <a href="{{route('segmentpostDetails',['segment'=>Request::segment(1),'id'=>$post->id])}}">{{ucfirst($post->title)}}</a>
                        @else
                            <a href="{{route('fandupostDetails',['id'=>$post->id])}}">{{ucfirst($post->title)}}</a>
                        @endif

                    </h3>
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
                            <p class="post_details">{!! $extract_data !!}...       </p>
                            @if(Request::segment(1) !='')
                                <a href="{{route('segmentpostDetails',['segment'=>Request::segment(1),'id'=>$post->id])}}">Read more</a>
                            @else
                                <a href="{{route('fandupostDetails',['id'=>$post->id])}}">Read more</a>
                            @endif
                        @else
                            <p class="post_details">{!! $post['post_content'] !!}</p>
                        @endif

                    @endif
                @else
                    <p class="post_details">{!! $post['post_content'] !!}</p>
                @endif
                    <div class="light_gallery @if(count($post->post_image) == 1) gitem @elseif(count($post->post_image) == 2) gitem2 @elseif(count($post->post_image) == 3) gitem3 @elseif(count($post->post_image) == 4) gitem4 @elseif(count($post->post_image) == 5) gitem5  @elseif(count($post->post_image) >= 6) gitem6  @endif"    id="lightGallery">
                        @foreach($post->post_image as $image)
                        <a href="{{asset('uploads')}}/{{$image->image}}" data-sub-html="{{$post->title}}">
                            <img src="{{asset('uploads')}}/{{$image->image}}" alt="{{$image->image}}"
                                class="img-responsive">
                            @if(count($post->post_image) >= 6)
                                <div class="more_img_overlay">
                                    <span>+{{count($post->post_image)-5}}</span>
                                </div>
                            @endif
                        </a>
                        @endforeach
                    </div>

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
                        <li>
                            <a href="">
                                @if (is_array($post->categ) || is_object($post->categ))
                                <i class="ti-flag-alt"></i>
                                @foreach($post->categ as $val_tag)
                                <span> <a
                                        href="{{route('filterByCategory',['type'=>$val_tag])}}">{{ucfirst($val_tag)}}</a>
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
                                        <input type="hidden" name="token" id="token" value={{csrf_token()}}>
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

                                                    {{$comm->created_at->diffForHumans()}}
                                                </li>
                                                @if(Auth::user())
                                                @if(Auth::user()->role=='owner')
                                                <li>
                                                    <a data-toggle="collapse" data-target="#reply_view{{$comm['id']}}"
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
                                                    <input type="hidden" name="token" id="token" value={{csrf_token()}}>

                                                    <input type="hidden" name="reply_for_comment" id="reply_for_comment"
                                                        value="{{$comm->id}}">
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
                                <a href="{{route('filterByTag',['type'=>$val_tag])}}">

                                    {{-- <a href="#"> --}}
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
                    <p class="text-danger nomore">No data found</p>
                </div>
        @endforelse
    
        <div id="result-data">
        </div>
    </div>
</div>

@endif
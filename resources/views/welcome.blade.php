@extends('layouts.app')

@section('content')

<div class="pw-body">
    @if (Auth::check())
    <div class="header_login">
        <div class="header_inner">
            <a href="" data-toggle="collapse" data-target="#demo"> Hi! 
                {{ Auth::user()->name }}  
            <i
                    class="fa fa-angle-down"></i></a>
            <div id="demo" class="collapse header-clp">
                <ul>
                    <li>
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
                    @if(Request::segment(1) !='')
                    <li> <a
                            href="{{route('segmentfilterByposts',['segment'=>Request::segment(1),'type'=>'post'])}}">Post</a>
                    </li>
                    <li> <a
                            href="{{route('segmentfilterByposts',['segment'=>Request::segment(1),'type'=>'blog'])}}">Blog</a>
                    </li>
                    <li><a
                            href="{{route('segmentfilterByposts',['segment'=>Request::segment(1),'type'=>'twitter'])}}">Twitter</a>
                    </li>
                    <li><a
                            href="{{route('segmentfilterByposts',['segment'=>Request::segment(1),'type'=>'facebook'])}}">Facebook</a>
                    </li>
                    <li><a
                            href="{{route('segmentfilterByposts',['segment'=>Request::segment(1),'type'=>'instagram'])}}">Instagram</a>
                    </li>
                    <li><a
                            href="{{route('segmentfilterByposts',['segment'=>Request::segment(1),'type'=>'linkedin'])}}">LinkedIn</a>
                    </li>
                    @else
                    <li><a href="{{route('fandufilterByposts',['type'=>'post'])}}">Post </a></li>
                    <li> <a href="{{route('fandufilterByposts',['type'=>'blog'])}}">Blog</a></li>
                    <li><a href="{{route('fandufilterByposts',[ 'type'=>'twitter'])}}">Twitter</a></li>
                    <li><a href="{{route('fandufilterByposts',[ 'type'=>'facebook'])}}">Facebook</a></li>
                    <li><a href="{{route('fandufilterByposts',['type'=>'instagram'])}}">Instagram</a></li>
                    <li><a href="{{route('fandufilterByposts',['type'=>'linkedin'])}}">LinkedIn</a></li>
                    @endif
    
                    <li><a class="reset_filter" href="javaScript:void(0);" onclick="window.history.back()">Reset</a></li>
                </ul>
            </div>
        </div>
    
        <div class="mobileHeader">
            <div class="mobileHeader_inner">
                @if(Request::segment(1) == $segment && $user->my_theme =='1')
                @include('rightviews.fanduCommon')
                @elseif(Request::segment(1) == $segment && $user->my_theme =='2')
                @include('rightviews.vineetCommon')
                @elseif(Request::segment(1) == $segment  && $user->my_theme =='3')
                @include('rightviews.kamalCommon')
                @else
                @include('rightviews.fanduCommon')
                @endif
    
            </div>
        </div>
        <div id="commonleft">
            @include('leftviews.commonleft')
        </div>
    
    </div>

    

    <div class="pw-right">
        <div class="pwRightInr">
            @if(Request::segment(1) == $segment && $user->my_theme =='1')
            @include('rightviews.fanduCommon')
            @elseif(Request::segment(1) == $segment && $user->my_theme =='2')
            @include('rightviews.vineetCommon')
            @elseif(Request::segment(1) == $segment  && $user->my_theme =='3')
            @include('rightviews.kamalCommon')
            @else
            @include('rightviews.fanduCommon')
            @endif
        </div>
    </div>
</div>

@if(Auth::check() && Auth::user()->role=='owner' && Auth::user()->my_theme ==null)
    <a href="{{route('createYourOwnSite')}}" class="btn btn-outline-danger btn-sm"> Create your own site</a>
@elseif(Auth::check() && Auth::user()->role=='owner' &&  Auth::user()->my_theme !=null )
@else
    <a href="{{route('createYourOwnSite')}}" class="btn btn-outline-danger btn-sm" onclick="goolgelogin()"> Create your own site</a>
@endif


@if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)


<button class="" onclick="openForm()" data-toggle="modal" data-target="#myModal">Post</button><br>
<button class=" btn btn-outline-warning testimonial_btn mr-2" onclick="opentestimonialForm()">Testimonial</button><br>
<button class="btn btn-outline-dark right_btn" onclick="rightContentForm()">Right Content</button>
<button class=" btn btn-outline-primary " onclick="tagsCategory()">Tags & category</button>

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
                              
                                <label for="tags">Select Image </label>
                                <input type="file" name="post_image[]" id="post_image" class="form-control" multiple>

                            </div>
                            <div class="col-4">
                                <label for="tags">Select Tags</label>
                                <select name="tags[]" id="tags" class="select2 form-control" multiple="multiple"
                                    style="width:150px">
                                    @foreach($tags as $key=>$val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="categories">Select Categories</label>
                                <select name="categories[]" id="categories" class="select2 form-control"
                                    multiple="multiple" style="width:150px">
                                    @foreach($category as $key=>$val)
                                    <option value="{{$val->name}}">{{$val->name}}</option>
                                    @endforeach
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
                            <img src="https://personal-website.iudyog.com/images/profile.jpg" alt="">
                            <button class="remove_img">
                                <i class="ti-close" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <img src="https://personal-website.iudyog.com/images/profile.jpg" alt="">
                            <button class="remove_img">
                                <i class="ti-close" aria-hidden="true"></i>
                            </button>
                        </li>
                        <li>
                            <img src="https://personal-website.iudyog.com/images/profile.jpg" alt="">
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

<div class="modal fade pw_modal" id="testimonialmodal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('submitTestimonial')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Testimonial</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">





                    <div id="blogEditor" name="blogEditor">
                        <div class="fieldrow">
                            <label for="name">Auther Name</label>
                            <input type="text" placeholder="Auther Name" name="auther_name" required />
                        </div>
                        <div class="fieldrow">
                            <label for="desgnation">Auther Designation </label>
                            <input type="text" placeholder="Designation" name="auther_designation" required />
                        </div>
                        <textarea id="editor2" name="user_quests" required></textarea>
                    </div>
                    <div class="Image_section">

                        <div class="row">
                            <div class="col-4">

                                <label for="tags">Auther Inage</label>
                                <input type="file" name="auther_image" id="auther_image" class="form-control" required>

                            </div>

                        </div>


                    </div>


                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>

<div class="modal fade pw_modal" id="rightContentForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('submitContents')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create Contents</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="" name="">
                        <div class="fieldrow">
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="feature">Features</option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Title" name="title" class="form-control" required
                                required />
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Subtitle" name="subtitle" class="form-control" />
                        </div>
                        <textarea id="editor3" name="description" class="form-control" required></textarea>
                    </div>



                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>

<div class="modal fade pw_modal" id="tagandcategorymodal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('submitTag')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create Tags & Category</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="" name="">
                        <div class="fieldrow">
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="tag">Tag</option>
                                <option value="category">Category</option>
                            </select>
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Tag / Category name" name="name" class="form-control"
                                required required />
                        </div>

                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Submit</button>
                </div>


            </form>
        </div>
    </div>
</div>

<div class="modal fade pw_modal" id="myIntrestModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('addIntrest') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Intrest</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="intrestmodalremove()">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="intrest" name="intrest">
                        <div class="fieldrow">
                            <input type="text" placeholder="Title" name="intrest_title" requird />
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Subtitle" name="intrest_subtitle" />
                        </div>
                        <textarea id="intresteditor" name="intrest_editor" required></textarea>
                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Add</button>
                </div>


            </form>
        </div>
    </div>
</div>


<div class="modal fade pw_modal" id="userGoals" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('submitGoals') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Company / Project logos</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="goalmodalemove()">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="goal" name="goal">
                        <div class="fieldrow">
                            <input type="file" placeholder="" name="goal" requird  class="form-control" />
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Company Link" name="goal_link" class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Add</button>
                </div>


            </form>
        </div>
    </div>
</div>


<div class="modal fade pw_modal" id="changePic" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('updateUserProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Change Profile Pic</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="profilepicmodalemove()">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="user_profile" name="user_profile">
                        <div class="fieldrow">
                            <input type="file" placeholder="" name="user_profile" requird  class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Change</button>
                </div>


            </form>
        </div>
    </div>
</div>



<div class="modal fade pw_modal" id="changeBookmodal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('updateUserProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Change Image</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="changebookmodalremove()">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="user_profile" name="user_profile">
                        <div class="fieldrow">
                            <input type="file" placeholder="" name="book_image" requird  class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Change</button>
                </div>


            </form>
        </div>
    </div>
</div>


<div class="modal fade pw_modal" id="changeLinks" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('updateUserProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Change Links</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="changelinksmodalemove()">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="goal" name="goal">
                        <div class="fieldrow">
                            <select name="links" id="links" class="form-control" required>
                                <option value="insta_link">Instagram</option>
                                <option value="fb_link">Facebook</option>
                                <option value="youtube_link">Youtube</option>
                                <option value="whatsapp_number">Whatsapp</option>
                            </select>
                        </div>
                        <div class="fieldrow">
                            <input type="text" placeholder="Instagram Link" name="insta_link"  id="insta_link" class="form-control" />
                            <input type="text" placeholder="Facebook Link" name="fb_link" id="fb_link"  class="form-control" />
                            <input type="text" placeholder="Youtube Link" name="youtube_link"  id="youtube_link" class="form-control" />
                            <input type="number" placeholder="Whatsapp Number" name="whatsapp_number" id="whatsapp_number"  class="form-control" />
                        </div>
                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Change</button>
                </div>


            </form>
        </div>
    </div>
</div>


@endif

@if(!Auth::user())
<div class="modal fade" id="loginwithgooglemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closemodal()"
                    id="googleclosebutton">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body loginbtn" >
                <a href="{{ route('redirectToGoogle') }}"
                    class="btn btn-outline-danger btn-block btn-lg google"><i
                        class="fa-brands fa-google-plus-g"></i> </a>
                <a href="{{ route('loginUsingFacebook') }}"
                            class="btn btn-outline-primary btn-block btn-lg google"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            </div>

            <div class="modal-body">

            </div>



        </div>
    </div>
</div>
@endif

@endsection

@section('js')

{{-- <script>
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
</script> --}}

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



        (function(jQuery) {
            jQuery.fn.clickToggle = function(func1, func2) {
                var funcs = [func1, func2];
                this.data('toggleclicked', 0);
                this.click(function() {
                    var data = jQuery(this).data();
                    var tc = data.toggleclicked;
                    jQuery.proxy(funcs[tc], this)();
                    data.toggleclicked = (tc + 1) % 2;
                });
                return this;
            };
        }(jQuery));


    });
</script>

<script>
    function myFunction(x) {
        x.classList.toggle("change");
    }
</script>

<script>
    jQuery('#open-nav-menu').clickToggle(function() {
            jQuery(this).addClass("opened");
            jQuery('#slideNav').css("display", "block");
            jQuery('.slideOverlay').css("display", "block");
            jQuery(".slideNav-wrapper").addClass("opened");
            jQuery(".mobileHeader").slideDown();

        },
        function() {
            jQuery('#open-nav-menu').removeClass("opened");
            jQuery('#slideNav').css("display", "none");
            jQuery('.slideOverlay').css("display", "none");
            jQuery(".slideNav-wrapper").removeClass("opened");
            jQuery(".mobileHeader").slideUp();
        });
</script>

@endsection
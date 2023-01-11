@extends('layouts.app')

@section('content')

<div class="pw-body">
    @if (Auth::check())
    <div class="header_login">
        <div class="header_inner">
            <a href="" data-toggle="collapse" data-target="#demo"> <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->avatar}}" id="googleavatar"> {{ Auth::user()->name }}  
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
                @elseif(Request::segment(1) == $segment  && $user->my_theme =='4')
                @include('rightviews.theme4')
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
            @elseif(Request::segment(1) == $segment  && $user->my_theme =='4')
            @include('rightviews.theme4')
            @else
            @include('rightviews.fanduCommon')
            @endif


            <!-------- Extra Sections Start------->
                @foreach ( $extraSections as $key=>$value) 
                    <div class="col-12 card mt-5" id="removesection{{$value->id}} ">

                        @if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2">
                                <a href="javaScript:void(0);" title="Edit" class="editsection mt-5" data-id="{{$value->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="javaScript:void(0);" title="Delete" class="deletesection" data-id="{{$value->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        @endif
                        <h1>{{$value->title}}</h1>
                        <h3>{{$value->sub_title}}</h3>
                        <img src="{{asset('section_images')}}/{{$value->image}}" alt="{{$value->image}}" height="600px">
                        <a href="{{$value->link}}" target="_blank">Link</a>
                        <p>{!! $value->description !!}</p>
                        <p>
                        </p>
                    </div>
                @endforeach
            <!-------- Extra Sections End------->


        </div>
    </div>
</div>


@guest()
    <a href="javaScript:void(0);" class="btn btn-outline-danger btn-sm" onclick="goolgelogin()"> Create your own site</a>
@else
    <a href="{{route('createYourOwnSite')}}" class="btn btn-outline-danger btn-sm"> Create your own site</a>
@endguest


@if(Auth::check() && Auth::user()->role=='owner' && $user->id == Auth::user()->id)


<button class="btn " onclick="openPostForm()">Post</button><br>
<button class=" btn btn-outline-warning testimonial_btn mr-2" onclick="opentestimonialForm()">Testimonial</button><br>
<button class="btn btn-outline-dark right_btn" onclick="rightContentForm()">Right Content</button>
<button class=" btn btn-outline-primary " onclick="tagsCategory()">Tags & category</button>
<button class=" btn btn-outline-primary " onclick="addnewsection()">Add New Section</button>

<div class="modal fade pw_modal" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('createPost') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Create Post</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closepostform()">&times;</button>
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
                  
                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Publish</button>
                </div>
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


<div class="modal fade pw_modal" id="addsectionmodal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('submitNewSection')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Section</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closesectionmodal()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="sectionid" value="">
                    <div id="" name="">
                        
                        <div class="fieldrow">
                            <input type="text" placeholder="Title" name="sectiontitle" class="form-control" required
                                id="sectiontitle" />
                        </div>

                        <div class="fieldrow">
                            <input type="text" placeholder="Subtitle" name="sectionsubtitle" class="form-control" id="sectionsubtitle" />
                        </div>
                        <div class="fieldrow">
                            <input type="file" name="sectionimage" id="sectionimage" class="form-control">
                        </div>
                        <textarea id="sectiontextarea" name="description" class="form-control" required></textarea>

                        <div class="fieldrow mt-2">
                            <input type="link" name="sectionlink" id="sectionlink" class="form-control" placeholder="Any Link">
                        </div>

                        <div class="fieldrow">
                            <input type="number" name="secquence" id="secquence" class="form-control" placeholder="Secquence">
                        </div>

                    </div>



                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Save</button>
                </div>


            </form>
        </div>
    </div>
</div>

<div class="modal fade pw_modal" id="changeresume" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('updateUserProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Upload Resume</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="changeresumeremove()">&times;</button>
                </div>
                <div class="modal-body">

                    <div id="goal" name="goal">
                       
                        <div class="fieldrow">
                            <input type="file" placeholder=" Link" name="resume"  id="resume" class="form-control"  accept=".pdf"/>
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


<div class="modal fade pw_modal" id="updateInfo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('updateUserProfile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Update Personal Info</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="updateInforemove()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="personalinfo" id="personalinfo" value="personalinfo" readonly>
                    <div id="goal" name="goal">
                        <div class="fieldrow">
                           <table class="table table-stripped">
                            <tr>
                                <td>Date of birth</td>
                                <td><input type="text" name="dob" id="dob"></td>
                            </tr>
                            <tr>
                                <td>Phone no.</td>
                                <td><input type="text" name="phone_no" id="phone_no"></td>
                            </tr>
                            <tr>
                                <td>WhatsApp no</td>
                                <td><input type="text" name="whatsapp_no" id="whatsapp_no"></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><input type="text" name="gender" id="gender"></td>
                            </tr>
                            <tr>
                                <td>Skype</td>
                                <td><input type="text" name="skype" id="skype"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><input type="text" name="address" id="address"></td>
                            </tr>
                          
                          
                           </table>
                        </div>
                    </div>

                </div>
                <div class="publish_post text-center mb-3 mt-2">
                    <button class="publish_post btn btn-outline-primary ">Update Info</button>
                </div>


            </form>
        </div>
    </div>
</div>


<div class="modal fade pw_modal" id="addresumedetsila" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('submitResumeDetails') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add  Details</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="removeresumedetails()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="type" id="detailstype" value="">
                    <div id="goal" name="goal">
                        <div class="fieldrow">
                            <input type="text" name="detailstitle" id="detailstitle" placeholder="Title" class="form-control">
                        </div>
                        <div class="fieldrow">
                            <input type="text" name="detailssubtitle" id="detailssubtitle" placeholder="Sub Title" class="form-control">
                        </div>
                        <div class="fieldrow">
                           <textarea name="detailsdescription" id="detailsdescription" cols="30" rows="10" class="form-control"></textarea>
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



<div class="modal fade pw_modal" id="submitSkillDetails" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('submitSkillDetails') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add  Details</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        onclick="submitSkillDetailsremove()">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="type" id="skilltype" value="">
                    <div id="goal" name="goal">
                        <div class="fieldrow">
                            <input type="text" name="skilltitle" id="skilltitle" placeholder="Title" class="form-control">
                        </div>
                        <div class="fieldrow">
                            <input type="number" name="skillwidth" id="skillwidth" placeholder="" class="form-control">
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
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('sectiontextarea');
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
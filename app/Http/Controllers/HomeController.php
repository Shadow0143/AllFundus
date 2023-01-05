<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post as PostTable;
use App\Models\Section_item;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use App\Models\Replys;
use App\Models\postImages;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\Contents;
use Modules\VineetAgarwalaFandu\Entities\Intrests;
use App\Models\Tags;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function intrestDetails($id)
    {

        $segment                                                = request()->segment(1);
        $userDetails                                            = User::select('id')->where('segment', $segment)->first();
        $intrests                                               = intrests::orderBy('id', 'desc')->get();
        $myIntrest                                              = intrests::where('id', request()->segment(3))->where('created_by',$userDetails->id)->first();
        

        return view('leftviews.intrestDetails')->with('intrests', $intrests)->with('myIntrest', $myIntrest);
    }

    public function addIntrest(Request $request)
    {
        $intrest                                                = new intrests();
        $intrest->title                                         = $request->intrest_title;
        $intrest->subtitle                                      = $request->intrest_subtitle;
        $intrest->description                                   = $request->intrest_editor;
        $intrest->created_by                                    = Auth::user()->id;
        $intrest->save();
        Alert::success('Success', "Added !");
        return back();
    }

    public function editSection(Request $request)
    {
        // dd($request->all());
        $update                                                 = Section_item::find($request->id);
        $update->section_item_value                             = $request->value;
        $update->save();
        return back();
    }


    public function likes(Request $request)
    {

        $likes                                                  = new Likes();
        $likes->user_id                                         = Auth::user()->id;
        $likes->post_id                                         = $request->postid;
        $likes->likes                                           = '1';
        $likes->save();

        $like_count = Likes::where('post_id', $request->postid)->count('likes');
        return $like_count;
    }

    public function biographyDetails()
    {
        // =========================== Right section start=====================================

        $section                                                = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data                                                   = [];
        foreach ($section as $sec) {
            $Section_item                                       = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item                                  = $Section_item;
            array_push($data, $sec);
        }
        $array                                                  = json_decode(json_encode($data), true);

        // =========================== Right section end=========================================


        return view('rightviews.biography_details')->with('data', $array);
    }

    public function filterByposts($type)
    {

        // =========================== Right section start=====================================
        $segment                                                = request()->segment(1);
        if ($segment != 'type') {
            $type                                               = request()->segment(3);
            $userDetails                                        = User::select('id')->where('segment', $segment)->first();
        } else {
            $type                                               = request()->segment(2);
            $userDetails                                        = User::select('id')->where('segment', null)->first();
        }
        $section                                                = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data                                                   = [];
        foreach ($section as $sec) {
            $Section_item                                       = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item                                  = $Section_item;
            array_push($data, $sec);
        }
        $array                                                  = json_decode(json_encode($data), true);

        $content                                                = Contents::orderBy('id', 'desc')->first();

        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================
        $post = PostTable::where('type', $type)->where('status', '1')->where('created_by', $userDetails->id)->orderBy('created_at', 'DESC')->get();



        foreach ($post as $key => $val) {
            $comments                                           = Comment::where('post_id', $val->id)->count('comments');
            $likes                                              = Likes::where('post_id', $val->id)->count('likes');
            if (Auth::user()) {
                $likeExist                                      = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist                                      = '';
            }

            $all_comments                                       = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment                          = $comments;
            $post[$key]->all_comments                           = $all_comments;
            $post[$key]->likes                                  = $likes;
            $post[$key]->likeExist                              = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply                                          = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply                 = $reply;
            }

            $post[$key]->tags                                   = json_decode($val->tag, true);
            $post[$key]->categ                                  = json_decode($val->category, true);

            $post_image                                         = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image                             = $post_image;
        }
        $tags                                                   = Tags::where('type', 'tag')->orderBy('id', 'desc')->get();
        $category                                               = Tags::where('type', 'category')->orderBy('id', 'desc')->get();
        $intrests                                               = Intrests::orderBy('id', 'desc')->get();

        return view('welcome')->with('data', $array)->with('post', $post)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests);
    }

    public function filterByTag($type)
    {

        // =========================== Right section start=====================================
        $segment                                                = request()->segment(1);
        if ($segment != 'tag') {
            $type                                               = request()->segment(3);
            $userDetails                                        = User::select('id')->where('segment', $segment)->first();
        } else {
            $type                                               = request()->segment(2);
            $userDetails                                        = User::select('id')->where('segment', null)->first();
        }
        $section                                                = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data                                                   = [];
        foreach ($section as $sec) {
            $Section_item                                       = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item                                  = $Section_item;
            array_push($data, $sec);
        }
        $array                                                  = json_decode(json_encode($data), true);

        $content                                                = Contents::orderBy('id', 'desc')->first();

        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================
        $post = PostTable::where('tag',  'LIKE', '%' . $type . '%')->where('status', '1')->where('created_by', $userDetails->id)->orderBy('created_at', 'DESC')->get();



        foreach ($post as $key => $val) {
            $comments                                           = Comment::where('post_id', $val->id)->count('comments');
            $likes                                              = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {
                $likeExist                                      = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist                                      = '';
            }

            $all_comments                                       = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment                          = $comments;
            $post[$key]->all_comments                           = $all_comments;
            $post[$key]->likes                                  = $likes;
            $post[$key]->likeExist                              = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply                                          = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply                 = $reply;
            }

            $post[$key]->tags                                   = json_decode($val->tag, true);
            $post[$key]->categ                                  = json_decode($val->category, true);

            $post_image                                         = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image                             = $post_image;
        }
        $tags                                                   = Tags::where('type', 'tag')->orderBy('id', 'desc')->get();
        $category                                               = Tags::where('type', 'category')->orderBy('id', 'desc')->get();
        $intrests                                               = Intrests::orderBy('id', 'desc')->get();

        return view('welcome')->with('data', $array)->with('post', $post)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests);
    }

    public function filterByCategory($type)
    {
        // =========================== Right section start=====================================
        $segment                                                = request()->segment(1);
        if ($segment != 'category') {
            $type                                               = request()->segment(3);
            $userDetails                                        = User::select('id')->where('segment', $segment)->first();
        } else {
            $type                                               = request()->segment(2);
            $userDetails                                        = User::select('id')->where('segment', null)->first();
        }

        // dd($userDetails);
        $section                                                = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data                                                   = [];
        foreach ($section as $sec) {
            $Section_item                                       = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item                                  = $Section_item;
            array_push($data, $sec);
        }
        $array                                                  = json_decode(json_encode($data), true);

        $content                                                = Contents::orderBy('id', 'desc')->first();

        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================
        $post = PostTable::where('category', 'LIKE', '%' . $type . '%')->where('status', '1')->where('created_by', $userDetails->id)->orderBy('created_at', 'DESC')->get();


        foreach ($post as $key => $val) {
            $comments                                           = Comment::where('post_id', $val->id)->count('comments');
            $likes                                              = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {
                $likeExist                                      = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist                                      = '';
            }

            $all_comments                                       = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment                          = $comments;
            $post[$key]->all_comments                           = $all_comments;
            $post[$key]->likes                                  = $likes;
            $post[$key]->likeExist                              = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply                                          = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply                 = $reply;
            }

            $post[$key]->tags                                   = json_decode($val->tag, true);
            $post[$key]->categ                                  = json_decode($val->category, true);

            $post_image                                         = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image                             = $post_image;
        }
        $tags                                                   = Tags::where('type', 'tag')->orderBy('id', 'desc')->get();
        $category                                               = Tags::where('type', 'category')->orderBy('id', 'desc')->get();
        $intrests                                               = Intrests::orderBy('id', 'desc')->get();


        return view('welcome')->with('data', $array)->with('post', $post)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests);
    }

    public function deletePost(Request $request)
    {

        $postImages                                             = postImages::where('post_id',$request->id)->get();
        foreach($postImages as $key=>$val){
            unlink("uploads/" . $val->image);
        }
        $delete                                                 = PostTable::find($request->id);
        $delete->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\Section_item;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use App\Models\Replys;
use App\Models\postImages;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Tags;
use Modules\VineetAgarwalaFandu\Entities\Intrests;
use App\Models\Contents;

class CommonController extends Controller
{
    public function index(Request $request)
    {

        $segment                                            = request()->segment(1);
        $user                                               = User::select('id')->where('segment', $segment)->first();
        $post                                               = Post::where('status', '1')->where('created_by', $user->id)->orderBy('posts.created_at', 'DESC')->paginate(2);

        foreach ($post as $key => $val) {
            $comments                                       = Comment::where('post_id', $val->id)->count('comments');
            $likes                                          = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {
                $likeExist                                  = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist                                  = '';
            }

            $all_comments                                   = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment                      = $comments;
            $post[$key]->all_comments                       = $all_comments;
            $post[$key]->likes                              = $likes;
            $post[$key]->likeExist                          = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply                                      = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply = $reply;
            }

            $post[$key]->tags                               = json_decode($val->tag, true);
            $post[$key]->categ                              = json_decode($val->category, true);

            $post_image                                     = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image                         = $post_image;
        }

        $content                                            = Contents::orderBy('id', 'desc')->first();
        $testimonials                                       = Testimonial::orderBy('id', 'desc')->get();
        $tags                                               = Tags::select('id', 'type', 'name')->where('type', 'tag')->orderBy('id', 'desc')->get();
        $category                                           = Tags::select('id', 'type', 'name')->where('type', 'category')->orderBy('id', 'desc')->get();
        $intrests                                           = Intrests::orderBy('id', 'desc')->get();


        $section                                            = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data                                               = [];
        foreach ($section as $sec) {
            $Section_item                                   = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item                              = $Section_item;
            array_push($data, $sec);
        }

        $array                                              = json_decode(json_encode($data), true);

        if ($request->ajax()) {
            if(count($post)>0){
                $view                                       = view('leftviews.commonleft',compact('post','content','testimonials','tags','category','intrests','array','user'))->render();
            }else{
                $post                                       = []; 
                $view                                       = view('leftviews.commonleft',compact('post','content','testimonials','tags','category','intrests','array','user'))->render();
            }

            return response()->json(['html'=>$view]);
        }

        return view('welcome')->with('post', $post)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests)->with('data', $array)->with('user', $user);

    }

    public function postDetails($id)
    {

        // =========================== Right section start=====================================

        // dd($user);   
        $content                                            = Contents::orderBy('id', 'desc')->first();
        $testimonials                                       = Testimonial::orderBy('id', 'desc')->get();
        $tags                                               = Tags::where('type', 'tag')->orderBy('id', 'desc')->get();
        $category                                           = Tags::where('type', 'category')->orderBy('id', 'desc')->get();
        $intrests                                           = Intrests::orderBy('id', 'desc')->get();
        $section                                            = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data                                               = [];
        foreach ($section as $sec) {
            $Section_item                                   = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item                              = $Section_item;
            array_push($data, $sec);
        }

        $array                                              = json_decode(json_encode($data), true);

        // =========================== Right section end=========================================

        // =========================== left details section start=====================================

        $segment                                            = request()->segment(1);

        // dd($segment);
        if ($segment == 'post-details') {
            $post_data                                      = Post::where('id', request()->segment(2))->first();
        } else {
            $post_data                                      = Post::where('id', request()->segment(3))->first();
        }

        $post_image                                         = postImages::where('post_id', $post_data->id)->get();
        $post_data->post_image                              = $post_image;


        $comments                                           = Comment::where('post_id', $post_data->id)->count('comments');
        $likes                                              = Likes::where('post_id', $post_data->id)->count('likes');

        if (Auth::user()) {

            $likeExist                                      = Likes::where('post_id', $post_data->id)->where('user_id', Auth::user()->id)->first();
        } else {
            $likeExist                                      = '';
        }

        $all_comments                                       = Comment::where('post_id', $post_data->id)->orderBy('id', 'desc')->get();
        $post_data->total_comment                           = $comments;
        $post_data->all_comments                            = $all_comments;
        $post_data->likes                                   = $likes;
        $post_data->likeExist                               = $likeExist;

        foreach ($all_comments as $key2 => $comm) {
            $reply                                          = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
            $all_comments[$key2]->all_reply = $reply;
        }

        $post_data->tags                                    = json_decode($post_data->tag, true);
        $post_data->categ                                   = json_decode($post_data->category, true);

        // =========================== left details section end=======================================


        return view('leftviews.moreDetails')->with('data', $array)->with('post', $post_data)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests);
    }
}
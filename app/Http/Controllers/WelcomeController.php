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
use App\Models\Contents;
use App\Models\Intrests;


class WelcomeController extends Controller
{
    public function index()
    {
        $post                                               = Post::where('posts.created_by', Auth::user()->id)->where('posts.status', '1')->orderBy('posts.created_at', 'DESC')->get();
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
                $all_comments[$key2]->all_reply             = $reply;
            }

            $post[$key]->tags                               = json_decode($val->tag, true);
            $post[$key]->categ                              = json_decode($val->category, true);

            $post_image                                     = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image                         = $post_image;
        }

        $content                                            = Contents::orderBy('id', 'desc')->first();
        $testimonials                                       = Testimonial::orderBy('id', 'desc')->get();
        return view('welcome')->with('post', $post)->with('content', $content)->with('testimonials', $testimonials);
    }
}

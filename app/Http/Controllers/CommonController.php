<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use App\Models\Replys;
use App\Models\postImages;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Tags;
use App\Models\Intrests;
use App\Models\Contents;
use App\Models\UserDetails;
use App\Models\UserGoals;

class CommonController extends Controller
{
    public function index(Request $request)
    {

        $segment                                            = request()->segment(1);
        $user                                               = User::where('segment',$segment)->first();
        if($user){
            $post                                           = Post::where('status', '1')->where('created_by', $user->id)->orderBy('posts.created_at', 'DESC')->paginate(2);

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

            $intrests                                       = Intrests::where('created_by', $user->id)->orderBy('id', 'desc')->get();
            $usersDetails                                   = UserDetails::where('created_by',$user->id)->first();
            $usergoals                                      = UserGoals::where('created_by',$user->id)->get();
            $extraSections                                  = Section::where('created_by',$user->id)->orderBy('sequence','asc')->get();
            // dd($extraSections);

        }
        else{
            $post                                           = [];
            $intrests                                       = [];
            $usersDetails                                   = [];
            $usergoals                                      = [];
            $extraSections                                  = [];
            
        }

        $content                                            = Contents::orderBy('id', 'desc')->first();
        $testimonials                                       = Testimonial::orderBy('id', 'desc')->get();
        $tags                                               = Tags::select('id', 'type', 'name')->where('type', 'tag')->orderBy('id', 'desc')->get();
        $category                                           = Tags::select('id', 'type', 'name')->where('type', 'category')->orderBy('id', 'desc')->get();
       
        if ($request->ajax()) {
            if(count($post)>0){
                $view                                       = view('leftviews.commonleft',compact('post','content','testimonials','tags','category','intrests','array','user'))->render();
            }else{
                $post                                       = []; 
                $view                                       = view('leftviews.commonleft',compact('post','content','testimonials','tags','category','intrests','array','user'))->render();
            }

            return response()->json(['html'=>$view]);
        }

        return view('welcome')->with('post', $post)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests)->with('user', $user)->with('segment',$segment)->with('usersDetails',$usersDetails)->with('usergoals',$usergoals)->with('extraSections',$extraSections);

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


        return view('leftviews.moreDetails')->with('post', $post_data)->with('content', $content)->with('testimonials', $testimonials)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests);
    }

    public function createYourOwnSite()
    {
        return view('createYourOwnSite');
    }

    public function submitYourOwnSite(Request $request)
    {
        // dd($request->all());
        $username                                           = Auth::user()->name;
        $newSegment                                         = strtolower($username);
        $segment                                            = str_replace(' ','-',$newSegment);
        $themeselected                                      = User::find(Auth::user()->id);
        $themeselected->role                                = 'owner';
        $themeselected->segment                             = $segment;
        $themeselected->my_theme                            = $request->selected_theme;
        $themeselected->save();
        return redirect('/'.$segment);
    }
}
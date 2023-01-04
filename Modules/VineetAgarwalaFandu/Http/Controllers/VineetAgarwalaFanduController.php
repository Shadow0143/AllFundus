<?php

namespace Modules\VineetAgarwalaFandu\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Section;
use App\Models\Post;
use App\Models\Section_item;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use App\Models\Replys;
use App\Models\postImages;
use App\Models\Likes;
use Modules\VineetAgarwalaFandu\Entities\Intrests;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Tags;

class VineetAgarwalaFanduController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function index()
    // {
    //     return view('vineetagarwalafandu::index');
    // }


    public function index(Request $request)
    {
        dd($request->path());


        $post = Post::where('posts.created_by', Auth::user()->id)->where('posts.status', '1')->orderBy('posts.created_at', 'DESC')->get();

        foreach ($post as $key => $val) {
            $comments = Comment::where('post_id', $val->id)->count('comments');
            $likes = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {

                $likeExist = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist = '';
            }

            $all_comments = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment = $comments;
            $post[$key]->all_comments = $all_comments;
            $post[$key]->likes = $likes;
            $post[$key]->likeExist = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply = $reply;
            }

            $post[$key]->tags = json_decode($val->tag, true);
            $post[$key]->categ = json_decode($val->category, true);

            $post_image = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image = $post_image;
        }

        // dd($post);  

        $section = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        // $data = [];
        // foreach ($section as $sec) {
        //     $Section_item = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
        //     $sec->section_item = $Section_item;
        //     array_push($data, $sec);
        // }

        // // dd($Section_item);
        // $array = json_decode(json_encode($data), true);

        // $content = Contents::orderBy('id', 'desc')->first();

        // $testimonials = Testimonial::orderBy('id', 'desc')->get();
        $tags = Tags::where('type', 'tag')->orderBy('id', 'desc')->get();
        $category = Tags::where('type', 'category')->orderBy('id', 'desc')->get();
        $intrests = Intrests::orderBy('id', 'desc')->get();

        return  view('vineetagarwalafandu::index')->with('post', $post)->with('tags', $tags)->with('category', $category)->with('intrests', $intrests);
        // ->with('content', $content)->with('testimonials', $testimonials);
    }


    public function editSection(Request $request)
    {
        // dd($request->all());
        $update = Section_item::find($request->id);
        $update->section_item_value = $request->value;
        $update->save();
        return back();
    }


    public function likes(Request $request)
    {

        $likes = new Likes();
        $likes->user_id = Auth::user()->id;
        $likes->post_id = $request->postid;
        $likes->likes = '1';
        $likes->save();

        $like_count = Likes::where('post_id', $request->postid)->count('likes');
        return $like_count;
    }

    public function postDetails($id)
    {

        // =========================== Right section start=====================================

        $section = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data = [];
        foreach ($section as $sec) {
            $Section_item = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }
        $array = json_decode(json_encode($data), true);

        // $content = Contents::orderBy('id', 'desc')->first();

        // $testimonials = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================

        // =========================== left details section start=====================================
        $post_data = Post::where('id', $id)->first();
        $post_image = postImages::where('post_id', $post_data->id)->get();
        $post_data->post_image = $post_image;


        $comments = Comment::where('post_id', $post_data->id)->count('comments');
        $likes = Likes::where('post_id', $post_data->id)->count('likes');

        if (Auth::user()) {

            $likeExist = Likes::where('post_id', $post_data->id)->where('user_id', Auth::user()->id)->first();
        } else {
            $likeExist = '';
        }

        $all_comments = Comment::where('post_id', $post_data->id)->orderBy('id', 'desc')->get();
        $post_data->total_comment = $comments;
        $post_data->all_comments = $all_comments;
        $post_data->likes = $likes;
        $post_data->likeExist = $likeExist;

        foreach ($all_comments as $key2 => $comm) {
            $reply = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
            $all_comments[$key2]->all_reply = $reply;
        }

        $post_data->tags = json_decode($post_data->tag, true);
        $post_data->categ = json_decode($post_data->category, true);

        // =========================== left details section end=======================================




        return view('leftPageView.moreDetails')->with('data', $array)->with('post_data', $post_data);
        // ->with('content', $content)->with('testimonials', $testimonials);
    }


    public function biographyDetails()
    {
        // =========================== Right section start=====================================

        $section = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data = [];
        foreach ($section as $sec) {
            $Section_item = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }
        $array = json_decode(json_encode($data), true);

        // =========================== Right section end=========================================


        return view('rightviews.biography_details')->with('data', $array);
    }

    public function filterByposts($type)
    {

        // =========================== Right section start=====================================

        $section = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data = [];
        foreach ($section as $sec) {
            $Section_item = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }
        $array = json_decode(json_encode($data), true);

        // $content = Contents::orderBy('id', 'desc')->first();

        // $testimonials = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================



        $post = Post::where('posts.type', $type)->where('posts.status', 'active')->orderBy('posts.created_at', 'DESC')->get();


        foreach ($post as $key => $val) {
            $comments = Comment::where('post_id', $val->id)->count('comments');
            $likes = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {

                $likeExist = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist = '';
            }

            $all_comments = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment = $comments;
            $post[$key]->all_comments = $all_comments;
            $post[$key]->likes = $likes;
            $post[$key]->likeExist = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply = $reply;
            }

            $post[$key]->tags = json_decode($val->tag, true);
            $post[$key]->categ = json_decode($val->category, true);

            $post_image = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image = $post_image;
        }
        return view('home')->with('data', $array)->with('post', $post);
        // ->with('content', $content)->with('testimonials', $testimonials);
    }

    public function filterByTag($type)
    {

        // =========================== Right section start=====================================

        $section = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data = [];
        foreach ($section as $sec) {
            $Section_item = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }
        $array = json_decode(json_encode($data), true);

        // $content = Contents::orderBy('id', 'desc')->first();

        // $testimonials = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================



        $post = Post::where('posts.tag', 'LIKE', '%' . $type . '%')->where('posts.status', 'active')->orderBy('posts.created_at', 'DESC')->get();

        foreach ($post as $key => $val) {
            $comments = Comment::where('post_id', $val->id)->count('comments');
            $likes = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {

                $likeExist = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist = '';
            }

            $all_comments = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment = $comments;
            $post[$key]->all_comments = $all_comments;
            $post[$key]->likes = $likes;
            $post[$key]->likeExist = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply = $reply;
            }

            $post[$key]->tags = json_decode($val->tag, true);
            $post[$key]->categ = json_decode($val->category, true);

            $post_image = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image = $post_image;
        }
        return view('home')->with('data', $array)->with('post', $post);
        // ->with('content', $content)->with('testimonials', $testimonials);
    }



    public function filterByCategory($type)
    {
        // dd($username,$type);
        // =========================== Right section start=====================================

        $section = Section::where('status', 'active')->orderBy('sequence', 'ASC')->get();
        $data = [];
        foreach ($section as $sec) {
            $Section_item = Section_item::select('id', 'section_item_name', 'section_item_value')->where('status', 'active')->where('section_id', $sec->id)->orderBy('sequence', 'ASC')->get();
            $sec->section_item = $Section_item;
            array_push($data, $sec);
        }
        $array = json_decode(json_encode($data), true);
        // $content = Contents::orderBy('id', 'desc')->first();

        // $testimonials = Testimonial::orderBy('id', 'desc')->get();

        // =========================== Right section end=========================================



        $post = Post::where('posts.category', 'LIKE', '%' . $type . '%')->where('posts.status', 'active')->orderBy('posts.created_at', 'DESC')->get();


        foreach ($post as $key => $val) {
            $comments = Comment::where('post_id', $val->id)->count('comments');
            $likes = Likes::where('post_id', $val->id)->count('likes');

            if (Auth::user()) {

                $likeExist = Likes::where('post_id', $val->id)->where('user_id', Auth::user()->id)->first();
            } else {
                $likeExist = '';
            }

            $all_comments = Comment::where('post_id', $val->id)->orderBy('id', 'desc')->get();
            $post[$key]->total_comment = $comments;
            $post[$key]->all_comments = $all_comments;
            $post[$key]->likes = $likes;
            $post[$key]->likeExist = $likeExist;

            foreach ($all_comments as $key2 => $comm) {
                $reply = Replys::where('comment_id', $comm->id)->orderBy('id', 'desc')->get();
                $all_comments[$key2]->all_reply = $reply;
            }

            $post[$key]->tags = json_decode($val->tag, true);
            $post[$key]->categ = json_decode($val->category, true);

            $post_image = postImages::where('post_id', $val->id)->get();
            $post[$key]->post_image = $post_image;
        }
        return view('home')->with('data', $array)->with('post', $post);
        // ->with('content', $content)->with('testimonials', $testimonials);
    }

    public function deletePost(Request $request)
    {

        $delete = Post::find($request->id);
        $delete->delete();
    }
































    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('vineetagarwalafandu::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('vineetagarwalafandu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('vineetagarwalafandu::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
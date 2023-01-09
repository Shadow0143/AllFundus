<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\postImages;
use App\Models\Section;
use App\Models\Intrests;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use App\Models\Testimonial;
use App\Models\Contents;
use App\Models\Tags;


class MainController extends Controller
{


    public function intrestDetails($id)
    {
        $intrests                                               = intrests::orderBy('id', 'desc')->get();
        $myIntrest                                              = intrests::where('id', $id)->first();
        return view('leftPageView.intrestDetails')->with('intrests', $intrests)->with('myIntrest', $myIntrest);
    }

    public function addIntrest(Request $request)
    {
        $intrest                                                = new intrests();
        $intrest->title                                         = $request->intrest_title;
        $intrest->subtitle                                      = $request->intrest_subtitle;
        $intrest->description                                   = $request->intrest_editor;
        $intrest->save();
        return back();
    }


    public function ourSites()
    {

        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();

        return view('leftPageView.oursites', compact('content', 'testimonials'));
    }

    public function submitTag(Request $request)
    {
        $tags                                                   = new Tags();
        $tags->type                                             = $request->type;
        $tags->name                                             = $request->name;
        $tags->save();
        Alert::success('Success', 'Added');
        return back();
    }

    public function welcome()
    {
        $posts                                                  = Post::where('status', '1')->orderBy('id', 'desc')->get();
        foreach ($posts as $key => $val) {
            $post_image                                         = postImages::select('image')->where('post_id', $val->id)->get();
            $posts[$key]->image                                 = $post_image;

            $posts[$key]->tags                                  = explode(",", $val->tag);
            $posts[$key]->categories                            = explode(",", $val->category);
        }
        $content                                                = Contents::orderBy('id', 'desc')->first();

        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();
        return view('welcome', compact('posts', 'testimonials', 'content'));
    }

    public function createPost(Request $request)
    {

        // dd($request->all());
        $post                                                   = new Post;
        $post->type                                             = $request->postType;
        if ($request->postType == 'post') {
            $post->title                                        = $request->post_title;
        } else {
            $post->title                                        = $request->blog_title;
        }
        $post->sub_title                                        = $request->blog_subtitle;

        if ($request->postType == 'blog') {
            $post->post_content                                 = $request->blog_post;
        } else if ($request->postType == 'post') {
            $post->post_content                                 = $request->post_post;
        } else {
            $post->post_content                                 = $request->post;
        }
        if ($request->tags) {

            $tag                                                = implode(",", $request->tags);
            $post->tag                                          = $tag;
        }
        if ($request->categories) {

            $categ                                              = implode(",", $request->categories);
            $post->category = $categ;
        }
        $post->status                                           = '1';
        $post->created_by                                       = Auth::user()->name;
        $post->save();

        $postImagearry                                          = $request->post_image;
        if (!empty($postImagearry)) {
            for ($k = 0; $k < count($postImagearry); $k++) {
                $input['imagename']                             = 'PostImage-' . Auth::user()->id . '-' . rand(000, 5000) . '.' . $postImagearry[$k]->getClientOriginalExtension();
                $destinationPath_selected                       = public_path('/post_images');
                $img2                                           = Image::make($postImagearry[$k]->getRealPath());
                $img2->resize(1024, 768, function ($constraint2) {
                    $constraint2->aspectRatio();
                });
                $img2->save($destinationPath_selected . '/' . $input['imagename']);

                $postimage                                      = new postImages();
                $postimage->user_id                             = Auth::user()->id;
                $postimage->post_id                             = $post->id;
                $postimage->image                               = $input['imagename'];
                $postimage->save();
            }
        }

        Alert::success('Success', 'Post added');
        return back();
    }

    public function postDetail($slug, $id)
    {
        $post                                                   = Post::where('id', $id)->first();
        $postImages                                             = postImages::where('post_id', $id)->get();
        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();

        $post->tags                                             = explode(",", $post->tag);
        $post->categories                                       = explode(",", $post->category);

        return view('postDetail', compact('post', 'postImages', 'testimonials', 'content'));
    }

    public function submitTestimonial(Request $request)
    {
        $testimonial                                            = new Testimonial();
        $testimonial->created_by                                = Auth::user()->id;
        $testimonial->auther_name                               = $request->auther_name;
        $input['imagename']                                     = 'AutherImage-' . Auth::user()->id . '-' . rand(000, 5000) . '.' . $request->auther_image->getClientOriginalExtension();
        $destinationPath_selected = public_path('/auther_images');
        $img2                                                   = Image::make($request->auther_image->getRealPath());
        $img2->resize(1024, 768, function ($constraint2) {
            $constraint2->aspectRatio();
        });
        $img2->save($destinationPath_selected . '/' . $input['imagename']);
        $testimonial->auther_image                              =  $input['imagename'];
        $testimonial->auther_designation                        = $request->auther_designation;
        $testimonial->quotes                                    = $request->user_quests;
        $testimonial->save();
        Alert::success('Success', 'Added');
        return back();
    }


    public function testimonialDetail($slug, $id)
    {
        $testimonial                                            = Testimonial::where('id', $id)->first();
        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();
        return view('testimonialDetails', compact('testimonial', 'testimonials', 'content'));
    }

    public function submitContents(Request $request)
    {
        // dd($request->all());
        $content                                                = new Contents();
        $content->type                                          =  $request->type;
        $content->title                                         =  $request->title;
        $content->subtitle                                      =  $request->subtitle;
        $content->description                                   =  $request->description;
        $content->save();
        Alert::success('Success');
        return back();
    }

    public function viewFeatures($slug)
    {
        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();
        $allFeatures                                            = Contents::where('type', $slug)->get();
        return view('features', compact('testimonials', 'allFeatures', 'content'));
    }

    public function readAboutUs()
    {
        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();
        return view('aboutme', compact('testimonials', 'content'));
    }

    public function whyMe()
    {
        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();
        return view('whyme', compact('testimonials', 'content'));
    }

    public function blogs()
    {
        $posts                                                  = Post::where('status', '1')->orderBy('id', 'desc')->where('type', 'blog')->get();
        foreach ($posts as $key => $val) {
            $post_image                                         = PostImages::select('image')->where('post_id', $val->id)->get();
            $posts[$key]->image                                 = $post_image;
            $posts[$key]->tags                                  = explode(",", $val->tag);
            $posts[$key]->categories                            = explode(",", $val->category);
        }

        $content                                                = Contents::orderBy('id', 'desc')->first();
        $testimonials                                           = Testimonial::orderBy('id', 'desc')->get();
        return view('blogs', compact('posts', 'testimonials', 'content'));
    }

    public function submitNewSection(Request $request){
            // dd($request->all());
            if(!empty($request->id)){
                $username                                           = Auth::user()->name;
                $newSegment                                         = strtolower($username);
                $segment                                            = str_replace(' ','-',$newSegment);
                $section                                            = Section::find($request->id);
                $section->title                                     = $request->sectiontitle;                                           
                $section->sub_title                                 = $request->sectionsubtitle;                                           
                $section->description                               = $request->description;                                           
                
                if (!empty($request->file('sectionimage'))) {
                    $profile                                        = $request->file('sectionimage');
                    $userphoto                                      = $segment .'-sectionimg-' . rand(000, 999) .'-'.time(). '.' .$profile->getClientOriginalExtension();
                    $result                                         = public_path('section_images');
                    $profile->move($result, $userphoto);
                    $section->image                                 = $userphoto;
                }
    
                $section->sequence                                  = $request->secquence;                                           
                $section->link                                      = $request->sectionlink;    
                $section->save();    
    
                Alert::success('Success','Updated');
            }else{
                $username                                           = Auth::user()->name;
                $newSegment                                         = strtolower($username);
                $segment                                            = str_replace(' ','-',$newSegment);
                $section                                            = new Section();
                $section->title                                     = $request->sectiontitle;                                           
                $section->sub_title                                 = $request->sectionsubtitle;                                           
                $section->description                               = $request->description;                                           
                
                if (!empty($request->file('sectionimage'))) {
                    $profile                                        = $request->file('sectionimage');
                    $userphoto                                      = $segment .'-sectionimg-' . rand(000, 999) .'-'.time(). '.' .$profile->getClientOriginalExtension();
                    $result                                         = public_path('section_images');
                    $profile->move($result, $userphoto);
                    $section->image                                 = $userphoto;
                }
    
                $section->sequence                                  = $request->secquence;                                           
                $section->created_by                                = Auth::user()->id;                                           
                $section->link                                      = $request->sectionlink;    
                $section->save();    
    
                Alert::success('Success','Added');
            }
           
            return back();
    }    
    
    public function deleteNewSection(Request $request){
        $delete                                                 = Section::find($request->id);
                                                                unlink('section_images/'.$delete->image);
        $delete->delete();
        return back();
    }

    public function editNewSection(Request $request){
        $edit                                                   = Section::find($request->id);
        return $edit;
    }
}
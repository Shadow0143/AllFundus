<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Models\postImages;
use App\Models\UserDetails;
use App\Models\UserGoals;
class PostController extends Controller
{
    public function createPost(Request $request)
    {


        $url                                    = url()->current();
        $post                                   = new Post;
        $post->type                             = $request->postType;
        if ($request->postType == 'post') {
            $post->title                        = $request->post_title;
            $slug                               = str_replace(' ', '-', $request->post_title);
        } else {
            $post->title                        = $request->blog_title;
            $slug                               = str_replace(' ', '-', $request->blog_title);
        }
        $post->sub_title                        = $request->blog_subtitle;

        if ($request->postType == 'blog') {
            $post->post_content                 = $request->blog_post;
        } else if ($request->postType == 'post') {
            $post->post_content                 = $request->post_post;
        } else {
            $post->post_content                 = $request->post;
        }
        $tag                                    = json_encode($request->tags, true);
        $categ                                  = json_encode($request->categories, true);
        $post->tag                              = $tag;
        $post->url                              = $url;
        $post->category                         = $categ;
        $post->slug                             = $slug;
        $post->status                           = '1';
        $post->created_by                       = Auth::user()->id;
        $post->creator                          = Auth::user()->name;

        $post->save();

        $postImagearry                          = $request->post_image;
        if (!empty($postImagearry)) {
            for ($k = 0; $k < count($postImagearry); $k++) {
                $input['imagename']             = 'PostImage-' . Auth::user()->id . '-' . rand(000, 5000) . '.' . $postImagearry[$k]->getClientOriginalExtension();
                $destinationPath_selected       = public_path('/uploads');
                $img2 = Image::make($postImagearry[$k]->getRealPath());
                $img2->save($destinationPath_selected . '/' . $input['imagename']);

                $postimage                      = new postImages();
                $postimage->user_id             = Auth::user()->id;
                $postimage->post_id             = $post->id;
                $postimage->image               = $input['imagename'];
                $postimage->save();
            }
        }

        Alert::success('Success', 'Post added');
        return back();
    }

    public function submitGoals(Request $request)
    {

        $insertgoals                                                = new UserGoals();
        if (!empty($request->file('goal'))) {
            $goal                                                   = $request->file('goal');
            $goalphoto                                              = Auth::user()->name .'-goal-' . rand(000, 999) .'-'.time(). '.' .$goal->getClientOriginalExtension();
            $result                                                 = public_path('userGoals');
            $goal->move($result, $goalphoto);
            $insertgoals->image                                     = $goalphoto;
        }
        $insertgoals->user_id                                       = Auth::user()->id;
        $insertgoals->link                                          = $request->goal_link;
        $insertgoals->created_by                                    = Auth::user()->id;
        $insertgoals->save();

        Alert::success('Success', 'Added');
        return back();



    }

    public function updateUserProfile(Request $request){

        $userExist                                                  = UserDetails::where('user_id',Auth::user()->id)->first();
        $username                                                   = Auth::user()->name;
        $newSegment                                                 = strtolower($username);
        $segment                                                    = str_replace(' ','-',$newSegment);
        if($userExist){
            $updateEntry                                            = UserDetails::find($userExist->id);
            if(!empty($request->small_title)){
                $updateEntry->small_title                           = $request->small_title;
            }
            if(!empty($request->small_description)){
                $updateEntry->small_description                     = $request->small_description;
            }

            if (!empty($request->file('user_profile'))) {
                $profile                                            = $request->file('user_profile');
                $userphoto                                          = $segment .'-profilepic-' . rand(000, 999) .'-'.time(). '.' .$profile->getClientOriginalExtension();
                $result                                             = public_path('user_profiles');
                $profile->move($result, $userphoto);
                $updateEntry->user_profile                          = $userphoto;
            }
            if(!empty($request->fb_link)){
                $updateEntry->fb_link                               = $request->fb_link;
            }
            if(!empty($request->insta_link)){
                $updateEntry->insta_link                            = $request->insta_link;
            }
            if(!empty($request->youtube_link)){
                $updateEntry->youtube_link                          = $request->youtube_link;
            }
            if(!empty($request->whatsapp_number)){
                $updateEntry->whatsapp_number                       = $request->whatsapp_number;
            }

            if(!empty($request->biography_description)){
                $updateEntry->biography_description                 = $request->biography_description;
            }
            
            if(!empty($request->book_title)){
                $updateEntry->book_title                            = $request->book_title;
            }
            if(!empty($request->book_name)){
                $updateEntry->book_name                             = $request->book_name;
            }
            if(!empty($request->book_small_desc)){
                $updateEntry->book_small_desc                       = $request->book_small_desc;
            }
            if (!empty($request->file('book_image'))) {
                $profile                                            = $request->file('book_image');
                $userbookphoto                                      = $segment  .'-book-' . rand(000, 999) .'-'.time(). '.' .$profile->getClientOriginalExtension();
                $result                                             = public_path('user_books');
                $profile->move($result, $userbookphoto);
                $updateEntry->book_image                            = $userbookphoto;
            }
            if(!empty($request->book_summary)){
                $updateEntry->book_summary                          = $request->book_summary;
            }
            
            $updateEntry->save();

        }else{
            $newEntry                                               = new UserDetails();
            $newEntry->user_id                                      = Auth::user()->id;
            $newEntry->small_title                                  = $request->small_title;
            $newEntry->small_description                            = $request->small_description;

            if (!empty($request->file('user_profile'))) {
                $profile                                            = $request->file('user_profile');
                $userphoto                                          = $segment .'-profilepic-' . rand(000, 999) .'-'.time(). '.' .$profile->getClientOriginalExtension();
                $result                                             = public_path('user_profiles');
                $profile->move($result, $userphoto);
                $newEntry->user_profile                             = $userphoto;
            }

            $newEntry->fb_link                                      = $request->fb_link;
            $newEntry->insta_link                                   = $request->insta_link;
            $newEntry->youtube_link                                 = $request->youtube_link;
            $newEntry->whatsapp_number                              = $request->whatsapp_number;
            $newEntry->biography_description                        = $request->biography_description;
            $newEntry->book_title                                   = $request->book_title;
            $newEntry->book_name                                    = $request->book_name;
            $newEntry->book_small_desc                              = $request->book_small_desc;

            if (!empty($request->file('book_image'))) {
                $profile                                            = $request->file('book_image');
                $userbookphoto                                      = $segment  .'-book-' . rand(000, 999) .'-'.time(). '.' .$profile->getClientOriginalExtension();
                $result                                             = public_path('user_books');
                $profile->move($result, $userbookphoto);
                $newEntry->book_image                               = $userbookphoto;
            }
            $newEntry->book_summary                                 = $request->book_summary;
            $newEntry->created_by                                   = Auth::user()->id;
            $newEntry->save();
        }

        return back();
    } 

    public function deleteGoal(Request $request){
        $logo                                                       = UserGoals::find($request->id);
        unlink('userGoals/'.$logo->image);
        $logo->delete();
    }
}
<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Replys;

class CommentController extends Controller
{
    public function deletesComment(Request $request)
    {
        // dd($request->all());
        $delete_comment                     = Comment::find($request->comment_id);
        $delete_comment                     ->delete();
    }


    public function sendComment(Request $request)
    {
        // dd($request->all());
        $comment                            =  new Comment();


        if (Auth::user()) {
            $comment->user_id               = Auth::user()->id;
            $comment->user_name             = Auth::user()->name;
        } else {

            $comment->user_name             = 'Guest';
        }

        $sequence                           = $comment->id;
        $comment->post_id                   = $request->post_id;
        $comment->comments                  = $request->comment_message;
        $comment->sequence                  = $sequence;
        $comment->save();

        $new_comment                        = Comment::where('post_id', $request->post_id)->orderBy('id', 'desc')->first();

        $data                               = '';

        $data .= '<div class="com_inner" id="comment_row' . $request->post_id . '' . $new_comment->id . '"><div class="com_user"><h4>' . $new_comment->user_name . '</h4><p>' . $new_comment->comments . '</p></div>';
        if (Auth::user()) {
            // if (Auth::user()->role == 'owner') {
            $data .= '<a href="javaScript:void(0);" data-id="' . $new_comment->id . '"class="post_com_delete"  onclick="deleteComment(' . '`' . $new_comment->id . ',' . $request->post_id . '`' . ')"><i class="ti-close"></i></a>';
            // }
        }
        $data .= '<ul class="com_action"> <li>' . $new_comment->created_at->diffForHumans() . ' </li>';
        if (Auth::user()) {
            if (Auth::user()->role == 'owner') {
                $data .= '<li> <a data-toggle="collapse" data-target="#reply_view' . $new_comment->id . '"    href="javaScript:void(0);" title="Reply">Reply</a> </li> ';
            }
        }
        $data .= '</ul></div>';

        // dd($data);

        return \Response::json(['success' => true, 'data' => $data]);
    }

    public function sendReply(Request $request)
    {
        // dd($request->all());
        $reply                                  = new Replys();
        $reply->user_id                         = Auth::user()->id;
        $reply->comment_id                      = $request->comment_id;
        $reply->replys                          = $request->reply_message;
        $reply->user_name                       = Auth::user()->name;
        $reply->save();

        $new_reply                              = Replys::where('comment_id', $request->comment_id)->orderBy('id', 'desc')->first();
        $data                                   = ' <div class="col-12 mb-2">Reply by : <span><strong>' . $new_reply->user_name . '</strong></span><div class="row"><div class="col-8" style="word-wrap: break-word">' . $new_reply->replys . '</div><div class="col-4">' . $new_reply->created_at->diffForHumans() . '</div></div></div>';

        return \Response::json(['success' => true, 'data' => $data]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Reply;
use Auth;
use Session;

class RepliesController extends Controller
{
    public function like($id)
    {
        Like::create([
            'reply_id' => $id,
            'user_id' => Auth::id()
        ]);

        Session::flash('success', 'You Like a post');
        return redirect()->back();
    }
    public function unlike($id)
    {
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();
        Session::flash('success', 'You unliked the reply');

        return redirect()->back();
    }
    public function markBest($id)
    {
        $r = Reply::find($id);
        $r->best_reply = true;
        $r->save();
        $r->user->points += 100;
        $r->user->save();

        Session::flash('success', 'Best reply is marked');
        return redirect()->back();
    }
}

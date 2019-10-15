<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Discussion;
use App\User;
use App\Reply;
use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    public function create()
    {
        return view('discuss');
    }
    public function store()
    {
        $r  = request();
        $this->validate($r, [
            'title' => 'required',
            'channel_id' => 'required',
            'content' => 'required'
        ]);
        $discussion =  Discussion::create(
            [
                'title' => $r->title,
                'channel_id' => $r->channel_id,
                'content' => $r->content,
                'user_id' => Auth::id(),
                'slug'  => str_slug($r->title)
            ]
        );

        Session::flash('success', 'Discussion created.');
        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }
    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        $best_reply = $discussion->replies()->where('best_reply', true)->first();
        return view('discussion.show')->with('discussion', $discussion)->with('best_reply', $best_reply);
    }

    public function reply($id)
    {

        $discussion = Discussion::find($id);

        $r =  Reply::create([
            'user_id' => Auth::id(),
            'content' => request()->reply,
            'discussion_id' => $id
        ]);
        $r->user->points += 25;

        $r->user->save();

        $watchers = array();
        foreach ($discussion->watchers as $watcher) {
            array_push($watchers, User::find($watcher->id));
        }

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));
        Session::flash('success', 'Replied to discussion');

        return redirect()->back();
    }
}

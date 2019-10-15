<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ForumController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

        switch (request('filter')) {
            case 'me':
                $d = Discussion::where('user_id', Auth::id())->paginate(3);
                break;
            case 'solved':
                $answers = array();
                foreach (Discussion::all() as $dis) {
                    if ($dis->hasBestReply()) {
                        array_push($answers, $dis);
                    }
                }
                $d = new Paginator($answers, 3);
                break;
            case 'unsolved':
                $answers = array();
                foreach (Discussion::all() as $dis) {
                    if (!$dis->hasBestReply()) {
                        array_push($answers, $dis);
                    }
                }
                $d = new Paginator($answers, 3);
                break;
            default:
                $d =  Discussion::orderBy('created_at', 'desc')->paginate(3);
        }
        return view('forum', ['discussions' => $d]);
    }
    public function channel($slug)
    {
        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}

@extends('layouts.app')

@section('content')

<div class="card shadow p-3 mb-5  rounded">

    <div class="card-header bg-primary text-white"><img src="{{$discussion->user->avatar}}" alt="" width="40px" height="40px" class="rounded-circle">
        <span class="font-weight-bold">
            {{$discussion->user->name}}
            <span> ({{$discussion->user->points}})</span>
        </span>
        @if($discussion->hasBestReply())
        <span class="btn btn-danger float-right btn-sm ml-2">Closed</span>
        @else
        <span class="btn btn-success float-right btn-sm  ml-2">Open</span>
        @endif
        @if($discussion->is_being_watched_auth_user())
        <a href="{{route('discussion.unwatch' , ['id' => $discussion->id])}}" class="btn btn-warning float-right btn-sm mr-2">unwatch</a>
        @else
        <a href="{{route('discussion.watch' , ['id' => $discussion->id])}}" class="btn btn-success float-right btn-sm mr-2">watch</a>

        @endif

    </div>

    <div class="card-body">
        <h4 class="text-center text-primary">{{$discussion->title}}</h4>
        <p>
            {{$discussion->content}}
        </p>
        @if($best_reply)

        <div class="text-center">
            <h3>Best Answer</h3>
            <div class="card">
                <div class="card-header bg-success">

                    <img src="{{$best_reply->user->avatar}}" alt="" class="rounded-circle" height="45px" width="45px">
                    <span class="font-weight-bold ml-1"> {{$best_reply->user->name}} <span> ({{$best_reply->user->points}})</span></span>

                </div>
                <div class="card-body">

                    <p>
                        {{$best_reply->content}}
                    </p>

                </div>
            </div>
        </div>

        @endif
    </div>
    <div class="card-footer bg-primary text-white">
        <span>
            {{$discussion->replies->count()}} Replies
        </span>

        <span class="ml-2 text-info"> discussion started {{$discussion->created_at->diffForHumans()}} </span>

        <span class="float-right">
            <span>Topic: </span>
            <a href="{{route('channel' , ['slug' => $discussion->channel->slug])}}"> {{$discussion->channel->title}}</a>
        </span>
    </div>
</div>
<h2 class="mb-4"> Replies</h2>
@foreach($discussion->replies as $r)


<div class="card mb-4">

    <div class="card-header"><img src="{{$r->user->avatar}}" alt="" width="40px" height="40px" class="rounded-circle">
        <span class="font-weight-bold"> {{$r->user->name}}
            <span> ({{$r->user->points}})</span>
            <span class="font-weight-normal font-italic"> replied {{$r->created_at->diffForHumans()}} </span>
        </span>
        @if(!$best_reply)
        @if(Auth::id() == $discussion->user->id)
        <a href="{{route('reply.mark' , ['id' => $r->id])}}" class="btn btn-sm btn-success float-right">Mark as Best Answer</a>
        @endif
        @endif
    </div>

    <div class="card-body">

        <p>
            {{$r->content}}
        </p>

    </div>
    <div class="card-footer">
        @if($r->is_liked_by_auth_user())
        <a href="{{route('reply.unlike' , ['id' => $r->id])}}" class="btn btn-danger btn-sm">
            UnLike
            <span class="badge badge-light">{{$r->likes->count()}} </span>
        </a>
        @else
        <a href="{{route('reply.like' , ['id' => $r->id])}}" class="btn btn-info btn-sm">
            Like
            <span class="badge badge-light">{{$r->likes->count()}} </span>
        </a>
        @endif
    </div>
</div>
@endforeach
<div class="card">
    @if(Auth::check())
    <div class="card-body">
        <form action="{{route('discussion.reply' , ['id' => $discussion->id])}}" method="post">
            @csrf
            <label for="reply">Leave a reply....</label>
            <div class="input-group mb-3">
                <textarea class="form-control" name="reply" id="reply"></textarea>
            </div>

            <button class="btn btn-secondary float-right" type="submit">Leave Reply</button>

        </form>
    </div>
    @else
    <div class="text-center">
        <a href="/login">Please login to reply to this post</a>
    </div>
    @endif
</div>
@endsection
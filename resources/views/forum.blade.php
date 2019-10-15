@extends('layouts.app')

@section('content')

@foreach($discussions as $discussion)

<div class="card shadow p-3 mb-5 rounded">
    <div class="card-header bg-primary text-white">
        <img src="{{$discussion->user->avatar}}" alt="" width="40px" height="40px" class="rounded-circle">
        <span class="font-weight-bold ml-2">
            {{$discussion->user->name}}
            <span> ({{$discussion->user->points}})</span>
        </span>
        @if($discussion->hasBestReply())
        <span class="btn btn-danger float-right btn-sm ml-2">Closed</span>
        @else
        <span class="btn btn-success float-right btn-sm  ml-2">Open</span>
        @endif
        <a href="{{route('discussion' , ['slug' => $discussion->slug])}}" class="btn btn-info float-right btn-sm ">view</a>
    </div>

    <div class="card-body">
        <h4 class="text-center text-primary">{{$discussion->title}}</h4>
        <p class="text-center">
            {{str_limit($discussion->content , 200)}}
        </p>
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
@endforeach
<div class="row justify-content-center">
    {{$discussions->links()}}
</div>
@endsection
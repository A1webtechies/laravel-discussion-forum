@extends('layouts.app')

@section('content')
@if(Session::has('success'))
<p class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</p>
@endif
@foreach($discussions as $discussion)

<div class="card mb-4">
    <div class="card-header">
        <img src="{{$discussion->user->avatar}}" alt="" width="40px" height="40px" class="rounded-circle">
        <span class="font-weight-bold"> {{$discussion->user->name}}
            <span class="font-weight-normal font-italic"> {{$discussion->created_at->diffForHumans()}} </span>
        </span>

        <a href="{{route('discussion' , ['slug' => $discussion->slug])}}" class="btn btn-info float-right">view</a>
    </div>

    <div class="card-body">
        <h4 class="text-center text-primary">{{$discussion->title}}</h4>
        <p class="text-center">
            {{str_limit($discussion->content , 200)}}
        </p>
    </div>
    <div class="card-footer">
    <span>
            {{$discussion->replies->count()}} Replies
        </span>
        <span class="float-right">
        <span>Topic:  </span>
        <a href="{{route('channel' , ['slug' => $discussion->channel->slug])}}"> {{$discussion->channel->title}}</a>
        </span>
    </div>
</div>
@endforeach
<div class="row justify-content-center">
    {{$discussions->links()}}
</div>
@endsection
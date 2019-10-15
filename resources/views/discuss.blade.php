@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header text-center">Create a New Discussion </div>

    <div class="card-body">
        <form action="{{ route('discussion.store')}}" method="post">
            @csrf
            <label for="title">Title</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Channel</label>
                <select class="form-control" id="exampleFormControlSelect1" name="channel_id">
                    @foreach($channels as $channel)
                    <option value="{{$channel->id}}">{{$channel->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Ask a Question</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content">{{old('content')}}</textarea>
            </div>
            <button class="btn btn-success float-right">
                Submit
            </button>
        </form>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Edit Channel: {{$channel->title}}</div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body">
        <form action="{{route('channels.update' , ['channel' => $channel->id])}}" method="post">
            @method('PUT')
            @csrf
            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="Channel Title" name="channel" value="{{$channel->title}}">
            </div>

            <div class="text-center">
                <button class="btn btn-success" type="submit">
                    Save Channel
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
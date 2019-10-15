@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create Channel</div>

    <div class="card-body">
        <form action="{{route('channels.store')}}" method="post">
            @csrf
            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="Channel Title" name="channel">
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
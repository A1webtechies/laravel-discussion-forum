@extends('layouts.app')

@section('content')


@endif
<div class="card">
    <div class="card-header">Channels</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>
                    Name
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Delete
                </th>
            </thead>
            <tbody>
                @foreach($channels as $channel)
                <tr>
                    <td>
                        {{$channel->title}}
                    </td>
                    <td>
                        <a href="{{route('channels.edit' , ['channel' => $channel->id])}}" class="btn btn-info btn-sm">
                            Edit
                        </a>
                    </td>
                    <td>
                        <form action="{{route('channels.destroy' , ['channel' => $channel->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
    <link rel="stylesheet" href="https://bootswatch.com/_assets/css/custom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="https://kit.fontawesome.com/855d2e5257.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Discussion Forum
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if($errors->count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-4">


                        @foreach($errors->all() as $err)

                        <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $err }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </p>

                        @endforeach


                    </div>
                </div>
            </div>
            @endif
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card mb-3 text-white bg-primary shadow-sm">
                            <div class="card-body">

                                <li class="list-group-item">
                                    <a href="/forum"> Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/forum?filter=me"> My Discussions</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/forum?filter=unsolved">Unanswered Discussions</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="/forum?filter=solved">Answered Discussion</a>
                                </li>
                            </div>
                        </div>
                        <a href="/discussion/create/new" class="btn btn-primary btn-lg mb-2 btn-block">Create Discussion</a>
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">
                                Channels
                            </div>
                            <div class="card-body">

                                <ul class="list-group shadow-sm">
                                    @foreach($channels as $channel)
                                    <li class="list-group-item">
                                        <a href="{{route('channel' , ['slug' => $channel->slug])}}"> {{$channel->title}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @if(!Auth::user() )

                                @elseif(Auth::user()->admin)
                                <div class="text-center">
                                    <a href="/channels/create" class="btn btn-success mt-3">Create Channel</a>
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script>
        @if(Session::has('success'))
        toastr.success('{{Session::get('
            success ')}}')
        @endif
    </script>


</body>

</html>
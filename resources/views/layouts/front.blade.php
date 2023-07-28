<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">--}}
{{--    @vite(['css/app.css'])--}}
{{--    Vite::asset('resources/images/logo.png')--}}
{{--        <link rel="stylesheet" href="{{Vite::asset('css/app.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
    @vite(['resources/js/app.js'])
    <style>
        .front.row {
            margin-bottom: 40px;
        }
        .active {
            font-weight: bolder;
        }
    </style>
    @yield('stylesheets')
</head>
<body>


{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 40px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Marketplace L10</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>

                @foreach($categories as $category)
                    <li class="nav-item  @if(request()->is('category/' . $category->slug)) active @endif">
                        <a class="nav-link" href="{{route('category.single', ['slug' => $category->slug])}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>

            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item  @if(request()->is('my-orders')) active @endif">
                                <a href="{{route('user.orders')}}" class="nav-link">Meus Pedidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="event.preventDefault();
                                                                          document.querySelector('form.logout').submit(); ">Sair</a>

                                <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                                    @csrf
                                </form>
                            </li>
                    @endauth
                        <li class="nav-item">
                            <a href="{{route('cart.index')}}" class="nav-link">
                                @if(session()->has('cart'))
        {{--                            <span class="badge badge-danger">{{count(session()->get('cart'))}}</span>--}}
                                    <span class="badge rounded-pill bg-danger">{{array_sum(array_column(session()->get('cart'), 'amount'))}}</span>
                                @endif
                                <i class="fa fa-shopping-cart fa-2xs" aria-hidden="true"></i>
                                Carrinho
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>
@yield('scripts')
</body>
</html>


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('description')">
	<meta name="keywords" content="@yield('keywords')">
	<meta name="title" content="@yield('title')" />
	<meta name="robots" content="index,follow" />
	<meta name="revisit-after" content="2 days">
	<meta name="coverage" content="Worldwide">
	<meta name="distribution" content="Global">
	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
	<style>

	</style>
@php
	$textCart = 'пусто';
	$cartCollection = Cart::getContent();

	if ($cartCollection->count() > 0){
		$textCart = $cartCollection->count() . ' товара, ' . \Cart::getSubTotal() . ' р.';
	}
	
@endphp
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container"> <a class="navbar-brand" href="{{ url('/') }}">
                    Главная 
                </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> <span class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active"> <a class="nav-link" href="{{ url('/catalog') }}">Каталог <span class="sr-only">(current) </span></a> </li>
						<li class="nav-item active"> <a class="nav-link" href="{{ url('/') }}"> 22222 <span class="sr-only">(current) </span></a> </li>
						<li class="nav-item active"> <a class="nav-link" href="{{ url('/') }}"> 33333 <span class="sr-only">(current) </span></a> </li>
						<li class="nav-item active"> <a class="nav-link" href="{{ url('/cart') }}"> Корзина ({{ $textCart }}) <span class="sr-only">(current)</span></a> </li>
					</ul>
					<!-- Right Side Of Navbar -->
					<!--ul class="navbar-nav ml-auto">

                        @if (backpack_auth()->guest())
                            <li class="nav-item"> <a class="nav-link" href="{{ backpack_url('login') }}">{{ __('Login') }}</a> </li> 
                        @endif

                        @if (backpack_auth()->check())
                            <li class="nav-item dropdown"> 
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ backpack_user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
                                    <a class="dropdown-item" 
                                        href="{{ url('logout') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    >
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ backpack_url('logout') }}" method="POST" class="d-none"> @csrf </form>
                                </div>
                            </li>
                        @endif

                    </ul-->
				</div>
			</div>
		</nav>

	</div>

	@yield('content')

</body>

</html>
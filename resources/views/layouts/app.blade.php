
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

	<link href="{{ asset('js/bootstrap/bootstrap.css') }}" rel="stylesheet">
	<script src="{{ asset('js/bootstrap/bootstrap.js') }}" defer></script>

	<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->
	<script src="{{ asset('js/jquery/jquery.js') }}" defer></script>

	<link href="{{ asset('js/toastr/toastr.css') }}" rel="stylesheet">
	<script src="{{ asset('js/toastr/toastr.js') }}" defer></script>

	<link href="{{ asset('js/swiper/swiper.css') }}" rel="stylesheet">
	<script src="{{ asset('js/swiper/swiper.js') }}" defer></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/modules/process_cart.js') }}" defer></script>
    <script src="{{ asset('js/modules/process_swiper.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
	integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body class='d-flex flex-column min-vh-100'>
	@php
		$textCart = 'пусто';
		$cartCollection = Cart::getContent();

		if ($cartCollection->count() > 0){
			$textCart = $cartCollection->count() . ' товара, ' . \Cart::getSubTotal() . ' р.';
		}
		
	@endphp
	<div id="app">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
			  <a class="navbar-brand" href="{{ url('/') }}">GlushokShop</a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				  <li class="nav-item"><a class="nav-link" href="{{ url('/catalog') }}">Каталог</a></li>
				  <li class="nav-item"><a class="nav-link" href="{{ url('/cart') }}">Корзина ({{ $textCart }})</a></li>

				  @if (backpack_auth()->guest())
						<li class="nav-item"><a class="nav-link" href="{{ backpack_url('login') }}">Авторизация</a> </li> 
					@endif

					@if (backpack_auth()->check())
						<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ backpack_user()->name }}</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Личный кабинет</a></li>
								<li><a class="dropdown-item" href="#">Заказы</a></li>
								<li><a class="dropdown-item" href="#">Настройки</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Выйти из аккаунта</a><form id="logout-form" action="{{ backpack_url('logout') }}" method="POST" class="d-none"> @csrf </form></li>
							</ul>
						</li>

					@endif

				</ul>
	
				<form class="d-flex">
				  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				  <button class="btn btn-outline-success" type="submit">Поиск</button>
				</form>
			  </div>
			</div>
		  </nav>
	</div>

	@yield('content')
	
	@include('layouts.footer')

	<!-- Footer -->

</body>

</html>

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
	<script src="{{ asset('js/popper.js') }}" defer></script>
	<script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/modules/process_cart.js') }}" defer></script>
    <script src="{{ asset('js/modules/process_swiper.js') }}" defer></script>
    <script src="{{ asset('js/modules/process_sort.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
	integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/6a4e5ddf0a.js" crossorigin="anonymous"></script>
</head>

<body class='d-flex flex-column min-vh-100'>
	@php
		$textCart = 'пусто';
		$textCartMobile = '0';
		$cartCollection = Cart::getContent();

		if ($cartCollection->count() > 0){
			$textCart = $cartCollection->count() . ' товара, ' . \Cart::getSubTotal() . ' р.';
			$textCartMobile = $cartCollection->count();
		}
		
	@endphp
	<div id="app">

		<style>
			.mobile-nav {
				background: #f7f7f7;
				position: fixed;
				bottom: 0;
				height: 52px;
				width: 100%;
				display: flex;
				justify-content: space-around;
				z-index:999999999999999999999;
			}
			.icon-mobile{
				justify-content: center;
				align-items: center;
				font-size: 28px !important;
				color: #e0c8c8;
			}

			@media screen and (min-width: 600px) {
				.mobile-nav {
					display: none;
				}
			}
			.count{
				width: 15px;
				height: 15px;
				border-radius: 15px;
				display: -webkit-flex;
				display: flex;
				-webkit-align-items: center;
				align-items: center;
				-webkit-justify-content: center;
				justify-content: center;
				position: absolute;
				top: 11px;
				background: #ff420f;
			}
		</style>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
			  <a class="navbar-brand" href="{{ url('/') }}">GlushokShop</a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				  <li class="nav-item"><a class="nav-link" href="{{ url('/catalog') }}">Каталог</a></li>


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

					<li class="nav-item">
						<a class="nav-link" href="{{ url('/cart') }}">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
							(<span text-cart>{{ $textCart }}</span>)
						</a>
					</li>
				</ul>
			  </div>
			</div>
		  </nav>

		  <nav class="mobile-nav">
			<div class='container-fluid'>
				<div class='row justify-content-center align-self-center' style="margin-top: 12px;">
					<div class='col'>
						<a class="" href="{{ url('/') }}">
							<i class="fa fa-home icon-mobile" aria-hidden="true" ></i>
						</a>
					</div>
					<div class='col'>
						<a class="" href="{{ url('/') }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
							<i class="fa fa-search icon-mobile" aria-hidden="true"></i>
						</a>
					</div>
					<span class="badge badge-primary count">{{ $textCartMobile }}</span >
					<div class='col'>
						<a class="" href="{{ url('/cart') }}">
							<i class="fa fa-shopping-cart icon-mobile" aria-hidden="true"></i> 
						</a>
					</div>
					<div class='col'>
						<a class="" href="{{ url('/cart') }}">
							<i class="fa fa-heart icon-mobile" aria-hidden="true"></i>
						</a>
					</div>
					<div class='col'>
						<a class="" href="{{ url('/cart') }}">
							<i class="fa fa-user icon-mobile" aria-hidden="true"></i>
						</a>
					</div>
			  </div>
			</div>

		</nav>
	</div>

	  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
		<div class="offcanvas-header">
		  <h5 class="offcanvas-title" id="offcanvasLeftLabel">Вне холста</h5>
		  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
		</div>
		<div class="offcanvas-body">
		  <div>
				Какой-то текст в качестве заполнителя. В реальной жизни у вас могут быть элементы, которые Вы выбрали. Нравится, текст, изображения, списки и т. д.
		  </div>
		  <div class="dropdown mt-3">
			<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
			  	Кнопка раскрывающегося списка
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			  <li><a class="dropdown-item" href="#">Действие</a></li>
			  <li><a class="dropdown-item" href="#">Другое действие</a></li>
			  <li><a class="dropdown-item" href="#">Что-то еще здесь</a></li>
			</ul>
		  </div>
		</div>
	  </div>

	@include('layouts.search')

	@yield('content')
	
	@include('layouts.footer')

	<!-- Footer -->

</body>

</html>
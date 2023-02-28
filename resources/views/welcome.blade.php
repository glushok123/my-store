@extends('layouts.app')

@section('content')

<style>
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        -ms-transition: all 1s ease;
        transition: all 1s ease;
    }
    .swiper-slide img:hover {
        -webkit-filter: brightness(70%);
        filter: brightness(70%);
    }
    .stocks-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
        -webkit-transition: all 1s ease;
        -moz-transition: all 1s ease;
        -o-transition: all 1s ease;
        -ms-transition: all 1s ease;
        transition: all 1s ease;
    }
    .stocks-image img:hover {
        -webkit-filter: brightness(70%);
        filter: brightness(70%);
    }
    .stocks-image{
      margin-top: 10px;
    }
    .swiper-button-next,
    .swiper-button-prev {
        background-color: white;
        background-color: rgba(255, 255, 255, 0.5);
        right:10px;
        border-radius: 50px;
        padding: 30px;
        color: #000 !important;
        fill: black !important;
        stroke: black !important;
    }
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(101, 241, 199, 0.5);
    }
    @media only screen
        and (max-width : 600px) {
          .swiper-button-next,
          .swiper-button-prev {
              display: none;
          }
    }
    .swiper-pagination{

    }
</style>

<div class="container">

    <div class="swiper banner-on-main" id='banner-on-main'>
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href=""><img src="{{ asset('images/baner1.jpg') }}" alt="Описание 1"></a></div>
            <div class="swiper-slide"><a href=""><img src="{{ asset('images/baner2.jpg') }}" alt="Описание 2"></a></div>
            <div class="swiper-slide"><a href=""><img src="{{ asset('images/baner3.jpg') }}" alt="Описание 3"></a></div>
            <div class="swiper-slide"><a href=""><img src="{{ asset('images/baner4.jpg') }}" alt="Описание 4"></a></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <br><br>
        <div class="swiper-pagination"></div>
    </div>
</div>

<br>

<div class="container">

    <div class='row'>
        <div class='col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch'>
          <div class="stocks-image"><a href=""><img src="{{ asset('images/stock-image/stocks-image1.jpg') }}" alt="Описание 1"></a></div>
        </div>
        <div class='col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch'>
          <div class="stocks-image"><a href=""><img src="{{ asset('images/stock-image/stocks-image2.jpg') }}" alt="Описание 2"></a></div>
        </div>
        <div class='col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch'>
          <div class="stocks-image"><a href=""><img src="{{ asset('images/stock-image/stocks-image3.jpg') }}" alt="Описание 3"></a></div>
        </div>
        <div class='col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 d-flex align-items-stretch'>
          <div class="stocks-image"><a href=""><img src="{{ asset('images/stock-image/stocks-image4.jpg') }}" alt="Описание 4"></a></div>
        </div>
    </div>

</div>

@endsection

@section('description', 'Интернет магазин')
@section('keywords', 'Интернет магазин')
@section('title', 'Интернет магазин')
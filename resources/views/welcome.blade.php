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
</style>

<div class="container">
    <br>

    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col-md-6">
        <div class="form">
          <i class="fa fa-search"></i>
          <input type="text" class="form-control form-input" placeholder="Search anything...">
          <span class="left-pan"><i class="fa fa-microphone"></i></span>
        </div>
      </div>
    </div>

    <br>

    <div class="row height d-flex justify-content-center align-items-center">
      <div class="col-md-6">
          <span class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              Категории
          </span>
      </div>
    </div>

    <br>

    <div class="swiper banner-on-main" id='banner-on-main'>
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="{{ asset('images/baner1.jpg') }}" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset('images/baner2.jpg') }}" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset('images/baner3.jpg') }}" alt=""></div>
          <div class="swiper-slide"><img src="{{ asset('images/baner4.jpg') }}" alt=""></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
    
</div>


@endsection

@section('description', 'Интернет магазин')
@section('keywords', 'Интернет магазин')
@section('title', 'Интернет магазин')


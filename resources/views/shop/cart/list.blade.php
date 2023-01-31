
@extends('layouts.app')

@section('content')

<div class='container'>
    <div class='row text-center'>
        <h1>Ваша корзина</h1>
        <hr>
    </div>
    <section class="section-content bg padding-y ">
        <div class="container">

            <div class="row">
                <main class="col-sm-9">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Your shopping cart is empty.</p>
                    @else

                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                <tr>
                                    <th scope="col">Название</th>
                                    <th scope="col" width="150">Количество</th>
                                    <th scope="col" width="120">Цена</th>
                                    <th scope="col" class="text-right" width="200">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\Cart::getContent() as $item)
                                    <tr>
                                        <td>
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate">{{ Str::words($item->name,20) }}</h6>
                                                    @foreach($item->attributes as $key  => $value)
                                                        <dl class="dlist-inline small">
                                                            <dt>{{ ucwords($key) }}: </dt>
                                                            <dd>{{ ucwords($value) }}</dd>
                                                        </dl>
                                                    @endforeach
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger" style='margin-right: 5px'>-</button>
                                            <var class="price">{{ $item->quantity }}</var>
                                            <button type="button" class="btn btn-outline-success" style='margin-left: 5px'>+</button>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ config('settings.currency_symbol'). $item->price }}</var>
                                                <small class="text-muted">р.</small>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    @endif
                </main>
                <aside class="col-sm-3">
                    <a href="{{ route('cart.clear') }}" class="btn btn-danger btn-block mb-4">Очистить корзину</a>
                    <p class="alert alert-success">Сообщение пользователю</p>
                    <dl class="dlist-align h4">
                        <dt>Всего:</dt>
                        <dd class="text-right"><strong>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }} р.</strong></dd>
                    </dl> 
                    <hr>
                    <a href="#" class="btn btn-success btn-lg btn-block">Оплатить</a>
                </aside>
            </div>
        </div>
    </section>

</div>



@endsection

@section('description', 'Распечатка и оформление будут осуществлены в максимально короткие сроки и с использованием лучших расходников.')
@section('keywords', 'копицентр 24 часа, копировальный центр Москва, копировальный центр круглосуточно, копировальный центр')
@section('title', 'Копицентр Москва, круглосуточный копировальный центр в Москве, Копифаст - 24 часа 7 дней в неделю')




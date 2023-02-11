<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Корзина список
     */
    public function cartList()
    {
        $cartItems = \Cart::getContent();

        return view('shop.cart.list', compact('cartItems'));
    }

    /**
     * Добавление в корзину
     */
    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.list');
    }

    /**
     * Обновление корзины
     */
    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return redirect()->route('cart.list');
    }

    /**
     * Удаление из корзины
     */
    public function removeCart(Request $request)
    {
        Cart::remove($request->id);

        return redirect()->route('cart.list');
    }

    /**
     * Очистка корзины
     */
    public function clearAllCart()
    {
        Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}

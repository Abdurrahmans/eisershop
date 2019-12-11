<?php

namespace App\Http\Controllers;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addCart(Request $request){
       $product = Product::find($request->id);
        Cart::add([
            'id'      => $request->id,
            'name'    => $product->product_name,
            'price'   => $product->product_price,
            'qty'     => $request->qty,
            'options' => ['image' => $product->main_image]
        ]);
        return redirect('/cart');
    }
    public function viewCart(){
        $cartProducts = Cart::content();

        return view('front-end.cart.cart',[
            'cartProducts' => $cartProducts
        ]);
    }
    public function deleteCart($id){
        Cart::remove($id);
        return back();
    }
    public function updateCart(Request $request){
        Cart::update( $request->rowId, $request->qty);
        return back();
    }
}

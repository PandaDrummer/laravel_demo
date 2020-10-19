<?php

namespace App\Http\Controllers;

use App\Http\Models\Cart;
use App\Http\Models\Decoration;
use App\Http\Models\Filling;
use App\Http\Models\Product;
use App\Http\Models\Shape;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){

     return view('site.index');
    }
    public function createCake(){
        $shape = Shape::all();
        $filling= Filling::all();
        $decoration = Decoration::all();
        return view('site.createCake',[
            'shape'=>$shape,
            'filling'=>$filling,
            'decoration'=>$decoration
        ]);
    }
    public function product(){
        $product = Product::all();
        return view( 'site.product',[
            'product'=>$product
        ]);
    }
    public function viewProduct($id){
        $product= Product::find($id);
        return view('site.show',[
            'product'=>$product
        ]);
    }
    public function addCustomizeCake(Request $request){

        $cart= new Cart();
        //$request->session()->forget('cart');
        $cart->addToCartCustomizeCake($request->nameShape, $request->nameFilling,$request->nameDecoration, $request->fillingCount ,  $request);
    }
    public function addToCartProduct(Request $request){
        $cart = new Cart();
        $cart->addToCartProduct($request->nameProduct,$request->priceProduct , $request);
    }
    public function clearCart(Request  $request){
        $request->session()->forget('cart');
    }
    public function test(Request $request){
        dump($request->session()->get('cart'));
        $name = 'Nutella';
        $trueShape= Product::where('name' , $name)->first();
        dump($trueShape->price);
    }
    public function cart(Request $request){
        return view('site.cart',[
            'session'=> $request->session()
        ] );
    }

}

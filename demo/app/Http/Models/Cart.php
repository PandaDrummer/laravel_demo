<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart extends Model
{
    public static $countItem;
    public function addToCartCustomizeCake( $nameShape, $nameFilling , $nameDecoration,$fillingCount, Request $request){
        $session= $request->session();
        $truePrice= $this->truePriceCustomizeCake($nameShape, $nameFilling , $nameDecoration);
        if ($truePrice !=false){
            if ($session->has('cart.customizeCake')) {
                $ct = count($session->get('cart.customizeCake'));
                $ct++ ;
                $session->put('cart.customizeCake.'.$ct , [
                    'nameShape'=> $nameShape,
                    'nameFilling'=>$nameFilling,
                    'nameDecoration' =>$nameDecoration,
                    'truePrice'=>$truePrice
                ]);
            } else {
                self::$countItem = 1;
                echo 'первая сессия';
                $session->put('cart.customizeCake.'.self::$countItem , [
                    'nameShape'=> $nameShape,
                    'nameFilling'=>$nameFilling,
                    'nameDecoration' =>$nameDecoration,
                    'truePrice'=>$truePrice
                ]);
            }
        }
    }
    public function addToCartProduct ($nameProduct , $priceProduct , Request $request) {
        $session= $request->session();
        $truePrice = $this->truePriceProduct($nameProduct);
        if($truePrice != false){
            if ( $session->has('cart.product') ){
                $ct= count($session->get('cart.product'));
                $ct++;
                $session->put('cart.product.'.$ct ,[
                    'nameProduct'=>$nameProduct,
                    'priceProduct'=>$truePrice
                ]);
            } else {
                $session->put('cart.product.1' ,[
                    'nameProduct'=>$nameProduct,
                    'priceProduct'=>$truePrice
                ]);
            }
        }
    }
    public function truePriceCustomizeCake($nameShape, $nameFilling , $nameDecoration){
        $trueShape= Shape::where('name' , $nameShape)->first();
        $trueFilling= Filling::where('name', $nameFilling)->first();
        $trueDecoration =Decoration::where('name',$nameDecoration)->first();
        if($trueShape !=NULL &&$trueFilling!= NULL && $trueDecoration!=NULL){
            return $trueShape->price + $trueFilling->price +$trueDecoration->price;
        } else return false;
    }
    public function truePriceProduct ($nameProduct){
        $truePrice= Product::where('name',$nameProduct)->first();
        if($truePrice!=NULL){
            return $truePrice->price;
        } else return false;
    }
}

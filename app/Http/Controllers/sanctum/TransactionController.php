<?php

namespace App\Http\Controllers\sanctum;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

/**
 * Thid class will controll all the payment processes
 * 
 */

class TransactionController extends Controller
{
    
    /**
     * Adds a product to the cart
     * 
     * @param $id product id
     * 
     * @return int
     */
    public static function addToCart($id)
    {
        
        

        $product = Product::find($id);

        
        
        


        // To store a cart instance 
        
        
        return Cart::instance(auth()->user()->name)->add($product, 1);
        
        
        
    }
    public function getCart()
    {
        return response()->json(Cart::instance(auth()->user()->name)->content());
    }

    /**
     *  Method to get cart contents
     * 
     * @return Int
     */
    public function getCartTotal()
    {
        return Cart::instance(auth()->user()->name)->content()->count();
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index(Request $request){
     $product_id = $request->product_id;
     $productById = Product::find($product_id);
     Cart::add([
     	  'id' => $productById->id, 
		  'name' => $productById->product_name, 
		  'qty' => $request->product_quentity, 
		  'price' => $productById->product_price,
		]);
       return redirect('/show-cart');

    }

    public function cartView(){
    	$cartProducts = Cart::content();
    	return view('frontEnd.cart.showCart',['cartProducts' =>$cartProducts]);
    }

    public function updateCart(Request $request){
    	Cart::update($request->rowId,$request->product_quantity);
    	return redirect('/show-cart')->with('message', 'Product Quantity update successfully');
    }

    public function removeCartProduct($rowId){
    	Cart::remove($rowId);
    	return redirect('/show-cart')->with('message', 'Product info delete successfully');
    }
}

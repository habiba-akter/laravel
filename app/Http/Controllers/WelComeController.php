<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class WelComeController extends Controller
{
     public function index(){
     	$allPublishedProducts = Product::Where('publication_status',1)->get();
    	return view('frontEnd.home.homeContent',['allPublishedProducts'=>$allPublishedProducts]);
    }

    public function newFunction($id){
    	$productsByCategoryId = Product::where('category_id',$id)->where('publication_status',1)->get();
    	return view('frontEnd.category.categoryContent',['productsByCategoryId'=>$productsByCategoryId]);
    }

    public function productDetails($id){
       $productById = Product::find($id);
       $categoryId = $productById->category_id;
       $productsByCategoryId = Product::where('category_id',$categoryId)->where('publication_status',1)->orderBy('id','desc')->take(2)->get();
    	return view('frontEnd.category.details',['productById'=>$productById,'productsByCategoryId'=>$productsByCategoryId]);
    }
}

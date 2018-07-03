<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function index(){
    	return view('admin.category.addCategory');
    }

    public function saveCategory(Request $request){
        //return $request->all();
        Category::create($request->all());
        return redirect('/category/add')->with('message','Category info created successfully');
    }

    public function manageCategory(){
    	$categories =Category::all();
    	return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function unpublishedCategory($id){
       $categoryById = Category::find($id);
       $categoryById-> publication_status=0;
       $categoryById->save();
       return redirect('/category/manage')->with('message','Category info unpublished successfully');
    }

    public function publishedCategory($id){
       //$categoryById = Category::find($id);
       //$categoryById-> publication_status=1;
       //$categoryById->save();
       DB::table('categories')->where('id',$id)->update(['publication_status'=>1]);
       return redirect('/category/manage')->with('message','Category info Published successfully');
    }

    public function editCategory($id){
      $categoryById = Category::find($id);
      return view('admin.category.editCategory',['categoryById'=>$categoryById]);

    }

    public function updateCategory(Request $request){
       $categoryId = $request->category_id;
       $category = Category::find($categoryId);
       $category->category_name = $request->category_name;
       $category->category_description =$request->category_description;
       $category->publication_status =$request->publication_status;
       $category->save();
       return redirect('/category/manage')->with('message','Category info update successfully');

    }
    
    public function deleteCategory($id){
      $category =Category::find($id);
      $category->delete();
      return redirect('/category/manage')->with('message','Category info Delete successfully');
    }

}

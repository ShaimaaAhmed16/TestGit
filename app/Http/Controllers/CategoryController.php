<?php

namespace App\Http\Controllers;

use App\Events\CreateCategoryEvent;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
       $categories = Category::all();
       return response()->json($categories);
   }
   public function viewAll(){
       $categories = Category::get();
       return view('category.index',compact('categories'));
   }
   public function store(Request $request){
       $validatedData = Request()->validate([
        'name' => 'required',
        'description' =>'required'
       ]);
       $category = Category::create($validatedData);
//       event(new CreateCategoryEvent($category));
       return $category;
   }
   public function update(Request $request, $id){
       $category = Category::find($id);
       $category->update($request->all());
       return $category;
   }
   public function delete($id){
       $category = Category::find($id);
       $category->delete();
       return $category;
   }

   public function sum($x ,$y){
       return $x + $y;
   }

}

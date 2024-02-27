<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){

    	$categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }


    public function create(){
        return view('admin.category.create');
    }

    
    public function store(Request $request){

    	$category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
        	
        	return redirect()->route('admin.category-list')->with([
                'successful_message' => 'category is added successfully',
            ]);
        }

        return back()->with([
                'error_message' => 'category is not added',
            ]);

    }

    public function edit(Request $request){
    	$id = $request->id;
    	$category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request){
        
        $id = $request->id;
        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        if ($category->save()) {
        	
        	return redirect()->route('admin.category-list')->with([
                'successful_message' => 'category is updated successfully',
            ]);
        }

        return back()->with([
                'error_message' => 'category is not updated',
            ]);
    }

    public function destroy(Request $request){

        $categoryId = $request->id;

        $category = Category::find($categoryId);

        if ($project->delete()) {
            return redirect()->back()->with("successful_message","category is deleted successfully.");
        }else{
            return redirect()->back()->with("error_message","category not deleted something went wrong.");
        }
    }
}

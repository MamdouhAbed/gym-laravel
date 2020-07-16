<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoriesController extends Controller
{
    public function addCategory(Request $request){

        $category=new Category();
        $category->name=$request->name;
        $category->activated_id=$request->activated_id;
        $category->created_by=$request->created_by;
        $category->save();

        return redirect()->back()->with(['msg', 'The Message']);

    }

    public function updateCategory(Request $request,Category $category){
        $category->name=$request->name;
        $category->activated_id=$request->activated_id;
        $category->updated_by=$request->updated_by;
        $category->update();

        return redirect()->back()->with(['msg', 'The Message']);

    }

    public function deleteCategory(Category $category){

        $category->is_delete=1;
        $category->deleted_by;
        $category->update();

        return redirect()->back()->with(['msg', 'The Message']);

    }

}

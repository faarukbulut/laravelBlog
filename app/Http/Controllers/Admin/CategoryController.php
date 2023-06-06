<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $list = Category::with(['parentCategory:id,name'])->get();

        return view('admin.categories.list', compact('list'));
    }

    public function create()
    {
        return view('admin.categories.create-update');
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer', "exists:categories"]
        ]);

        $categoryID = $request->id;
        $category = Category::where('id', $categoryID)->first();
        $category->status = !$category->status;
        $category->save();

        return redirect()->route('admin.categories.list');
    }

    public function changeFeatureStatus(Request $request)
    {
        $request->validate([
            'id' => ['required' , 'integer', 'exists:categories']
        ]);

        $categoryID = $request->id;
        $category = Category::where('id', $categoryID)->first();
        $category->feature_status = !$category->feature_status;
        $category->save();

        return redirect()->route('admin.categories.list');
    }

}

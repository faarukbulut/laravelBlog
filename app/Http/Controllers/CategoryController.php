<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function list()
    {
        $list = Category::with(['parentCategory'])->orderBy('order', 'DESC')->get();
        return view('admin.category.list', compact('list'));
    }

    public function create()
    {
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('admin.category.create', compact('parentCategories'));
    }

    public function store(CategoryCreateRequest $request)
    {
        $data = $request->except('_token');
        $data['slug'] = Str::slug($request->slug != null ? $request->slug : $request->name);
        $data['status'] = isset($request->status) ? 1 : 0;
        $data['feature_status'] = isset($request->status) ? 1 : 0;

        Category::create($data);
        return redirect()->route("admin.category.list");
    }
}

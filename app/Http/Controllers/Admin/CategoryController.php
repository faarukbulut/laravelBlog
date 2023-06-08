<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $list = Category::with(['parentCategory:id,name'])
            ->name($request->name)
            ->slug($request->slug)
            ->description($request->description)
            ->order($request->order)
            ->parentId($request->parent_id)
            ->status($request->status)
            ->featureStatus($request->feature_status)
            ->paginate(10);


        $parentCategories = Category::all();

        return view('admin.categories.list', compact('list', 'parentCategories'));
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

    public function delete(Request $request)
    {
        $request->validate([
            'id' => ['required' , 'integer', 'exists:categories']
        ]);

        $categoryID = $request->id;
        Category::where('id', $categoryID)->delete();
        return redirect()->route('admin.categories.list');
    }

    public function edit(Request $request)
    {
        $categories = Category::all();

        $categoryID = $request->id;
        $category = Category::where('id', $categoryID)->first();

        if(!$category)
        {
            return redirect()->back();
        }

        return view('admin.categories.create-update', compact('category', 'categories'));
    }

    public function update(CategoryStoreRequest $request)
    {
        $slug = Str::slug($request->slug);
        $slugCheck = $this->slugCheck($slug);

        $category = Category::find($request->id);
        $category->name = $request->name;

        if((!is_null($slugCheck) && $slugCheck->id == $category->id) || is_null($slugCheck))
        {
            $category->slug = $slug;
        }
        else if(!is_null($slugCheck) && $slugCheck->id != $category->id)
        {
            $category->slug = Str::slug($slug . time());
        }
        else
        {
            $category->slug = Str::slug($slug . time());
        }

        $category->description = $request->description;
        $category->status = $request->status ? 1 : 0;
        $category->feature_status = $request->feature_status ? 1 : 0;
        $category->seo_keywords = $request->seo_keywords;
        $category->seo_description = $request->seo_description;
        $category->order = $request->order;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('admin.categories.list');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create-update', compact('categories'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $slug = Str::slug($request->slug);

        try
        {

            $category = new Category();
            $category->name = $request->name;
            $category->slug = (!$this->slugCheck($slug)) ? $slug : Str::slug($slug . time());
            $category->description = $request->description;
            $category->status = $request->status ? 1 : 0;
            $category->feature_status = $request->feature_status ? 1 : 0;
            $category->seo_keywords = $request->seo_keywords;
            $category->seo_description = $request->seo_description;
            $category->order = $request->order;
            $category->parent_id = $request->parent_id;
            $category->save();

        }catch(\Exception $exception)
        {
            abort(404, $exception->getMessage());
        }

        return redirect()->route('admin.categories.list');
    }

    public function slugCheck(string $text)
    {
        return Category::where('slug', $text)->first();
    }

}

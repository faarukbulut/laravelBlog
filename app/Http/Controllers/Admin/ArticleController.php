<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.articles.list');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create-update',  Compact('categories'));
    }

    public function store(ArticleCreateRequest $request)
    {
        $imageFile = $request->file("image");
        $originalName = $imageFile->getClientOriginalName();
        $originalExtension = $imageFile->getClientOriginalExtension();
        $explodeName = explode("." , $originalName)[0];
        $fileName = Str::slug($explodeName) . "." . $originalExtension;
        $path = "storage/articles/" . $fileName;

        $data = $request->except("_token");
        $slug = $data['slug'] ?? $data['name'];
        $slug = Str::slug($slug);
        $slugTitle = Str::slug($data['name']);
        $checkSlug = $this->slugCheck($slug);

        if(!is_null($checkSlug))
        {
            $checkTitleSlug = $this->slugCheck($slugTitle);
            if(!is_null($checkTitleSlug))
            {
                $slug = Str::slug($slug . time());
            }
            else
            {
                $slug = $slugTitle;
            }
        }

        $data['slug'] = $slug;
        $data['image'] = $path;
        $data['user_id'] = auth()->id();

        Article::create($data);
        $imageFile->store("articles", "local");

        return redirect()->route('admin.articles.list');
    }


    public function slugCheck(string $text)
    {
        return Article::where('slug', $text)->first();
    }

}

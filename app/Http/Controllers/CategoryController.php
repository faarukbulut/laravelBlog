<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list(){
        $list = Category::with(['parentCategory'])->get();
        return view('admin.category.list', compact('list'));
    }


}

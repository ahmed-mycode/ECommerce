<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show_all_subcategories(){
        $subcategories = Category::whereNotNull('parent_id')->paginate(3);
        return view('admin.subcategory', compact('subcategories'));
    }
}

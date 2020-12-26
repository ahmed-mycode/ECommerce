<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function show_all_categories(){
        $allCategories = Category::whereNull('parent_id')->get();
        return view('admin.category', compact('allCategories'));
    }

    ##########################################################################

    public function get_create_category_page(){

    }

    ##########################################################################

    public function create_category(Request $request){

    }

    ##########################################################################

    public function get_update_category_page($id){
        $data = Category::find($id);
        if(!$data){
            return redirect()->route('admin.categories')->with(['error'=>'هذا القسم غير موجود']);
        }
        return view('admin.edit_category', compact('data'));
    }

    ##########################################################################

    public function update_category(Request $request, $id){

    }

    ##########################################################################

    public function delete_category(Request $request, $id){

    }
}

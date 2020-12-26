<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function show_all_categories()
    {
        $allCategories = Category::whereNull('parent_id')->paginate(3);
        return view('admin.category', compact('allCategories'));
    }

    ##########################################################################

    public function get_create_category_page()
    {

    }

    ##########################################################################

    public function create_category(Request $request)
    {

    }

    ##########################################################################

    public function get_update_category_page($id)
    {
        $data = Category::find($id);
        if (!$data) {
            return redirect()->route('admin.categories')->with(['error' => __('admin/category.error')]);
        }
        return view('admin.edit_category', compact('data'));
    }

    ##########################################################################

    public function update_category(CategoryValidation $request, $id)
    {
        try {
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category = Category::find($id);
            if (!$category)
                return redirect()->route('admin.categories')->with(['error.edit' => __('admin/category.error.edit')]);
            DB::beginTransaction();
            $category->update(['slug' => $request->input('slug')]);
            $category->name = $request->input('name');
            $category->save();
            DB::commit();

        } catch (\Exception $exception) {
            return DB::rollBack();
        }

        return redirect()->back()->with(['success' => __('admin/category.success')]);
    }

    ##########################################################################

    public function delete_category(Request $request, $id)
    {

    }
}

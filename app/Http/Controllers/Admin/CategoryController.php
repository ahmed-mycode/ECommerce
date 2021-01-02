<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryValidation;
use App\Http\Requests\NewCategoryValidation;
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
        return view('admin.create_category');
    }

    ##########################################################################

    public function create_category(NewCategoryValidation $request)
    {
        try {

            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            DB::beginTransaction();
            $newCategory = Category::create($request->except('_token'));
            $newCategory->name = $request->name;
            $newCategory->save();
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/category.save.error')]);
        }
        return redirect()->back()->with(['success' => __('admin/category.save.success')]);
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
            $category = Category::find($id);
            if (!$category)
                return redirect()->route('admin.categories')->with(['error.edit' => __('admin/category.error.edit')]);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            DB::beginTransaction();
            $category->update(['slug' => $request->input('slug'), 'is_active' => $request->input('is_active')]);
            $category->name = $request->input('name');
            $category->save();
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->back()->with(['success' => __('admin/category.success')]);
    }

    ##########################################################################

    public function delete_category($id)
    {
        $category = Category::find($id);
        if (!$category)
            return redirect()->route('admin.categories')->with(['error' => __('admin/category.error')]);

        try {
            $category->delete();
            return redirect()->route('admin.categories')->with(['success' => __('admin/category.delete.success')]);

        } catch (\Exception $exception) {
            return redirect()->route('admin.categories')->with(['error' => __('admin/category.error')]);
        }

    }
}

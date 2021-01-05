<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewSubcategoryValidation;
use App\Http\Requests\EditSubcategoryValidation;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function show_all_subcategories(){
        $subcategories = Category::whereNotNull('parent_id')->paginate(3);
        return view('admin.subcategory', compact('subcategories'));
    }
    ##########################################################################
    public function get_create_subcategory_page(){
        $all_categories = Category::whereNull('parent_id')->get();
        return view('admin.create_subcategory', compact('all_categories'));
    }
    ##########################################################################
    public function create_subcategory(NewSubcategoryValidation $request){
        try {

            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            DB::beginTransaction();
            $newSubcategory = Category::create($request->except('_token'));
            $newSubcategory->name = $request->name;
            $newSubcategory->save();
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/category.save.error')]);
        }
        return redirect()->back()->with(['success' => __('admin/category.save.sub.success')]);
    }
    ##########################################################################
    public function get_update_subcategory_page($id){
        $subCategory = Category::find($id);
        $all_categories = Category::whereNull('parent_id')->get();
        if(!$subCategory)
            return redirect()->route('admin.subcategory')->with(['error' => __('admin/category.error.sub')]);

        return view('admin.edit_subcategory', compact('subCategory', 'all_categories'));
    }
    ##########################################################################
    public function update_subcategory(EditSubcategoryValidation $request, $id){
        try {
            $subCategory = Category::find($id);

            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            DB::beginTransaction();
            $subCategory->update($request->except('_token'));
            $subCategory->name = $request->input('name');
            $subCategory->save();
            DB::commit();

        }catch (\Exception $exception){
            DB::rollBack();
        }
        return redirect()->back()->with(['success' => __('admin/category.success')]);

    }
    ##########################################################################
    public function delete_subcategory($id){
        $subCategory = Category::find($id);

        if (!$subCategory)
            return redirect()->route('admin.subcategories')->with(['error' => __('admin/category.error')]);

        try {
            $subCategory->delete();
            return redirect()->route('admin.subcategories')->with(['success' => __('admin/category.delete.success')]);

        } catch (\Exception $exception) {
            return redirect()->route('admin.subcategories')->with(['error' => __('admin/category.error')]);
        }
    }

}

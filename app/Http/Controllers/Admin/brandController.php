<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandValidation;
use App\Http\Requests\UpdateBrandValidation;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class brandController extends Controller
{
    public function show_all_brands(){
        $allBrands =  Brand::orderBy('id', 'DESC')->paginate(3);
        return view('admin.brands', compact('allBrands'));
    }

    /***************************************/

    public function create_brand_page(){
        return view('admin.create_brand');
    }

    /***************************************/

    public function store_new_brand(BrandValidation $request){

        try {

            if(!$request->has('is_active'))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);

            $fileName = '';
            if($request->has('photo'))
                $fileName = saveFile('brands', $request->photo);

            DB::beginTransaction();
            $new_brand = Brand::create($request->except('_token', 'photo'));
            $new_brand->name = $request->input('name');
            $new_brand->photo = $fileName;
            $new_brand->save();
            DB::commit();
            return redirect()->back()->with(['success'=>__('admin/brand.success.create')]);

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/brand.error.create')]);
        }
    }

    /***************************************/

    public function update_brand_page($id){
        $brand = Brand::find($id);
        if(!$brand)
            return redirect()->route('all.brands')->with(['error'=>__('admin/brand.error.create')]);

        return view('admin.update_brand', compact('brand'));
    }

    /***************************************/

    public function update_brand(UpdateBrandValidation $request, $id){
        try {

            $current_brand = Brand::find($id);

            DB::beginTransaction();

            if($request->has('photo')){
                $fileName = saveFile('brands', $request->photo);
                $current_brand->photo = $fileName;
            }
            else
                $current_brand->photo;


            if(!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $current_brand->update($request->except('_token', 'id', 'photo'));
            $current_brand->name = $request->name;
            $current_brand->save();
            DB::commit();
            return redirect()->back()->with(['success'=>__('admin/brand.success.update')]);

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/brand.error.create')]);
        }
    }

    /***************************************/

    public function delete_brand($id){
        try {
            $brand = Brand::find($id);

            if(!$brand)
                return redirect()->route('all.brands')->with(['error' => __('admin/brand.error.create')]);

            $brand -> delete();
            return redirect()->route('all.brands')->with(['success' => __('admin/brand.success.delete')]);

        }catch (\Exception $exception){
            return redirect()->route('all.brands')->with(['error' => __('admin/brand.error.create')]);
        }

    }
}

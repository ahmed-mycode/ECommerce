<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagValidation;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TagController extends Controller
{
    public function show_tags(){
        $all_tags = Tag::orderBy('id', 'DESC')->paginate(3);
        return view('admin.tags', compact('all_tags'));
    }
    #************************************************#
    public function create_tag_page(){
        return view('admin.create_tag');
    }
    #************************************************#
    public function create_tag(TagValidation $request){
        try {
            DB::beginTransaction();
            $new_tag = Tag::create($request->except('_token'));
            $new_tag->name = $request->input('name');
            $new_tag->slug = $request->input('slug');
            $new_tag->save();
            DB::commit();
            return redirect()->back()->with(['success'=>__('admin/tags.success.save')]);

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/tags.error')]);
        }
    }
    #************************************************#
    public function update_tag_page($id){
        $current_tag = Tag::find($id);
        if(!$current_tag)
            return redirect()->back()->with(['error'=>__('admin/tags.error')]);

        return view('admin.edit_tag', compact('current_tag'));
    }
    #************************************************#
    public function update_tag(TagValidation $request, $id){
        try {
            $current_tag = Tag::find($id);
            if(!$current_tag)
                return redirect()->back()->with(['error'=>__('admin/tags.error')]);

            DB::beginTransaction();
            $current_tag->update($request->except('_taken'));
            $current_tag->name = $request->input('name');
            $current_tag->slug = $request->input('slug');
            $current_tag->save();
            DB::commit();
            return redirect()->back()->with(['success'=>__('admin/tags.success.edit')]);

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/tags.error')]);
        }
    }
    #************************************************#
    public function delete_tag($id){
        try {
            $current_tag = Tag::find($id);
            if(!$current_tag)
                return redirect()->back()->with(['error'=>__('admin/tags.error')]);

            $current_tag->delete();
            $current_tag->deleteTranslations();
            return redirect()->back()->with(['success' => __('admin/tags.success.delete')]);

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/tags.error')]);
        }
    }
}

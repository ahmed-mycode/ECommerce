<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingValidation;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginValidation;
use App\Http\Requests\AdminEditProfile;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function get_login_page()
    {
        return view('admin.login');
    }

    /*************************************/

    public function admin_login_info(AdminLoginValidation $request)
    {
        //$data = $request->all();
        if (Auth::guard('admin')->attempt(
            ['email' => $request->input('email'), 'password' => $request->input('password')]
        )) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('admin.login')->with(['error' => 'هناك خطا في بيانات الدخول']);
    }

    /*************************************/

    public function get_dashboard()
    {
        return view('admin.dashboard');
    }

    /*************************************/

    public function shipping_method($type)
    {

        if ($type === 'free')
            $data = Setting::where('key', 'free_shipping_label')->get();

        elseif ($type === 'inner') {
            $data = Setting::where('key', 'local_label')->get();
        } elseif ($type === 'outer') {
            $data = Setting::where('key', 'outer_label')->get();
        } else
            $data = Setting::where('key', 'free_shipping_label')->get();

        return view('admin.edit_shippings', compact('data'));
    }

    /*************************************/

    public function shipping_edit_method(ShippingValidation $request, $id)
    {
        try {
            $shipping_method = Setting::findOrFail($id);

            DB::beginTransaction();
            $shipping_method->update(['plain_value' => $request->input('plain_value')]);
            $shipping_method->value = $request->input('value');
            $shipping_method->save();
            DB::commit();
            return redirect()->back()->with(['success' => __('admin/sidebar.success')]);

        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }

    /*************************************/

    public function get_admin_profile($id)
    {

        $data = Admin::findOrFail($id);
        return view('admin.edit_admin_profile', compact('data'));
    }

    /*************************************/

    public function edit_admin_profile(AdminEditProfile $request, $id)
    {

        try {
            $admin = Admin::findOrFail($id);
            $admin->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            return redirect()->back()->with(['success' => __('admin/sidebar.success')]);

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /*************************************/

    public function edit_admin_password_page()
    {

        return view('admin.edit_admin_password');
    }

    /*************************************/

    public function edit_admin_password(Request $request)
    {
        try {
            $adminData = Admin::findOrFail(Auth::guard('admin')->user()->id);

            if (Hash::check($request->input('current'), $adminData->password)) {
                if ($request->input('new') === $request->input('confirm')) {
                    $newPassword = Hash::make($request->input('confirm'));
                    $adminData->update(['password' => $newPassword]);
                } else
                    return redirect()->back()->with(['error_confirm' => __('admin/sidebar.error.confirm')]);
            } else
                return redirect()->back()->with(['error_current' => __('admin/sidebar.error.current')]);

        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return redirect()->back()->with(['success' => __('admin/sidebar.success')]);
    }

    /*************************************/

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    /*************************************/


}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['setting'] = Setting::all();
        $data['title'] = "تنظیمات";
        return view('admin.Setting.list', compact('data'));
    }

    public function update(Request $request, Setting $setting)
    {
        $setting->update([
            'charge' => $request->charge,
            'min_price' => $request->min_price,
            'value_add_tax' => $request->value_add_tax,
            'percentage_all' => $request->percentage_all,
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }
}

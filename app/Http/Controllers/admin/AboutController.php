<?php

namespace App\Http\Controllers\admin;

use App\About;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use Uploader;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $data['about'] = About::find(1);
        $data['title'] = "ویرایش درباره ما";
        return view('admin.About.edit', compact('data'));
    }

    public function update(Request $request)
    {
        About::find(1)->update([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }
}

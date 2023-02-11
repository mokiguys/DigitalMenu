<?php

namespace App\Http\Controllers\admin;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class BannerController extends Controller
{
    use Uploader;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Banner $banner
     * @return Application|Factory|View
     */
    public function edit(Banner $banner)
    {
        $data['banner'] = $banner;
        return View('admin.Banner.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Banner $banner
     * @return RedirectResponse
     */
    public function update(Request $request, Banner $banner)
    {
        $file_path = 'site/uploader/banner/';
        $inputImage = $request->media;
        $DbImage = $banner->media;
        $file = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $banner->update([
            'media' => $file,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'It was successfully edited');
        return back();
    }

}

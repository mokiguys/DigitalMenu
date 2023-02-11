<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeoRequest;
use App\Seo;
use Exception as ExceptionAlias;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data['title'] = "اضافه کردن سئو صفحات";
        $data['seo'] = Seo::all();
        return view('admin.Seo.list', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param SeoRequest $request
     * @return RedirectResponse
     */
    public function store(SeoRequest $request)
    {
        Seo::create([
            "url" => $request->url,
            'name' => $request->namePage,
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'metaProperties' => $request->metaProperties,
            'OgType' => $request->OgType,
            'OgProperties' => $request->OgProperties
        ]);
        alert()->success('با موفقیت اضافه شد');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Seo $seo
     * @return Factory|View
     */
    public function edit(Seo $seo)
    {
        $data['title'] = "ویرایش کردن سئو صفحات";
        $data['seo'] = $seo;
        return view('admin.Seo.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SeoRequest $request
     * @param Seo $seo
     * @return RedirectResponse
     */
    public function update(SeoRequest $request, Seo $seo)
    {
        $seo->update([
            "url" => $request->url,
            'name' => $request->namePage,
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'metaProperties' => $request->metaProperties,
            'OgType' => $request->OgType,
            'OgProperties' => $request->OgProperties
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Seo $seo
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function destroy(Seo $seo)
    {
        $seo->delete();
        return back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\CategoryArticle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['category'] = CategoryArticle::latest()->paginate(10);
        return view('admin.CategoryArticle.list',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        CategoryArticle::create([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'ar' => $request->ar,
        ]);
        alert()->success('با موفقیت ثبت شد');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategoryArticle $CategoryArticle
     * @return Response
     */
    public function edit(CategoryArticle $CategoryArticle)
    {
        $data['category'] = $CategoryArticle;
        return view('admin.CategoryَArticle.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CategoryArticle $CategoryArticle
     * @return void
     */
    public function update(Request $request, CategoryArticle $CategoryArticle)
    {
        $CategoryArticle->update([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'ar' => $request->ar,
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryArticle $CategoryArticle
     * @return void
     */
    public function destroy(CategoryArticle $CategoryArticle)
    {
        $CategoryArticle->delete();
        alert()->success('با موفقیت حذف شد');
        return back();
    }
}

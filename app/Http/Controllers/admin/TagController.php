<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['tags'] = Tags::latest()->paginate(10);
        return view('admin.Tags.list',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        Tags::create([
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
     * @param Tags $tag
     * @return void
     */
    public function edit(Tags $tag)
    {
        $data['tag'] = $tag;
        return view('admin.Tags.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tags $tag
     * @return Response
     */
    public function update(Request $request, Tags $tag)
    {
        $tag->update([
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
     * @param Tags $tag
     * @return Response
     * @throws \Exception
     */
    public function destroy(Tags $tag)
    {
        $tag->delete();
        alert()->success('با موفقیت حذف شد');
        return back();
    }
}

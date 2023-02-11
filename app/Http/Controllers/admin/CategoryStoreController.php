<?php

namespace App\Http\Controllers\admin;

use App\CategoryStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['categoryStore'] = CategoryStore::all();
        return view('admin.CategoryStore.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request)
    {
        CategoryStore::create([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'icon' => $request->icon,
            'slug' => $request->slug,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategoryStore $categoryStore
     * @return Application|Factory|View
     */
    public function edit(CategoryStore $categoryStore)
    {
        $data['categoryStore'] = $categoryStore;
        return view('admin.CategoryStore.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @param CategoryStore $categoryStore
     * @return RedirectResponse
     */
    public function update(CategoryStoreRequest $request, CategoryStore $categoryStore)
    {
        $categoryStore->update([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'icon' => $request->icon,
            'slug' => $request->slug,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryStore $categoryStore
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(CategoryStore $categoryStore)
    {
        $categoryStore->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

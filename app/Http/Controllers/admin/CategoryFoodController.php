<?php

namespace App\Http\Controllers\admin;

use App\CategoryFood;
use App\CategoryStore;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryFoodController extends Controller
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
        $data['categoryFood'] = CategoryFood::paginate(20);
        $data['categoryStore'] = CategoryStore::all();
        return view('admin.CategoryFood.list', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        CategoryFood::create([
            'categoryShop_id' => $request->category_id,
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategoryFood $categoryFood
     * @return Response
     */
    public function edit(CategoryFood $categoryFood)
    {
        $data['categoryFood'] = $categoryFood;
        $data['categoryStore'] = CategoryStore::all();
        return view('admin.CategoryFood.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CategoryFood $categoryFood
     * @return Response
     */
    public function update(Request $request, CategoryFood $categoryFood)
    {
        $categoryFood->update([
            'categoryShop_id' => $request->category_id,
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryFood $categoryFood
     * @return Response
     */
    public function destroy(CategoryFood $categoryFood)
    {
        $categoryFood->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

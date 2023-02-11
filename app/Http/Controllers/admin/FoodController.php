<?php

namespace App\Http\Controllers\admin;

use App\CategoryFood;
use App\CategoryStore;
use App\Http\Controllers\Controller;
use App\Food;
use App\Http\Requests\FoodRequest;
use App\Ingredient;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function GuzzleHttp\Promise\all;

class FoodController extends Controller
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
        $data['food'] = Food::paginate(20);
        $data['ingredient'] = Ingredient::all();
        $data['categoryStore'] = CategoryStore::all();
        return view('admin.Food.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param FoodRequest $request
     * @return RedirectResponse
     */
    public function store(FoodRequest $request)
    {
        $food = Food::create([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'categoryFood_id' => $request->categoryFood_id,
            'categoryShop_id' => $request->categoryShop_id,
        ]);
        $food->ingredients()->attach($request->ingredient);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param food $food
     * @return Application|Factory|View
     */
    public function edit(food $food)
    {
        $data['food'] = $food;
        $data['ingredient'] = Ingredient::all();
        $data['categoryStore'] = CategoryStore::all();
        $data['categoryFood'] = CategoryFood::where('categoryShop_id',$food->categoryShop_id)->get();
        return view('admin.Food.edit', compact('data'));
    }

    public function menuGet(Request $request)
    {
        $shop = $request->shop;
        $data = CategoryFood::where('categoryShop_id', $shop)->get();
        echo json_encode($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param FoodRequest $request
     * @param food $food
     * @return RedirectResponse
     */
    public function update(FoodRequest $request, food $food)
    {
        $food->update([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'categoryFood_id' => $request->categoryFood_id,
            'categoryShop_id' => $request->categoryShop_id,
        ]);
        $food->ingredients()->sync($request->ingredient);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param food $food
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(food $food)
    {
        $food->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

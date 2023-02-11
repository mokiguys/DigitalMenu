<?php

namespace App\Http\Controllers\admin;

use App\Food;
use App\Http\Controllers\Controller;
use App\Http\Requests\IngredientRequest;
use App\Ingredient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IngredientController extends Controller
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
        $data['ingredient'] = Ingredient::latest()->paginate(10);
        foreach ($data['ingredient'] as $key => $item){
            if ($item->fa == ""){
                $data['ingredient'][$key]->new = "true";
            }elseif ($item->en == ""){
                $data['ingredient'][$key]->new = "true";
            }elseif ($item->tr == ""){
                $data['ingredient'][$key]->new = "true";
            }
        }
        return view('admin.Ingredient.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IngredientRequest $request
     * @return RedirectResponse
     */
    public function store(IngredientRequest $request)
    {
        Ingredient::create([
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
     * @param Ingredient $ingredient
     * @return Application|Factory|View
     */
    public function edit(Ingredient $ingredient)
    {
        $data['ingredient'] = $ingredient;
        return view('admin.Ingredient.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IngredientRequest $request
     * @param Ingredient $ingredient
     * @return RedirectResponse
     */
    public function update(IngredientRequest $request, Ingredient $ingredient)
    {
        $ingredient->update([
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
     * @param Ingredient $ingredient
     * @return RedirectResponse
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

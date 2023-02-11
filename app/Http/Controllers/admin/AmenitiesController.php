<?php

namespace App\Http\Controllers\admin;

use App\Amenities;
use App\Http\Controllers\Controller;
use App\Http\Requests\AmenitiesRequest;
use Exception as ExceptionAlias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AmenitiesController extends Controller
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
        $data['amenities'] = Amenities::all();
        return view('admin.Amenities.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AmenitiesRequest $request
     * @return RedirectResponse
     */
    public function store(AmenitiesRequest $request)
    {
        Amenities::create([
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
     * @param Amenities $amenity
     * @return Application|Factory|View
     * @throws Exception|ExceptionAlias
     */
    public function edit(Amenities $amenity)
    {
        $data['amenities'] = $amenity;
        return view('admin.Amenities.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AmenitiesRequest $request
     * @param Amenities $amenities
     * @return RedirectResponse
     */
    public function update(AmenitiesRequest $request, Amenities $amenity)
    {
        $amenity->update([
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
     * @param Amenities $amenity
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function destroy(Amenities $amenity)
    {
        $amenity->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

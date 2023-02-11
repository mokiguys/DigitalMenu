<?php

namespace App\Http\Controllers\admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Province;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProvinceController extends Controller
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
        $data['province'] = Province::paginate(10);
        $data['country'] = Country::all();
        return view('admin.Provinces.list', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProvinceRequest $request
     * @return RedirectResponse
     */
    public function store(ProvinceRequest $request)
    {
        Province::create([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'country_id' => $request->country,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Province $province
     * @return Application|Factory|Response|View
     */
    public function edit(Province $province)
    {
        $data['province'] = $province;
        $data['country'] = Country::all();
        return view('admin.Provinces.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProvinceRequest $request
     * @param Province $province
     * @return RedirectResponse
     */
    public function update(ProvinceRequest $request, Province $province)
    {
        $province->update([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'country_id' => $request->country,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Province $province
     * @return Response
     */
    public function destroy(Province $province)
    {
        //
    }
}

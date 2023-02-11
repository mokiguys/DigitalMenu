<?php

namespace App\Http\Controllers\admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $data['country'] = Country::paginate(10);
        return view('admin.Countries.list', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return Response
     */
    public function store(CountryRequest $request)
    {
        Country::create([
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
     * @param  \App\Country  $country
     * @return Response
     */
    public function edit(Country $country)
    {
        $data['country'] = $country;
        return view('admin.Countries.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return Response
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country->update([
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
     * @param  \App\Country  $country
     * @return Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

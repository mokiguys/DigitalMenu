<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    use Uploader;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data['property'] = Property::all();
        return view('admin.Propertes.list',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Property $properte
     * @return Response
     */
    public function edit(Property $properte)
    {
        $data['property'] = $properte;
        return view('admin.Propertes.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Property $properte
     * @return Response
     */
    public function update(Request $request, Property $properte)
    {
        $file_path = 'site/uploader/property/';
        $inputImage = $request->image;
        $DbImage = $properte->image;

        $file = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $properte->update([
            'fa' =>  $request['fa'],
            'en' =>  $request['en'],
            'tr' =>  $request['tr'],
            'ar' =>  $request['ar'],
            'description_fa' =>  $request['description_fa'],
            'description_en' =>  $request['description_en'],
            'description_tr' =>  $request['description_tr'],
            'description_tr' =>  $request['description_ar'],
            'icon' =>  $request['icon'],
            'slug' =>  $request['slug'],
            'image' => $file,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }
}

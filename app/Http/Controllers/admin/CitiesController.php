<?php

namespace App\Http\Controllers\admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\CitiesRequest;
use App\Province;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CitiesController extends Controller
{
    use Uploader;

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
        $data['cities'] = City::paginate(10);
        $data['country'] = Country::all();
        foreach ($data['cities'] as $key => $item) {
            $country = Country::where('id',$item->country_id)->get();
            $data['cities'][$key]->country_name = $country[0][app()->getLocale()];
            $province = Province::where('id',$item->province_id)->get();
            $data['cities'][$key]->province_name = $province[0][app()->getLocale()];
        }
        return view('admin.Cities.list', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CitiesRequest $request
     * @return Response
     */
    public function store(CitiesRequest $request)
    {
        $file_name = $request->image;
        $file_path = 'site/uploader/cities';
        $file = $this->FileUploader($file_name, $file_path);
        City::create([
            'fa' => $request->fa,
            'en' => $request->en,
            'tr' => $request->tr,
            'image' => $file,
            'location' => $request->location,
            'country_id' => $request->country,
            'province_id' => $request->province,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت اضافه شد' : 'Successfully added');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return void
     */
    public function GetProvince(Request $request)
    {
        $country = $request->country;
        $data = Province::where('country_id', $country)->get();
        echo json_encode($data);
    }
    public function GetCity(Request $request)
    {
        $country = $request->country;
        $province = $request->province;
        $data = City::where('province_id', $province)->where('country_id', $country)->get();
        echo json_encode($data);
    }
    public function ShowOne(Request $request)
    {
        $id = $request->id;
        $city = City::where('id', $id)->get();
        $country = $city[0]->country_id;
        $data = City::where('show_one',1)->where('country_id',$country)->get();
        if(count($data) < 4){
            $city[0]->update([
                'show_one' => $city[0]->show_one == 0 ? 1 : 0
            ]);
            echo "done";
        }else{
            echo "error";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Factory|View
     */
    public function edit(City $city)
    {
        $data['cities'] = $city;
        $data['country'] = Country::all();
        $data['province'] = Province::all();
        return view('admin.Cities.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(Request $request, City $city)
    {
        $validation = Validator::make($request->all(), [
            'fa' => ['required'],
            'en' => ['required'],
            'tr' => ['required'],
            'location' => ['required'],
            'country' => 'required',
            'province' => 'required',
        ])->validate();
        $file_path = 'site/uploader/cities/';
        $inputImage = $request->image;
        $DbImage = $city->image;

        $file = $this->FileUpdate($inputImage, $DbImage, $file_path);
        $city->update([
            'fa' =>  $validation['fa'],
            'en' =>  $validation['en'],
            'tr' =>  $validation['tr'],
            'image' => $file,
            'location' => $validation['location'],
            'country_id' => $validation['country'],
            'province_id' => $validation['province'],
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(City $city)
    {
        $path = 'site/uploader/cities/' . $city->image;
        $this->FileDelete($path);
        $city->delete();
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت حذف شد' : 'It was successfully removed');
        return back();
    }
}

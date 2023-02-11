<?php

namespace App\Http\Controllers\admin;

use App\CategoryStore;
use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Payment;
use App\Province;
use App\Shop;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data['shop'] = Shop::orderBy('created_at','DESC')->paginate(20);
        foreach($data['shop'] as $key => $item){
            $payment = Payment::where('shop_id',$item->id)->orderBy('created_at','DESC')->get();
            $data['shop'][$key]->payment_id = $payment[0]->id;
            $data['shop'][$key]->typePayment = $payment[0]->typePayment;
            $data['shop'][$key]->bank_type = $payment[0]->bank_type;
            $data['shop'][$key]->bank_order = $payment[0]->bank_order;
            $data['shop'][$key]->price = $payment[0]->price;
            $data['shop'][$key]->discount = $payment[0]->discount;
            $data['shop'][$key]->status_order = $payment[0]->status_order;
            $data['shop'][$key]->created_payment = $payment[0]->created_at;
            $data['shop'][$key]->currency = $payment[0]->currency;
        }
        return view('admin.Shop.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $data['country'] = Country::all();
        $data['province'] = Province::all();
        $data['categoryStore'] = CategoryStore::all();
        $data['users'] = User::where('user_type', 'User')->where('ban', 0)->get();
        return view('admin.Shop.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ShopRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(ShopRequest $request)
    {
        $carbon = Carbon::now();
        if ($request->result_check_user == 0) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users'
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }
//            create password
            $password = Str::random(10);
//            TODO send email
            $user = User::create([
                'name' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($password),
                'user_type' => 'User'
            ]);
        }
        Shop::create([
            'creatorType' => 'Admin',
            'creator_id' => auth()->user()->id,
            'user_id' => $user->id,
            'confirmAdmin' => 1,
            'plan' => $request->plan,
            'freePlan' => $request->plan != 1 ? 1 : 0,
            'expire' => $carbon->add($request->plan != 1 ? $request->plan != 2 ? 180 : 90 : 30, 'day'),
            'confirmEmail' => 1,
            app()->getLocale() => $request->title,
            'country_id' => $request->country,
            'province_id' => $request->province,
            'city_id' => $request->city,
            'category_id' => $request->category_id,
            'email' => $request->result_check_email == 0 ? $request->email : $request->emailShop,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'It was successfully edited');
        return back();
    }

    public function UpdateConfirmAdmin(Request $request)
    {
        $id = $request->input('id');
        $shop = Shop::where('id', $id)->get();
        if ($shop[0]->confirmAdmin == 0) {
            $confirm = 1;
        } else {
            $confirm = 0;
        }
        Shop::where('id', $id)->update([
            'confirmAdmin' => $confirm
        ]);
        echo "success";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Shop $shop
     * @return Response
     */
    public function edit(Shop $shop)
    {
        $data['country'] = Country::all();
        $data['province'] = Province::all();
        $data['city'] = City::all();
        $data['categoryStore'] = CategoryStore::all();
        $data['shop'] = $shop;
        return view('admin.Shop.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Shop $shop
     * @return Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Shop $shop
     * @return Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Cart;
use App\City;
use App\Country;
use App\PaymentCart;
use App\Province;
use App\Setting;
use App\Shop;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class PaymentCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data['country'] = Country::all();
        return view('site.bills', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'fullname' => ['required'],
            'phone' => ['required', 'numeric'],
            'country' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
        ]);
        $product = Cart::where('token', Cookie::get('cart'))->get();
        $shop = Shop::find($product[0]->shop_id);
        $setting = Setting::find(1);
        $product_name = "";
        $product_price = "";
        $product_discount = "";
        $product_finalPrice = "";
        $product_count = "";
        foreach ($product as $item) {
            $product_name .= $item->name . "//";
            $product_price .= $item->price . "//";
            $product_discount .= $item->discount . "//";
            $product_finalPrice .= $item->final_price . "//";
            $product_count .= $item->count . "//";
        }
        $product_name = rtrim($product_name, '//');
        $product_price = rtrim($product_price, '//');
        $product_discount = rtrim($product_discount, '//');
        $product_finalPrice = rtrim($product_finalPrice, '//');
        $product_count = rtrim($product_count, '//');
        PaymentCart::create([
            'key' => Cookie::get('cart'),
            'fullname' => $validation['fullname'],
            'address' => $validation['address'],
            'country_id' => $validation['country'],
            'province_id' => $validation['province'],
            'city_id' => $validation['city'],
            'phone' => $validation['phone'],
            'description' => $request->description,
            'status_order' => 0,
            'order_place' => $product[0]->way_order,
            'payment' => 0,
            'bank_code' => '-',
            'order_way' => $request->way_payment,
            'tax' => $shop->enable_tax == 1 ? $setting->value_add_tax : 0,
            'service_charge' => $shop->service_charge,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_count' => $product_count,
            'product_discount' => $product_discount,
            'product_finalPrice' => $product_finalPrice,
            'shop_id' => $shop->id
        ]);
        foreach ($product as $item) {
            $item->delete();
        }
        alert()->success('سفارش شما با موفقیت ثبت شد');
        return redirect(route('detail', ['category' => $shop->CategoryStore['slug'], 'detail' => str_replace(" ", '-', $shop->fa)]));
    }

//    list order
    public function list(Request $request)
    {
        $shop_id = $request->shop;
        $data['orders'] = PaymentCart::where('shop_id',$shop_id)->orderBy('created_at','desc')->paginate(20);
        if(auth()->check() && auth()->user()->user_type == "User"){
            $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
        }
        return view('site.orders',compact('data'));

    }

    public function DetailList(Request $request)
    {
        if(auth()->check() && auth()->user()->user_type == "User"){
            $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
        }
        $data['detail'] = PaymentCart::where('shop_id',$request->shop)->where('id',$request->list)->get();
        $country = Country::find($data['detail'][0]->country_id);
        $data['detail'][0]->country_id = $country[app()->getLocale()];

        $province = Province::find($data['detail'][0]->province_id);
        $data['detail'][0]->province_id = $province[app()->getLocale()];

        $city = City::find($data['detail'][0]->city_id);
        $data['detail'][0]->city_id = $city[app()->getLocale()];
        return view('site.detail-order',compact('data'));
    }
}

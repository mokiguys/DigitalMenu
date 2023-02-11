<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Menu;
use App\Setting;
use App\Shop;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $data['cart'] = Cart::where('token', Cookie::get('cart'))->orderBy('created_at', 'desc')->get();
        if($data['cart']->isNotEmpty()) {
            $data['sum_price'] = 0;
            foreach ($data['cart'] as $item) {
                $data['sum_price'] += $item->final_price;
            }
            $data['shop'] = Shop::find($data['cart'][0]->shop_id);
            $data['setting'] = Setting::all();
            $data['sum_price'] = $data['sum_price'] / 10;
            if ($data['shop']->enable_tax == 1) {
                $darsad = ceil($data['sum_price'] * $data['setting'][0]->value_add_tax / 100);
                $data['sum_price'] += $darsad;
            }
            $data['sum_price'] += $data['shop']->service_charge;
            if(auth()->check() && auth()->user()->user_type == "User"){
                $data['shopNames'] = Shop::where('user_id',auth()->id())->where('confirmAdmin',1)->get();
            }
            return view('site.cart', compact('data'));
        }else{
            alert()->warning('سبد خرید شما خالی است');
            return back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $count = $request->count;
        $shop_id = $request->shop;
        $food_id = $request->food;
        $table = $request->table;
        $lang = app()->getLocale();
        $food = Menu::find($food_id);
        $end_price = $food->price - ($food->price * $food->discount / 100);
        $end_price = $end_price * $count;
//        create token
        if (Cookie::get('cart')) {
            $token = Cookie::get('cart');
        } else {
            $token = Str::random(32);
            cookie()->queue('cart', $token, 60 * 24);
        }
//        check now two store
        if (Cart::where('token', Cookie::get('cart'))->get()->isNotEmpty()) {
            if (Cart::where('token', Cookie::get('cart'))->where('shop_id', $shop_id)->get()->isNotEmpty()) {
                //        check no repeat order and submit order
                if (Cart::where('token', Cookie::get('cart'))->where('food_id', $food_id)->get()->isEmpty()) {
                    Cart::create([
                        'token' => $token,
                        'name' => $food[$lang],
                        'price' => $food->price,
                        'discount' => $food->discount,
                        'count' => $count,
                        'shop_id' => $shop_id,
                        'final_price' => $end_price,
                        'food_id' => $food_id,
                        'way_order' => $table
                    ]);
                    echo "done";
                } else {
                    echo "error";
                }
            } else {
                echo "errorExist";
                return false;
            }
        }else{
            Cart::create([
                'token' => $token,
                'name' => $food[$lang],
                'price' => $food->price,
                'discount' => $food->discount,
                'count' => $count,
                'shop_id' => $shop_id,
                'final_price' => $end_price,
                'food_id' => $food_id,
                'way_order' => $table
            ]);
            echo "done";
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cart $cart
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        alert()->success('با موفقیت حذف شد');
        $data['cart'] = Cart::where('token', Cookie::get('cart'))->orderBy('created_at', 'desc')->get();
        if($data['cart']->isNotEmpty()) {
            return back();
        }else{
            alert()->warning('سبد خرید شما خالی است');
            return  redirect(route('home'));
        }

    }

    public function changeCount(Request $request)
    {
        $cart_id = $request->cart;
        $count = $request->count;
        $cart = Cart::where('token', Cookie::get('cart'))->where('id', $cart_id)->get();
        $menu = Menu::find($cart[0]->food_id);
        $end_price = $menu->price - ($menu->price * $menu->discount / 100);
        $end_price = $end_price * $count;
        $cart[0]->update([
            'count' => $count,
            'price' => $menu->price,
            'discount' => $menu->discount,
            'final_price' => $end_price,
        ]);
        echo "done";
    }
}

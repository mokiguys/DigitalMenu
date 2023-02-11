<?php

namespace App\Http\Controllers;

use App\About;
use App\Article;
use App\Banner;
use App\CategoryStore;
use App\City;
use App\Country;
use App\Currency;
use App\FoodComment;
use App\Http\Requests\UserRequest;
use App\Marketer;
use App\Menu;
use App\Payment;
use App\Plans;
use App\Property;
use App\Province;
use App\Setting;
use App\Shop;
use App\ShopComment;
use App\Ticket;
use App\TicketSubject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    use Notifiable;

    public function Home()
    {
        $response = Http::get('http://ip-api.com/json/' . request()->getClientIp());
        $ip = $response->json();
        $data = array();
        $data['banner'] = Banner::where('id', 1)->get();
        $data['categoryShop'] = CategoryStore::all();
//        $country = Country::where('en',$ip['country'])->get();
//        $data['cities'] = City::where('show_one',1)->where('country',$country[0]->id)->get();
        $data['cities'] = City::where('show_one', 1)->get();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        $data['color'] = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $data['property'] = Property::all();
        $data['blog'] = Article::where('lang',\app()->getLocale())->latest()->get();
        return view('Site.index', compact('data'));
    }

    public function Language($lang)
    {
        cookie()->queue('lang', $lang, 60 * 24);
        return back();
    }

    public function Plans()
    {
        dd(App::getLocale());
        $data['plans_free'] = Plans::where('id', 1)->get();
        $data['plans_standard'] = Plans::where('id', 2)->get();
        $data['plans_premium'] = Plans::where('id', 3)->get();
        foreach ($data['plans_standard'] as $key => $item) {
            $data['plans_standard'][$key]->price_discounted_rial = $item->rial - ($item->rial * $item->discount) / 100;
            $data['plans_standard'][$key]->price_discounted_dollar = $item->dollar - ($item->dollar * $item->discount) / 100;
            $data['plans_standard'][$key]->price_discounted_lir = $item->lir - ($item->lir * $item->discount) / 100;
        }
        foreach ($data['plans_premium'] as $key => $item) {
            $data['plans_premium'][$key]->price_discounted_rial = $item->rial - ($item->rial * $item->discount) / 100;
            $data['plans_premium'][$key]->price_discounted_dollar = $item->dollar - ($item->dollar * $item->discount) / 100;
            $data['plans_premium'][$key]->price_discounted_lir = $item->lir - ($item->lir * $item->discount) / 100;
        }
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.plans', compact('data'));
    }

    public function Categories(Request $request)
    {
        $category = CategoryStore::where('slug', $request->category)->get();
        $data['shop'] = Shop::where('confirmAdmin', 1)->where('stop', 0)->where('finish_time', '>', 0)->where('category_id', $category[0]->id)->paginate(20);
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        $location = [];
        foreach ($data['shop'] as $item) {
            if($item->location != null){
                $latlong = explode(",",$item->location);
                $location[] = [
                  'name' => $item[app()->getLocale()],
                  'lat' => (float) $latlong[0],
                  'long' => (float) ltrim($latlong[1]," "),
                ];
            }
        }
        $data['location_json'] = collect($location)->toJson();
        return view('Site.shops', compact('data'));
    }

    public function Detail(Request $request)
    {
        $name = str_replace('-', ' ', $request->detail);
        $data['shop'] = Shop::where('fa', $name)->get();
        $data['menu'] = Menu::where('shop_id', $data['shop'][0]->id)->orderBy('created_at', 'desc')->limit(6)->get();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        $data['comment'] = ShopComment::where('submit', 1)->where('shop_id', $data['shop'][0]->id)->orderBy('id', 'desc')->get();
        $rank_float = 0;
        $count = 0;
        foreach ($data['comment'] as $rank) {
            $rank_float += $rank->sum;
            $count++;
        }
        if (count($data['comment']) > 0) {
            $data['rank_float'] = round($rank_float / $count, 1);
        } else {
            $data['rank_float'] = 1;
        }
        return view('Site.shop_detail', compact('data'));
    }

    public function Sign()
    {
        if (auth()->check() && auth()->user()->user_type === 'Marketer') {
            return redirect()->intended('Marketer-panel');
        } elseif (auth()->check() && auth()->user()->user_type === 'User') {
            return redirect()->intended('User-panel');
        }
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.sign');
    }

    public function about()
    {
        $data['about'] = About::all();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.about-Us', compact('data'));
    }

    public function contact()
    {
        $data = array();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.contact-Us', compact('data'));
    }

    public function Register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'user_type' => $request['type_register'] == 1 ? 'User' : 'Marketer',
            'confirm_admin' => $request['type_register'] == 1 ? 1 : 0,
            'Introduced' => $request['type_introduced'] == 1 ? '-' : $request['Introduced']
        ]);
        auth()->loginUsingId($user->id, true);
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        if ($request['type_register'] == 1) {
            return redirect('User-panel');
        } else {
            return redirect()->intended('Marketer-panel');
        }
    }

    public function Menu(Request $request)
    {
        $name = str_replace('-', ' ', $request->detail);
        $data['shop'] = Shop::where('fa', $name)->get();
        $data['menu'] = Menu::where('shop_id', $data['shop'][0]->id)->orderBy('created_at', 'desc')->get();
        $data['menuCategory'] = Menu::where('shop_id', $data['shop'][0]->id)->orderBy('created_at', 'desc')->groupBy('category_id')->get();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.menu', compact('data'));
    }

    public function MenuGetDetail(Request $request)
    {
        $id = $request->id;
        $data = Menu::where('id', $id)->get();
        $data[0]->ingredients;
        $currency = Currency::all();
        if (app()->getLocale() == "en") {
            if ($data[0]->currency == 1) {
                $data[0]->end_price = $data[0]->price - ($data[0]->price * $data[0]->discount) / 100;
                $data[0]->end_price = $currency[0]->usd / $data[0]->end_price;
                $data[0]['end_price'] = $data[0]->end_price + $currency[0]->percentage;
                $data[0]['end_price'] = ceil($data[0]['end_price']);
            }
        } elseif (app()->getLocale() == "tr") {
            if ($data[0]->currency == 1) {
                $data[0]->end_price = $data[0]->price - ($data[0]->price * $data[0]->discount) / 100;
                $data[0]->end_price = $currency[0]->try / $data[0]->end_price;
                $data[0]['end_price'] = $data[0]->end_price + $currency[0]->percentage;
                $data[0]['end_price'] = ceil($data[0]['end_price']);
            }
        } elseif (app()->getLocale() == "fa") {
            $data[0]->end_price = $data[0]->price - ($data[0]->price * $data[0]->discount) / 100;
            $data[0]->price = number_format($data[0]->price / 10);
            $data[0]->end_price = number_format($data[0]->end_price / 10);
        }
        echo json_encode($data);
    }

    public function UserPanel(Request $request)
    {
        if (!auth()->check()) {
            return redirect('Sign');
        }
        if (auth()->user()->user_type !== 'User') {
            abort(403);
        }
        $data['user'] = User::where('id', auth()->id())->get();
        $data['country'] = Country::all();
        $data['province'] = Province::all();
        $data['city'] = City::all();
        $data['shops'] = Shop::where('user_id', auth()->id())->get();
        $list_shop_id = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->where('stop', 0)->pluck('id');
        $data['ticketSubject'] = TicketSubject::where('agent_type', auth()->user()->user_type == 'User' ? "User" : 'Marketer')->get();
        foreach ($data['shops'] as $key => $item) {
            $payment = Payment::where('user_id', auth()->id())->where('shop_id', $item->id)->orderBy('created_at', 'DESC')->get();
            $data['shops'][$key]->payment_id = $payment[0]->id;
            $data['shops'][$key]->typePayment = $payment[0]->typePayment;
            $data['shops'][$key]->bank_type = $payment[0]->bank_type;
            $data['shops'][$key]->bank_order = $payment[0]->bank_order;
            $data['shops'][$key]->price = $payment[0]->price;
            $data['shops'][$key]->discount = $payment[0]->discount;
            $data['shops'][$key]->status_order = $payment[0]->status_order;
            $data['shops'][$key]->created_payment = $payment[0]->created_at;
            $data['shops'][$key]->currency = $payment[0]->currency;
        }
        $ticket_id = Ticket::where('agent_id', auth()->id())->orderBy('id', 'desc')->groupBy('parent_id')->get();
        $data['ticket_list'] = array();
        foreach ($ticket_id as $key => $item) {
            $last_ticket = Ticket::where('parent_id', $item->parent_id)->orderBy('id', 'desc')->get();
            array_push($data['ticket_list'], $last_ticket[0]);
        }
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        $data['setting'] = Setting::find(1);
        $data['food_co'] = FoodComment::whereIn('shop_id', $list_shop_id)->get();
        $data['shopcomment'] = ShopComment::whereIn('shop_id', $list_shop_id)->orderBy('id', 'desc')->get();
        return view('Site.user-panel', compact('data'));
    }

    public function MarketerPanel(Request $request)
    {
        if (!auth()->check()) {
            alert()->error('ابتدا در سایت ثبت نام کنید', 'اخطار');
            return redirect('Sign');
        }
        if (auth()->user()->user_type !== 'Marketer') {
            abort(403);
        }
        $data['setting'] = Setting::where('id', 1)->get();
        $data['marketer'] = Marketer::where('marketer_id', auth()->id())->where('transaction', '!=', 0)->get();
        $data['introduced'] = User::where('Introduced', auth()->user()->name)->orderBy('created_at')->get();
        $data['payment'] = Payment::where('marketer_id', auth()->id())->get();
        foreach ($data['payment'] as $key => $item) {
            $shop = Shop::where('id', $item->shop_id)->get();
            $data['payment'][$key]->store_name = $shop[0][app()->getLocale()];
        }
        $data['shop'] = Shop::where('creator_id', auth()->id())->get();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        $data['country'] = Country::all();
        $data['province'] = Province::all();
        $data['city'] = City::all();
        return view('Site.marketer-panel', compact('data'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (auth()->user()->user_type === 'Marketer') {
                return redirect()->intended('Marketer-panel');
            } elseif (auth()->user()->user_type === 'User') {
                return redirect()->intended('User-panel');
            } else {
                alert()->error('اطلاعات وارد شده صحیح نمیباشد', 'اخطار');
                auth()->logout();
                return redirect('Sign');
            }
        } else {
            alert()->error('اطلاعات وارد شده صحیح نمیباشد', 'اخطار');
            return back();
        }
    }

    public function Qr_view(Request $request)
    {
        $data['shop'] = Shop::find($request->shop);
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.QR-code', compact('data'));
    }

    public function SearchCategories(Request $request)
    {

    }

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

    public function property(Request $request)
    {
        $data['property'] = Property::where('slug', $request->property)->get();
        if (auth()->check() && auth()->user()->user_type == "User") {
            $data['shopNames'] = Shop::where('user_id', auth()->id())->where('confirmAdmin', 1)->get();
        }
        return view('Site.property', compact('data'));
    }

    public function Blog()
    {
        $blog = Article::where('lang',\app()->getLocale())->latest()->paginate(20);
        return view('site.blog',compact('blog'));
    }

    public function BlogArticle(Article $article)
    {
        return view('site.blogDetail',compact('article'));
    }


}

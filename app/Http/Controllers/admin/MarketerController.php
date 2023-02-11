<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Marketer;
use App\Payment;
use App\Shop;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class MarketerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data['title'] = "لیست بازاریاب";
        $data['marketerAll'] = User::where('user_type', 'Marketer')->get();
        $data['marketer'] = User::where('user_type', 'Marketer')->paginate(10);
        foreach ($data['marketerAll'] as $key => $item) {
            $shop = Shop::where('creatorType', 'Marketer')->where('creator_id', $item->id)->orderBy('created_at','desc')->get();
            if ($shop->isNotEmpty()) {
                $data['marketer'][$key]->last_activiti = $shop[0]->created_at;
            } else {
                $data['marketer'][$key]->last_activiti = 'null';
            }
        }
        return view('admin.Marketer.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data['title'] = "اضافه کردن بازاریاب";
        return view('admin.Marketer.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'Marketer',
            'confirm_admin' => 1
        ]);
        alert()->success('با موفقیت اضافه شد');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $marketer
     * @return Factory|View
     */
    public function edit(User $marketer)
    {
        $data['user'] = $marketer;
        $data['title'] = "ویرایش کردن بازاریاب";
        return view('admin.Marketer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $marketer
     * @return RedirectResponse
     */
    public function update(Request $request, User $marketer)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',Rule::unique('users')->ignore($marketer->id)],
            'Introduced' => ['required'],
        ])->validate();
        $marketer->update([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'phone' => $request['phone'],
            'Introduced' => $validation['Introduced'],
            'country' => $request['country'],
            'province' => $request['province'],
            'city' => $request['city'],
            'address' => $request['address'],
            'bank_name' => $request['bank_name'],
            'bank_num' => $request['bank_num'],
        ]);
        alert()->success('با موفقیت ویرایش شد');
        return back();
    }

    public function UpdateBanUser(Request $request)
    {
        $user_id = $request->user;
        $user = User::where('id', $user_id)->get();
        if ($user[0]->ban == 0) {
            $ban = 1;
        } else {
            $ban = 0;
        }
        User::where('id', $user_id)->update([
            'ban' => $ban
        ]);
        if ($user[0]->ban == 0) {
            alert()->success('با موفقیت بن فعال شد');
        } else {
            alert()->success('با موفقیت بن غیر فعال شد');
        }

        return back();
    }
    public function UpdateConfirmAdmin(Request $request)
    {
        $id = $request->input('id');
        $user = User::where('id', $id)->get();
        if ($user[0]->confirm_admin == 0) {
            $confirm = 1;
        } else {
            $confirm = 0;
        }
        User::where('id', $id)->update([
            'confirm_admin' => $confirm
        ]);
        echo "success";
    }
//    wallet
    public function wallet_view(Request $request)
    {
        $data['title'] = 'فعالیت های بازاریاب';
        $user = $request->input('user');
        $data['user'] = User::where('id', $user)->get();
        $data['introduced'] = User::where('Introduced', $data['user'][0]->name)->where('user_type','Marketer')->orderBy('created_at')->get();
        $data['shop'] = Shop::where('creator_id',$user)->get();
        foreach($data['shop'] as $key => $item){
            $payment = Payment::where('shop_id',$item->id)->where('typePayment',1)->orderBy('created_at','DESC')->get();
            $data['shop'][$key]->typePayment = $payment[0]->typePayment;
            $data['shop'][$key]->bank_type = $payment[0]->bank_type;
            $data['shop'][$key]->bank_order = $payment[0]->bank_order;
            $data['shop'][$key]->price = $payment[0]->price;
            $data['shop'][$key]->discount = $payment[0]->discount;
            $data['shop'][$key]->status_order = $payment[0]->status_order;
            $data['shop'][$key]->created_payment = $payment[0]->created_at;
            $data['shop'][$key]->currency = $payment[0]->currency;
        }
        $data['charge'] = Payment::where('marketer_id',$user)->where('typePayment',2)->orderBy('created_at','DESC')->get();
        foreach ($data['charge'] as $key => $item){
            $shop = Shop::where('id',$item->shop_id)->get();
            $data['charge'][$key]->store_name = $shop[0][app()->getLocale()];
        }
        $data['transaction'] = Marketer::where('marketer_id',$user)->orderBy('created_at','DESC')->get();
        return view('admin.Marketer.wallet', compact('data'));
    }

    public function wallet_update(Request $request, User $wallet)
    {
        Marketer::create([
            'marketer_id' => $wallet->id,
            'transaction' => $request->transaction,
            'about' => $request->about,
            'money' => $request->wallet,
            'percentage' => $request->percentage,
        ]);

        if($request->transaction == 1){
            $wallet_price = $wallet->wallet + $request->wallet;
        }else{
            $wallet_price = $wallet->wallet - $request->wallet;
        }
        $wallet->update([
            'percentage' => $request->percentage,
            'wallet' => $wallet_price
        ]);
        alert()->success('با موفقیت انجام شد');
        return back();
    }
}

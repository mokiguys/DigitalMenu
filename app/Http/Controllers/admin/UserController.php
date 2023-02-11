<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Payment;
use App\Shop;
use App\User;
use App\User_transaction;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
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
        $data['user'] = User::where('user_type','User')->orderBy('id','desc')->paginate(10);
        return view('admin.Users.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data['title'] = "اضافه کردن کاربر";
        return view('admin.Users.create', compact('data'));
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
            'user_type' => 'User',
            'confirm_admin' => 1
        ]);
        alert()->success('با موفقیت اضافه شد');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user_business
     * @return Factory|View
     */
    public function edit(User $user_business)
    {
        $data['user'] = $user_business;
        return view('admin.Users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user_business
     * @return RedirectResponse
     */
    public function update(Request $request, User $user_business)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',Rule::unique('users')->ignore($user_business->id)],
            'phone' => ['required'],
        ])->validate();
        $user_business->update([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'phone' => $validation['phone'],
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
        $data['title'] = 'فعالیت های صاحب کسب و کار';
        $user = $request->input('user');
        $data['user'] = User::where('id', $user)->get();
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
        $data['transaction'] = User_transaction::where('user_id',$user)->orderBy('created_at','DESC')->get();
        return view('admin.Users.wallet', compact('data'));
    }

    public function wallet_update(Request $request, User $wallet)
    {
        User_transaction::create([
            'user_id' => $wallet->id,
            'transaction' => $request->transaction,
            'about' => $request->about,
            'price' => $request->wallet,
        ]);

        if($request->transaction == 1){
            $wallet_price = $wallet->wallet + $request->wallet;
        }else{
            $wallet_price = $wallet->wallet - $request->wallet;
        }
        $wallet->update([
            'wallet' => $wallet_price
        ]);
        alert()->success('با موفقیت انجام شد');
        return back();
    }
}

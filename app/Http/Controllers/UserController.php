<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Update_User(Request $request)
    {
        User::where('id',auth()->id())->update([
           'name' => $request->name,
           'phone' => $request->phone,
           'country' => $request->country,
           'province' => $request->province,
           'city' => $request->city,
           'address' => $request->address,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

    public function ChangePassword(Request $request)
    {
        if (Hash::check($request->current_password, auth()->user()->getAuthPassword())) {
            if($request->new_password === $request->confirm_password){
                auth()->user()->update([
                    'password' => Hash::make($request->new_password),
                ]);
                alert()->success('رمز عبور شما با موفقیت تغییر کرد');
            }else{
                alert()->error('رمز عبور جدید با تکرار آن مطابقت ندارد');
            }
        }else{
            alert()->error('رمز عبور فعلی شما درست نمیباشد');
        }
        return back();
    }

    public function update_marketer(Request $request)
    {
        $user = User::where('id',auth()->id())->get();
        $validation = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255',Rule::unique('users')->ignore($user[0]->id)],
            'phone' => ['required'],
        ])->validate();

        User::where('id',auth()->id())->update([
            'name' => $validation['fullname'],
            'phone' => $validation['phone'],
            'email' => $validation['email'],
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'address' => $request->address,
            'bank_name' => $request->bank_name,
            'bank_num' => $request->bank_num,
        ]);
        alert()->success(app()->getLocale() == "fa" ? 'با موفقیت ویرایش شد' : 'Successfully Edited');
        return back();
    }

}

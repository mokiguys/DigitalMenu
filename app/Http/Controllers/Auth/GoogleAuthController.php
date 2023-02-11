<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    use TwoFactorAuth;
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $user->email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt(\Str::random(10)),
                    'user_type' => 'User',
                    'Introduced' => '-'
                ]);
            }
            auth()->loginUsingId($user->id);

            return $this->loggendin($request, $user) ?: redirect('/');

        } catch (\Exception $error) {
            alert()->error('در لاگین با گوگل  به مشکل خوردید', 'اوه اوه')->persistent('باشه');
            return redirect('/sign');
        }
    }
}

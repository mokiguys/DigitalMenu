<?php


namespace App\Http\Controllers\Auth;


use App\ActiveCode;
use Illuminate\Http\Request;

trait TwoFactorAuth
{
    public function loggendin(Request $request, $user)
    {
        if ($user->checkTwoFactorAuthTypeEnable()) {
            auth()->logout();
            $request->session()->flash('auth', [
                'user_id' => $user->id,
                'auth_sms' => false,
                'remember' => $request->has('remember'),
            ]);

            if ($user->two_factor_type == 'sms') {
                $code = ActiveCode::generateCode($user);
                $request->session()->push('auth.auth_sms', true);
            }
            return redirect(route('2fa.auth'));
        }
        return false;
    }
}

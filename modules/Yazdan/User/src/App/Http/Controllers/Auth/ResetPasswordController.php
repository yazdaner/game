<?php

namespace Yazdan\User\App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Yazdan\User\App\Http\Requests\UpdatePasswordRequest;
use Yazdan\User\Services\UserService;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm()
    {
        return view('User::front.passwords.reset');
    }

    public function update(UpdatePasswordRequest $request)
    {
        UserService::updatePassword(auth()->user(),$request->password);
        return redirect(route('home'));

    }
}

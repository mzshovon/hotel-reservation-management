<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socialRedirect($socialType)
    {
        // dd($socialType);
        return Socialite::driver($socialType)->redirect();
    }

    public function callBackSocial($socialType)
    {
        try {

            $socialUser = Socialite::driver($socialType)->user();
            $user = User::getSingleUserByParam("social_id", $socialUser->getId());

            if(!$user) {

                $userInfo = [
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'social_id' => $socialUser->getId(),
                    'social_type' => $socialType,
                ];
                $user = User::createUser($userInfo);
            }

            Auth::login($user);
            return redirect()->intended('admin/dashboard');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

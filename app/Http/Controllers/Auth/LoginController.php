<?php

namespace App\Http\Controllers\Auth;

use App\Events\ActivityLogEvent;
use App\Http\Controllers\Controller;
use App\Http\Enums\ModuleEnum;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
                    'profile_image' => $socialUser->getAvatar(),
                ];
                $user = User::createUser($userInfo);
            }

            Auth::login($user);
            event(new ActivityLogEvent(ModuleEnum::SocialLogin->value, json_encode($user), "Social Login Successfully", "social-login", $user->id));
            return redirect()->intended($this->redirectTo);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

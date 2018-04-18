<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

use Socialite;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        // dd($user);
        // $user->token;
        // User::create([
        //     'name' => $user->nickname ,
        //     'email' => $user->email,
        // ]);
        
        $authUser = User::firstOrNew(['provider_id' => $user->id]);
        
        $authUser->name = $user->nickname;
        $authUser->provider_id = $user->id;
        $authUser->email = $user->email;
        $authUser->provider = 'github';

        $authUser->save();

        auth()->login($authUser);
        return Redirect('/');
    }

}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
        $this->middleware('auth')->only('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(Str::random(length: 16)),
                ]
            );

            Auth::login($user, remember: true);

            return redirect(to: '/home');
        } catch (\Exception $e) {
            return redirect(to: '/login')->withErrors(['google_error' => 'Error iniciando sesión con Google']);
        }
    }



    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            $user = User::updateOrCreate(
                ['email' => $githubUser->getEmail()],
                [
                    'name'     => $githubUser->getName() ?? $githubUser->getNickname(),
                    'password' => bcrypt(Str::random(16)),
                    'github_id' => $githubUser->getId(),      // si tienes esta columna en tu tabla users
                    'avatar'   => $githubUser->getAvatar(),  // si quieres guardar la foto de perfil
                ]
            );

            Auth::login($user, true);

            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['github_error' => 'Error iniciando sesión con GitHub']);
        }
    }





    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::updateOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name'      => $facebookUser->getName(),
                    'password'  => bcrypt(Str::random(16)),
                    'facebook_id' => $facebookUser->getId(),     // agrega columna si la quieres usar
                    'avatar'    => $facebookUser->getAvatar(),  // guarda foto de perfil
                ]
            );

            Auth::login($user, true);

            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['facebook_error' => 'Error iniciando sesión con Facebook']);
        }
    }
}

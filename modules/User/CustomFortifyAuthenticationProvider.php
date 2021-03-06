<?php


namespace Modules\User;


use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class CustomFortifyAuthenticationProvider extends ServiceProvider
{

    public function boot()
    {

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });


        Fortify::confirmPasswordView(function () {
            return view('auth.confirm-password');
        });

        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        });


        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });
        Fortify::resetPasswordView(function () {
            return view('auth.passwords.reset');
        });

    }

    public function register()
    {
        $this->app->bind(\Laravel\Fortify\Http\Requests\LoginRequest::class, \Modules\User\Fortify\LoginRequest::class);
    }

}

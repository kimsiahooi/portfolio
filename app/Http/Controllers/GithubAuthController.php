<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'email' => $githubUser->email,
            'oauth' => 'github',
        ], [
            'name' => $githubUser->name ?? $githubUser->nickname,
            'password' => $githubUser->email,
            'oauth_id' => $githubUser->id,
            'avatar' => $githubUser->avatar,
        ]);


        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }
}

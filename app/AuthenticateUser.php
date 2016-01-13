<?php

namespace App;

use App\Repositories\UserRepository;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Auth;

class AuthenticateUser {
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var Socialite
     */
    private $socialite;

    /**
     * AuthenticateUser constructor.
     * @param UserRepository $users
     * @param Socialite $socialite
     * @param Authenticatable $auth
     */
    public function __construct(UserRepository $users, Socialite $socialite)
    {

        $this->users = $users;
        $this->socialite = $socialite;
    }

    public function execute($hasCode)
    {
        if (!$hasCode) return $this->getAuthFirst();

        $user = $this->users->findByEmailOrCreate($this->getGithubUser());

        Auth::loginUsingId($user->id, true);

        return redirect('/profile');
    }

    private function getAuthFirst()
    {
        return $this->socialite->driver('github')->redirect();
    }

    private function getGitHubUser()
    {
        return $this->socialite->driver('github')->user();
    }
}
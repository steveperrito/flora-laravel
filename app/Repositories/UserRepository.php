<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function findByEmailOrCreate($userData)
    {
        $user =  User::firstOrNew([
            'email' => $userData->email
        ]);

        if (!$user->exists) {
            $name = $this->splitName($userData->name);

            $user->f_name = $name[0];;
            $user->l_name = $name[1];;
            $user->save();
        }

        return $user;
    }

    private function splitName($spacedName)
    {
        $broke_up = explode(' ', $spacedName);
        $first = $broke_up[0];
        $last = implode(' ', array_slice($broke_up, 1));

        return [$first, $last];
    }
}
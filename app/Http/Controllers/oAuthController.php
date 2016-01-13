<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AuthenticateUser;
use App\Http\Controllers\Controller;

class oAuthController extends Controller
{
    public function gitLogin(AuthenticateUser $authUser, Request $request) {
        return $authUser->execute($request->has('code'));
    }
}

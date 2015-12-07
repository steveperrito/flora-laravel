<?php

namespace App\Http\Controllers;

use App\FloraObserve;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Auth user
     *
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Check if user is admin and dump all results.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dash()
    {
        if (Auth::user()->is_admin){
            $observations = FloraObserve::with('soil', 'contributor')->get();

            return view('admin.dash', compact('observations'));
        }

        abort(401, 'Unauthorized request.');
    }
}

<?php

namespace App\Http\Controllers;

use App\FloraObserve;
use App\User;
use Illuminate\Contracts\View\Factory;
use Auth;

use App\Http\Requests;

class AdminController extends Controller
{

    /**
     * Authorize user
     *
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Authorize admin user and pass data to Dashboard.
     *
     * @return Factory|\Illuminate\View\View
     */
    public function dash()
    {
        if (Auth::user()->is_admin){
            $view_var['observations'] = FloraObserve::with(['soil', 'contributor' => function($q) {
                $q->with('profile');
            }])->get();
            $view_var['all_observations'] = FloraObserve::count();
            $view_var['all_users'] = User::count() - 1;
            $view_var['guest_observes'] = FloraObserve::where('user_id', '=', 2)->count();

            return view('admin.dash', $view_var);
        }

        abort(401, 'Unauthorized request.');
    }
}

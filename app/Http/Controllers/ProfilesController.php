<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    /**
     * Must be authorized user.
     *
     * ProfilesController constructor.
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Update or save new profile.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $input = $request->all();

        $profile = Profile::where('user_id', '=', \Auth::user()->id)->first();

        if ($profile) {
            $profile->update($input);
        }

        else {
            $input = new Profile($input);
            \Auth::user()->profile()->save($input);
        }

        return redirect()->action('ProfilesController@show');
    }

    /**
     * Show user
     *
     * @return mixed
     */
    public function show()
    {
        $profile = Profile::where('user_id', '=', \Auth::user()->id)->first();

        return view('profile.show', ['profile' => $profile]);
    }
}

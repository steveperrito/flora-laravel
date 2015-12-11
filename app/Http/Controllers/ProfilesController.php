<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;

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
        $id = Auth::user()->id;
        $input = $request->all();

        $profile = Profile::where('user_id', '=', $id)->first();

        if ($profile) {
            $profile->update($input);
        }

        else {
            $input = new Profile($input);
            Auth::user()->profile()->save($input);
        }

        return redirect()->action('ProfilesController@index');
    }

    /**
     * Allow admin to update specific profile.
     *
     * @param $id
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function sudoUpdate($id, ProfileRequest $request)
    {
        $input = $request->all();
        $profile = Profile::find($id);
        $profile->update($input);

        return redirect('profile/' . $id);
    }

    /**
     * Show logged in user's profile.
     *
     * @return mixed
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = Profile::where('user_id', '=', $user_id)->first();
        $nulls = 0;
        $no_val_html = '<a href="#myProfileModal" data-toggle="modal" role="button"><span class="glyphicon glyphicon-question-sign text-danger"></span></a>';

        if ($profile['attributes']) {
            $prof_attrs = count($profile['attributes']) - 4;
            foreach($profile['attributes'] as $attr) {
                if($attr == null) {
                    $nulls += 1;
                }
            }

            $nulls = number_format((($prof_attrs - $nulls)/$prof_attrs)*100, 0);
        }

        return view('profile.show', ['profile' => $profile, 'nulls' => $nulls, 'no_val' => $no_val_html]);
    }

    /**
     * Allow Admin to see specific profile
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $is_admin = Auth::user()->is_admin;
        $user_id = Auth::user()->id;
        $profile = Profile::with('user')
                    ->where('id', '=', $id)
                    ->first();
        $nulls = 0;
        $no_val_html = '<a href="#myProfileModal" data-toggle="modal" role="button"><span class="glyphicon glyphicon-question-sign text-danger"></span></a>';

        if ($profile['attributes']) {
            $prof_attrs = count($profile['attributes']) - 4;
            foreach($profile['attributes'] as $attr) {
                if($attr == null) {
                    $nulls += 1;
                }
            }

            $nulls = number_format((($prof_attrs - $nulls)/$prof_attrs)*100, 0);
        }

        if (($user_id == $id || $is_admin) && $profile) {
            return view('profile.show', ['profile' => $profile, 'nulls' => $nulls, 'no_val' => $no_val_html]);
        }

        abort(401, 'Unauthorized request.');
    }
}

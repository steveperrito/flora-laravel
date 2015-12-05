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

        /*dd($nulls);*/

        return view('profile.show', ['profile' => $profile, 'nulls' => $nulls, 'no_val' => $no_val_html]);
    }
}

<?php

namespace App\Http\Controllers;

use App\FloraObserve;
use App\SoilType;
use App\User;

use App\Http\Requests\ObservationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ObservationController extends Controller
{
  /**
   * ObservationController constructor.
   * Adds middle where
   */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

  /**
   * list out all observations
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function index()
    {
      $observations = FloraObserve::with('soil', 'contributor')
          ->where('user_id', '=', \Auth::user()->id)
          ->get();

      return view('observation.list', compact('observations'));
    }

  /**
   * show observation submit form
   *
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function create()
    {
      $check = \Auth::check();
      $usr = \Auth::user();
      $view_data = [
        'select' => $select = SoilType::lists('SoilType', 'id'),
        'fname' => $first = $check ? $usr->f_name : null,
        'lname' => $last = $check ? $usr->l_name : null
      ];

      return view('observation.create', $view_data);
    }

  /**
   * Save submitted observation...
   *
   * @param ObservationRequest $request
   * @return \Illuminate\Http\RedirectResponse
   */
    public function store(ObservationRequest $request)
    {
      $input = $request->all();
      $observation_time = $input['observed_at'] . '|' . $input['observed_at_hr'] . '|' . $input['am_pm'];
      $input = new FloraObserve($input);
      $input->observed_at = $observation_time;

      if (\Auth::check()) {
        \Auth::user()->observations()->save($input);
      }

      else {
        User::find(2)->observations()->save($input);
      }

      return redirect()->action('ObservationController@show', [$input->id]);
    }

  /**
   * Show 'edit observation' form...
   *
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function edit($id)
    {
      $select = SoilType::lists('SoilType', 'id');
      $observation = FloraObserve::findOrFail($id);

      if ($observation->user_id == \Auth::user()->id) {
        return view('observation.edit', ['observation' => $observation, 'select' => $select]);
      }

      else {
        abort(401, 'Unauthorized request.');
      }
    }

  /**
   * Persist updated observation to DB...
   *
   * @param $id
   * @param ObservationRequest $request
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
    public function update($id, ObservationRequest $request)
    {
      $observation = FloraObserve::findOrFail($id);

      if ($observation->user_id == \Auth::user()->id) {
        $input = $request->all();
        $observation_time = $input['observed_at'] . '|' . $input['observed_at_hr'] . '|' . $input['am_pm'];
        $observation->observed_at = $observation_time;
        $observation->update($input);

        return redirect('observations/' . $id);
      }

      else {
        abort(401, 'Unauthorized request.');
      }
    }

  /**
   * Show specific observation given $id
   *
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
    public function show($id)
    {
      $observation = FloraObserve::with('soil')->findOrFail($id);

      if ($observation->user_id == \Auth::user()->id) {
        return view('observation.show', compact('observation'));
      }

      else {
        abort(401, 'Unauthorized request.');
      }
    }
}

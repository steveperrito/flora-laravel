<?php

namespace App\Http\Controllers;

use App\FloraObserve;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dash()
    {
      $observations = FloraObserve::with('soil', 'contributor')->get();

      return view('admin.dash', compact('observations'));
    }
}

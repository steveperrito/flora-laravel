<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoilType extends Model
{
  protected $table = 'SoilTypes';

  public function observations()
  {
    return $this->hasMany('App\FloraObserve');
  }
}
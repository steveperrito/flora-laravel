<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FloraObserve extends Model
{
    /**
     * Can be mass-assigned.
     *
     * @var array
     */
    protected $fillable = [
        'ObserverNameF',
        'ObserverNameL',
        'PlantName',
        'PlantLocation',
        'ObservationLat',
        'ObservationLng',
        'WeatherConditions',
        'Temp',
        'SoilType',
        'Notes',
        'in_field',
        'observed_at'
    ];

    /**
     * Recognize attributes as Carbon instances.
     *
     * @var array
     */
    protected $dates = ['observed_at'];

    /**
     * Table to reference in DB
     *
     * @var string
     */
    protected $table = 'FloraObserves';

    /**
     * Make sure Lat gets a value of null if not used.
     *
     * @param $lat
     */
    protected function setObservationLatAttribute($lat)
    {
        $this->attributes['ObservationLat'] = trim($lat) !== '' ? trim($lat) : null;
    }

    /**
     *  Make sure Lng gets a value of null if not used.
     *
     * @param $lng
     */
    protected function setObservationLngAttribute($lng)
    {
        $this->attributes['ObservationLng'] = trim($lng) !== '' ? trim($lng) : null;
    }

    /**
     * Defines relationship with SoilType table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soil()
    {
        return $this->belongsTo('App\SoilType', 'SoilType');
    }

    /**
     * Defines relationship with users table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contributor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

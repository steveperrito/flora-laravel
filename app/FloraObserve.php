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
        'in_field'
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
     * Compose observed_at data.
     *
     * @param $date_str
     */
    protected function setObservedAtAttribute($date_str)
    {
        $date_str = explode('|', $date_str);
        $this->attributes['observed_at'] = Carbon::createFromFormat('Y-m-d h:i:s A', $date_str[0] . ' ' . $date_str[1] . ':00 ' . $date_str[2])->toDateTimeString();
    }

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

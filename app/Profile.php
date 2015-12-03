<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Table to reference in DB
     *
     * @var string
     */
    protected $table = 'Profiles';

    /**
     * Attributes that are mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street',
        'city',
        'state',
        'post_code',
        'country',
        'phone',
        'website',
        'facebook',
        'twitter'
    ];

    /**
     * Ensure null is stored instead of ''.
     *
     * @param $street
     */
    protected function setStreetAttribute($street)
    {
        $this->attributes['street'] = trim($street) !== '' ? trim($street) : null;
    }

    protected function setCityAttribute($city)
    {
        $this->attributes['city'] = trim($city) !== '' ? trim($city) : null;
    }

    protected function setStateAttribute($state)
    {
        $this->attributes['state'] = trim($state) !== '' ? trim($state) : null;
    }

    protected function setPostCodeAttribute($post_code)
    {
        $this->attributes['post_code'] = trim($post_code) !== '' ? trim($post_code) : null;
    }

    protected function setCountryAttribute($country)
    {
        $this->attributes['country'] = trim($country) !== '' ? trim($country) : null;
    }

    protected function setPhoneAttribute($phone)
    {
        $this->attributes['phone'] = trim($phone) !== '' ? trim($phone) : null;
    }

    protected function setWebsiteAttribute($website)
    {
        $this->attributes['website'] = trim($website) !== '' ? trim($website) : null;
    }

    protected function setFacebookAttribute($facebook)
    {
        $this->attributes['facebook'] = trim($facebook) !== '' ? trim($facebook) : null;
    }

    protected function setTwitterAttribute($twitter)
    {
        $this->attributes['twitter'] = trim($twitter) !== '' ? trim($twitter) : null;
    }

    /**
     * 1-to-1 relationship with users table (belongsTo).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

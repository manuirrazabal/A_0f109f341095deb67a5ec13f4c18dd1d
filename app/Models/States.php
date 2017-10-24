<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_states";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "id";

    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_name',
        'state_number',
        'state_country_id',
        'state_active',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'state_country_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\Cities', 'city_state_id', 'id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */

     /**
     * List States by Country.
     *
     * @param array
     * @return Boolean
     */
    public function listStatesByCountry($country)
    {
        return $this->where('state_country_id', $country)->get();
    }

}

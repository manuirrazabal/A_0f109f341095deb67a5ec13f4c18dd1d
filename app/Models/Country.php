<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_country";

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
        'country_code',
        'country_name',
        'country_active',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function states()
    {
        return $this->hasMany('App\Models\States', 'state_country_id', 'id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */
}

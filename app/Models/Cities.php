<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_cities";

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
        'city_name',
        'city_code',
        'city_state_id',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function states()
    {
        return $this->belongsTo('App\Models\States', 'city_state_id', 'id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */

     /**
     * List State Father from City Id
     *
     * @param Integer city_id
     * @return Integer
     */
    public function listStateFather($id)
    {
        return $this->where('id', $id)->first()->city_state_id;
    }

     /**
     * List Cities From States
     *
     * @param Integer id
     * @return Array
     */
    public function listCitiesByState($id)
    {
        return $this->where('city_state_id', $id)->select('city_name', 'id')->get();
    }
}

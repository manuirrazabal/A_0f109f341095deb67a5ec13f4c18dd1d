<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    
	/**
     * Included model traits
     */
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_business";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "business_id";

    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_name',
        'business_address',
        'business_city',
        'business_phone',
        'business_mail',
        'business_postalcode',
        'business_cat_id',
        'bdetail_schedulle',
        'bdetail_detail',
        'bdetail_more_info',
        'business_active',
        'business_user_id',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function businessImages()
    {
        return $this->hasMany('App\Models\BusinessImages', 'bimages_business_id', 'business_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'business_user_id', 'user_id');
    }
}

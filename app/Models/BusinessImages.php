<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessImages extends Model
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
    protected $table        = "an_business_images";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "bimages_id";

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
        'bimages_business_id',
        'bimages_route',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function business()
    {
        return $this->belongsTo('App\Models\BusinessImages', 'bimages_business_id', 'business_id');
    }
}

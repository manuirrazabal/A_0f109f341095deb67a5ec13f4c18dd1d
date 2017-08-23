<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_subcategories";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "scat_id";

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
        'scat_cat_id',
        'scat_description',
        'scat_order',
        'scat_active',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'scat_cat_id', 'cat_id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */
}

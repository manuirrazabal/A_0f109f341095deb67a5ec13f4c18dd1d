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
        'scat_slug',
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

    /**
     * Get Category by their subcategory
     *
     * @param Integer $id
     * @return Integer Scat_cat_id
     */
    public function getCategoryFather($id)
    {
        return $this->where('scat_id', $id)->first()->scat_cat_id;
    }

    /**
     * Get SubCategory by their category id
     *
     * @param Integer $id
     * @return Array
     */
    public function getSubcatoryById($id)
    {
        return $this->where('scat_cat_id', $id)->orderBy('scat_order')->get();
    }

    /**
     * Get SubCategory information by their sulg
     *
     * @param String $slug
     * @return Array
     */
    public function getSubcategoryInformationBySlug($slug)
    {
        return $this->where('scat_slug', $slug)->with('category')->first();
    }
}

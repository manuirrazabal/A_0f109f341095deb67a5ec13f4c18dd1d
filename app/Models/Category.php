<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_categories";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "cat_id";

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
        'cat_description',
        'cat_slug',
        'cat_order',
        'cat_active',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory', 'scat_cat_id', 'cat_id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */

    public function getCategoriesAll()
    {
        return $this->where('cat_active', 1)->with('subcategories')->get();
    }


     public function getCategoriesById($slug)
    {
        return $this->where('cat_slug', $slug)->with('subcategories')->first();
    }
}

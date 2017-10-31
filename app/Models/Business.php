<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


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

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */

    /**
     * Get all ACTIVES from specific user..
     *
     * @param integer id
     * @return object
     */
    public function getBusiness($id)
    {
        return $this->where('business_user_id', $id)->where('business_active', 1)->get();
    }

    /**
     * Get all INACTIVES business from specific user..
     *
     * @param integer id
     * @return object
     */
    public function getBusinessInactives($id)
    {
        return $this->where('business_user_id', $id)->where('business_active', 0)->get();
    }
   

    /**
     * Get a specific business from an user..
     *
     * @param integer id user
     * @param integer idBusiness 
     * @return object
     */
    public function getBusinessById($id, $idBusiness)
    {
        return $this->where('business_user_id', $idBusiness)->findOrFail($id);
    }


    /**
     * ADD  a new business
     *
     * @param array data
     * @return object
     */
    public function addBusiness($data)
    {
        try {
            $business = $this->create($data);

            $resp['ok'] = true;
            $resp['id'] = $business->business_id;

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }
        return $resp;
    }


    /**
     * Update a business
     *
     * @param array Data
     * @param integer id
     * @return Boolean
     */
    public function updateBusiness(array $data = [], $id)
    {
        try {
            $user = $this->where('business_id', $id)->update($data);
            $resp['ok'] = true;

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }
        
        return $resp;
    }

    /**
     * DELETE a business
     *
     * @param array Data
     * @param integer id
     * @return Boolean
     */
    public function deleteBusiness($id, $iduser)
    {
        try {
            $business = $this->where('business_id', $id)->where('business_user_id', $iduser)->delete();

            //Successfull Delete.
            if ($business == 1) {
                
            }

            // For the moment delete only images. 
            $resp['ok'] = true;

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }
        
        return $resp;
    }

     /**
     * Get the number of  business created from specific user..
     *
     * @param integer id
     * @return object
     */
    public function countBusiness($id)
    {
        return $this->where('business_user_id', $id)->count();
    }


    /**
     * ACTIVATE/INACTIVATE business from specific user..
     *
     * @param integer id
     * @param integer flag (status)
     * @return object
     */
    public function activateBusiness($id, $flag)
    {
        try {
            $this->where('business_id', $id)->update(['business_active' => $flag]);
            $resp['ok'] = true;

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }
        
        return $resp;
    }

     /**
     * Get the last business by category. Max 10.
     *
     * @param integer id
     * @return object
     */
    public function lastCreatedByCategory($cat)
    {
        return  DB::table('an_business')
                ->leftJoin('an_subcategories', 'an_business.business_cat_id', '=', 'an_subcategories.scat_id')
                ->leftJoin('an_categories',    'an_categories.cat_id', '=', 'an_subcategories.scat_cat_id')
                ->leftJoin('an_business_images',  'an_business.business_id', '=', 'an_business_images.bimages_business_id')
                ->leftJoin('an_cities',    'an_business.business_city', '=', 'an_cities.id')
                ->where('an_subcategories.scat_cat_id', $cat)
                ->where('an_business.business_active', 1)
                ->orderBy('an_business.created_at', 'DESC')
                ->limit(10)
                ->get();


    }

}

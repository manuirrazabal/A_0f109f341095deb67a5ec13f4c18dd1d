<?php

namespace App\Models;

use App\Models\BusinessImages;
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
        'business_slug',
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

    // Business Images Relation
    public function businessImages()
    {
        return $this->hasMany('App\Models\BusinessImages', 'bimages_business_id', 'business_id');
    }

    // Subcategories Relations.
    public function subcategory()
    {
        return $this->hasMany('App\Models\Subcategory', 'scat_id', 'business_cat_id');
    }

    // City Relations.
    public function city()
    {
        return $this->hasMany('App\Models\Cities', 'id', 'business_city');
    }

    // Users Relations
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
        try {
            $resp = DB::table('an_business')
                ->join('an_subcategories', 'an_business.business_cat_id', '=', 'an_subcategories.scat_id')
                ->join('an_categories',    'an_categories.cat_id', '=', 'an_subcategories.scat_cat_id')
                ->join('an_cities',  'an_cities.id', '=', 'an_business.business_city')
                ->where('an_business.business_active', 1)
                ->where('an_subcategories.scat_cat_id', $cat)
                ->latest('an_business.created_at')
                ->limit(10)
                ->get();

            // Adding Images
            foreach ($resp as $key => $value) {
                $image = BusinessImages::where('bimages_business_id', $value->business_id)->first();
                if ($image) {
                    $value->bimage_id       = $image->bimages_id;
                    $value->bimages_route   = $image->bimages_route;
                }
            }

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }

        return  $resp;
    }

    /**
     * Get the last business by category. Max 10.
     *
     * @param integer id
     * @return object
     */
    public function lastCreatedBusiness()
    {
        try {
            $resp = DB::table('an_business')
                ->join('an_subcategories', 'an_business.business_cat_id', '=', 'an_subcategories.scat_id')
                ->join('an_categories',    'an_categories.cat_id', '=', 'an_subcategories.scat_cat_id')
                ->join('an_cities',  'an_cities.id', '=', 'an_business.business_city')
                ->where('an_business.business_active', 1)
                ->latest('an_business.created_at')
                ->limit(12)
                ->get();

            // Adding Images
            foreach ($resp as $key => $value) {
                $image = BusinessImages::where('bimages_business_id', $value->business_id)->first();
                if ($image) {
                    $value->bimage_id       = $image->bimages_id;
                    $value->bimages_route   = $image->bimages_route;
                }
            }

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }

        return  $resp;
    }


     /**
     * Get All bussines from subcategory
     *
     * @param integer id
     * @return object
     */
    public function getBusinessBySubcat($cat)
    {
        try {
            $resp = DB::table('an_business')
                ->join('an_cities',  'an_cities.id', '=', 'an_business.business_city')
                ->where('an_business.business_active', 1)
                ->where('an_business.business_cat_id', $cat)
                ->latest('an_business.created_at')
                ->get();

            // Adding Images
            foreach ($resp as $key => $value) {
                $image = BusinessImages::where('bimages_business_id', $value->business_id)->first();
                if ($image) {
                    $value->bimage_id       = $image->bimages_id;
                    $value->bimages_route   = $image->bimages_route;
                }
            }

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }

        return  $resp;
    }

    /**
     * Get a business by slug
     *
     * @param integer id
     * @return object
     */
    public function getBusinessbySlug($slug)
    {
        return $this->where('business_slug', $slug)
                ->where('business_active', 1)
                ->with(['businessImages', 'subcategory', 'city'])
                ->first();
    }

    /**
     * Get a list of business by name
     *
     * @param array filter
     * @return object
     */
    public function getSearchByName($filter)
    {
       try {
            $filter = (object) $filter;
            $query = DB::table('an_business')
                    ->join('an_subcategories', 'an_business.business_cat_id', '=', 'an_subcategories.scat_id')
                    ->join('an_categories',    'an_categories.cat_id', '=', 'an_subcategories.scat_cat_id')
                    ->join('an_cities',  'an_cities.id', '=', 'an_business.business_city')
                    ->where('an_business.business_name', 'LIKE', '%'.$filter->q.'%');

            if (isset($filter->category)){
                $query->where('an_categories.cat_id', $filter->category);
            }

            if (isset($filter->location)) {
                $query->where('an_cities.city_state_id', $filter->location);
            }

            $resp = $query->latest('an_business.created_at')->paginate($filter->pagination);
            

            // Adding Images
            foreach ($resp as $key => $value) {
                $image = BusinessImages::where('bimages_business_id', $value->business_id)->first();
                if ($image) {
                    $value->bimage_id       = $image->bimages_id;
                    $value->bimages_route   = $image->bimages_route;
                }
            }

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }

        return  $resp;
    }

}

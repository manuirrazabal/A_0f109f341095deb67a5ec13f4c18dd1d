<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
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
    protected $table        = "an_users";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "user_id";

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
        'user_name',
        'user_lastname',
        'user_email',
        'user_password',
        'user_phone',
        'user_active',
        'user_type_id',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password', 'remember_token',
    ];

    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function business()
    {
        return $this->hasMany('App\Models\Business', 'business_user_id', 'user_id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */
}

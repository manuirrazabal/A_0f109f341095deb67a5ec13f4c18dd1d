<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Session;

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

    public function usertypes()
    {
        return $this->belongsTo('App\Models\UserTypes', 'user_type_id', 'user_type_id');
    }

    /*
    |------------------------------------------------
    | Model general methods
    |------------------------------------------------
    */

    /**
     * Create an user from form
     *
     * @var array
     * @return Bolean
     */
    public function createUser(array $data = [])
    {
        try {
            $user = $this->create($data);

            if (Session::has('userInfo')) {
                Session::forget('userInfo');
            } else {
                Session::put('userInfo', json_encode($user));
            }

            $resp['ok'] = true;

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }
        
        return $resp;
    }

    public function loginUser($user, $password)
    {
        try {
            $user = $this->where('user_email', $user)->where('user_password', $password)->first();
            if (!empty($user)) {
                $resp['ok'] = true;

                if (Session::has('userInfo')) {
                    Session::forget('userInfo');
                } else {
                    Session::put('userInfo', json_encode($user));
                }
            } else {
                $resp['ok'] = false;
                $resp['error'] = "Credenciales incorrectas";
            }

        }  catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }

        return $resp;
    }
}

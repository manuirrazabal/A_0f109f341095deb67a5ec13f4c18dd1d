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
     * @param array
     * @return Boolean
     */
    public function createUser(array $data = [])
    {
        try {
            $user = $this->create($data);

            // Delete some data from array. 
            unset($user['user_password']);
            unset($user['created_at']);
            unset($user['updated_at']);
            unset($user['deleted_at']);
            unset($user['user_type_id']);

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

    /**
     * Update an user
     *
     * @param array Data
     * @param integer id
     * @return Boolean
     */
    public function updateUser(array $data = [], $id)
    {
        try {
            $user = $this->where('user_id', $id)->update($data);
            $resp['ok'] = true;

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }
        
        return $resp;
    }

    /**
     * GET user information from id 
     *
     * @param integer id
     * @return Boolean
     */
    public function getUserId($id)
    {
        return $this->findOrFail($id)->first();;
    }


    /**
     * Login an user.
     *
     * @param String $user
     * @param String $password
     * @return Boolean
     */
    public function loginUser($user, $password)
    {
        try {
            $user = $this->where('user_email', $user)->where('user_password', $password)->first();
            if (!empty($user)) {
                $resp['ok'] = true;

                // Delete some data from array. 
                unset($user['user_password']);
                unset($user['created_at']);
                unset($user['updated_at']);
                unset($user['deleted_at']);
                unset($user['user_type_id']);
                
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

     /**
     * Change password an user.
     *
     * @param Integer $id
     * @param String $password
     * @return Boolean
     */
    public function changePasswordUser($id, $password)
    {
        try {
             $user = $this->where('user_id', $id)->update(['user_password' => $password]);
            if (!empty($user)) {
                $resp['ok'] = true;
                
            } else {
                $resp['ok'] = false;
                $resp['error'] = "Credenciales incorrectas";
            }

        } catch (\Exception $e) {
            $resp['ok'] = false;
            $resp['error'] = $e->getMessage();
        }

         return $resp;
    }

    /**
     * Check if the password is the same like the user has.
     *
     * @param Integer $id
     * @param String $password
     * @return Boolean
     */
    public function checkPassword($id, $password)
    {
        try {
             $user = $this->where('user_id', $id)->where('user_password', $password)->first();
            if (!empty($user)) {
                return true;
                
            } else {
                return false;
            }

        } catch (\Exception $e) {
            return false;
        }
    }
}

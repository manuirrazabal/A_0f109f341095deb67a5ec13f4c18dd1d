<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table        = "an_users_type";

    /**
     * Table primary Kkey
     *
     * @var string
     */
    protected $primaryKey   = "user_type_id";

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
        'user_type_description',
    ];


    /*
    |------------------------------------------------
    | Relationships
    |------------------------------------------------
    */

    public function users()
    {
        return $this->hasMany('App\Models\Users', 'user_type_id', 'user_type_id');
    }
}

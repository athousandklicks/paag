<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @package App\Models
 * @version May 2, 2019, 1:49 pm UTC
 *
 * @property string name
 * @property integer role_id
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class User extends Model
{
    use SoftDeletes;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'role_id',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'role_id' => 'integer',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */


    public static $rules = [
//        'role_id' => 'required',
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
       // 'password' => ['required', 'string', 'min:8'],
    ];

    public function products()
    {
       // return $this->hasMany('App\Models\Transaction');
        return $this->hasMany(Product::class);
    }

    public function vendors()
    {
        return $this->hasOne('App\Models\Vendor');
       // return $this->belongsTo(Vendor::class);
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get the account record associated with the user.
     */
    public function account()
    {
        return $this->hasOne('App\Models\Account');
    }

    public function account_histories()
    {
        return $this->hasMany('App\Models\AccountHistory');
    }


}

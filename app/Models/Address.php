<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package App\Models
 * @version May 2, 2019, 1:34 pm UTC
 *
 * @property integer user_id
 * @property string firstname
 * @property string lastname
 * @property string address1
 * @property string address2
 * @property string town
 * @property string city
 * @property string postcode
 * @property string state
 * @property string country
 * @property string phone
 * @property string email
 */
class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'address1',
        'address2',
        'town',
        'city',
        'postcode',
        'state',
        'country',
        'phone',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'town' => 'string',
        'city' => 'string',
        'postcode' => 'string',
        'state' => 'string',
        'country' => 'string',
        'phone' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'address1' => 'required',
        'address2' => 'required',
        'town' => 'required',
        'city' => 'required',
        'postcode' => 'required',
        'state' => 'required',
        'country' => 'required',
        'phone' => 'required',
        'email' => 'required'
    ];

    
}

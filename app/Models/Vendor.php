<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vendor
 * @package App\Models
 * @version May 3, 2019, 9:31 am UTC
 *
 * @property integer user_id
 * @property integer role_id
 * @property string phone
 * @property string country
 * @property string flag
 * @property string avatar
 * @property string bio
 * @property string dob
 * @property string education
 * @property string awards
 * @property string experience
 * @property string exhibitions
 * @property string mentors
 * @property boolean status
 */
class Vendor extends Model
{
    use SoftDeletes;

    public $table = 'vendors';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'role_id',
        'phone',
        'country',
        'flag',
        'avatar',
        'bio',
        'dob',
        'education',
        'awards',
        'experience',
        'exhibitions',
        'mentors',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'role_id' => 'integer',
        'phone' => 'string',
        'country' => 'string',
        'flag' => 'string',
        'avatar' => 'string',
        'bio' => 'string',
        'dob' => 'string',
        'education' => 'string',
        'awards' => 'string',
        'experience' => 'string',
        'exhibitions' => 'string',
        'mentors' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'role_id' => 'required',
        'phone' => 'required'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }


}

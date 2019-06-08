<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sign_Location
 * @package App\Models
 * @version May 2, 2019, 1:45 pm UTC
 *
 * @property string name
 */
class Sign_Location extends Model
{
    use SoftDeletes;

    public $table = 'sign_location';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }


}

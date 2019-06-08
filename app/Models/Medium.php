<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medium
 * @package App\Models
 * @version May 2, 2019, 1:41 pm UTC
 *
 * @property string name
 */
class Medium extends Model
{
    use SoftDeletes;

    public $table = 'mediums';

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
        return $this->belongsToMany('App\Models\Medium', 'medium_product', 'medium_id', 'product_id');
    }


}

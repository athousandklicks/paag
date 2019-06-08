<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Style
 * @package App\Models
 * @version May 2, 2019, 1:45 pm UTC
 *
 * @property string name
 */
class Style extends Model
{
    use SoftDeletes;

    public $table = 'styles';

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
        return $this->belongsToMany('App\Models\Style', 'product_style', 'style_id', 'product_id');
    }


}

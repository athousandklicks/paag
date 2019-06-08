<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Artist
 * @package App\Models
 * @version May 2, 2019, 1:39 pm UTC
 *
 * @property integer user_id
 * @property integer role_id
 * @property string name
 * @property string about
 * @property string cv
 * @property string exhibitions
 * @property string mentors
 * @property string tags
 * @property string image
 */
class Artist extends Model
{
    use SoftDeletes;

    public $table = 'artists';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'role_id',
        'name',
        'about',
        'cv',
        'exhibitions',
        'mentors',
        'tags',
        'image'
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
        'name' => 'string',
        'about' => 'string',
        'cv' => 'string',
        'exhibitions' => 'string',
        'mentors' => 'string',
        'tags' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'role_id' => 'required',
        'name' => 'required',
        'about' => 'required',
        'cv' => 'required',
        'exhibitions' => 'required',
        'mentors' => 'required',
        'tags' => 'required'
    ];

    
}

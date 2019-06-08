<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version May 2, 2019, 1:43 pm UTC
 *
 * @property integer user_id
 * @property string product_name
 * @property string sku
 * @property string artist
 * @property float amount
 * @property string brief_description
 * @property string full_description
 * @property string dimension_description
 * @property string type
 * @property string support_type
 * @property string height
 * @property string width
 * @property string depth
 * @property string weight
 * @property string year_created
 * @property boolean hangable
 * @property boolean frame
 * @property boolean sign
 * @property boolean signature_location
 * @property string callback_url
 * @property string city
 * @property string country
 * @property string image_fullview
 * @property string image_leftside
 * @property string image_rightside
 * @property string image_back
 * @property string image_hanged
 * @property string image_gallery
 * @property string video
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'product_name',
        'sku',
        'artist',
        'amount',
        'brief_description',
        'full_description',
        'dimension_description',
        'type',
        'support_type',
        'height',
        'width',
        'depth',
        'weight',
        'year_created',
        'hangable',
        'frame',
        'sign',
        'signature_location',
        'callback_url',
        'city',
        'country',
        'image_fullview',
        'image_leftside',
        'image_rightside',
        'image_back',
        'image_hanged',
        'image_gallery',
        'video'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_name' => 'string',
        'sku' => 'string',
        'artist' => 'string',
        'amount' => 'float',
        'brief_description' => 'string',
        'full_description' => 'string',
        'dimension_description' => 'string',
        'type' => 'string',
        'support_type' => 'string',
        'height' => 'string',
        'width' => 'string',
        'depth' => 'string',
        'weight' => 'string',
        'year_created' => 'string',
        'hangable' => 'boolean',
        'frame' => 'boolean',
        'sign' => 'boolean',
        'signature_location' => 'string',
        'callback_url' => 'string',
        'city' => 'string',
        'country' => 'string',
        'image_fullview' => 'string',
        'image_leftside' => 'string',
        'image_rightside' => 'string',
        'image_back' => 'string',
        'image_hanged' => 'string',
        'image_gallery' => 'string',
        'video' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'product_name' => 'required',
        'amount' => 'required',
        'artist' => 'required',
        'brief_description' => 'required',
        'full_description' => 'required',
        'dimension_description' => 'required',
        'type' => 'required',
        'support_type' => 'required',
        'height' => 'required',
        'width' => 'required',
        'depth' => 'required',
        'weight' => 'required',
        'year_created' => 'required'
    ];

    public function artists()
    {
        return $this->belongsTo(Artist::class);
    }

    public function frames()
    {
        return $this->belongsTo(Frame::class);
    }

    public function hangs()
    {
        return $this->belongsTo(Hang::class);
    }

    public function signs()
    {
        return $this->belongsTo(Sign::class);
    }

    public function sign_locations()
    {
        return $this->belongsTo(Sign_Location::class);
    }

    public function supports()
    {
        return $this->belongsTo(Support::class);
    }

    public function countries()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function types()
    {
        return $this->belongsTo(Type::class);
        // return $this->belongsToMany('App\Models\Type', 'product_type', 'product_id', 'type_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tag', 'product_id', 'tag_id');
    }

    public function styles()
    {
        return $this->belongsToMany('App\Models\Style', 'product_style', 'product_id', 'style_id');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject', 'product_subject', 'product_id', 'subject_id');
    }

    public function mediums()
    {
        return $this->belongsToMany('App\Models\Medium', 'medium_product', 'product_id', 'medium_id');
    }

    /**
     * Get the transactions for the product.
     */
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function product_owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }



}

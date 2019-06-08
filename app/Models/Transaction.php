<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version May 2, 2019, 2:26 pm UTC
 *
 * @property integer user_id
 * @property integer product_owner_id
 * @property integer product_id
 * @property string payment_method
 * @property string message
 * @property float amount
 * @property string status
 */
class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'product_owner_id',
        'product_id',
        'payment_method',
        'message',
        'amount',
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
        'product_owner_id' => 'integer',
        'product_id' => 'integer',
        'payment_method' => 'string',
        'message' => 'string',
        'amount' => 'float',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'product_id' => 'required',
        'amount' => 'required',
        'status' => 'required'
    ];



    /**
     * Get the product that transaction was done on
     */
    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    /**
     * Get the product that did the transaction
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product_owner()
    {
        return $this->belongsTo('App\Models\User', 'product_owner_id');
    }





}

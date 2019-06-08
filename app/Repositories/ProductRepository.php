<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

/**
 * Class ProductRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:43 pm UTC
*/

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}

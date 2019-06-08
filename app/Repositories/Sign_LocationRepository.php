<?php

namespace App\Repositories;

use App\Models\Sign_Location;
use App\Repositories\BaseRepository;

/**
 * Class Sign_LocationRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:45 pm UTC
*/

class Sign_LocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Sign_Location::class;
    }
}

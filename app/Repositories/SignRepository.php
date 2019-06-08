<?php

namespace App\Repositories;

use App\Models\Sign;
use App\Repositories\BaseRepository;

/**
 * Class SignRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:43 pm UTC
*/

class SignRepository extends BaseRepository
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
        return Sign::class;
    }
}

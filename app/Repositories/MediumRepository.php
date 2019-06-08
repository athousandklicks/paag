<?php

namespace App\Repositories;

use App\Models\Medium;
use App\Repositories\BaseRepository;

/**
 * Class MediumRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:41 pm UTC
*/

class MediumRepository extends BaseRepository
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
        return Medium::class;
    }
}

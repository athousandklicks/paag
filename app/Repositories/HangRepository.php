<?php

namespace App\Repositories;

use App\Models\Hang;
use App\Repositories\BaseRepository;

/**
 * Class HangRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:41 pm UTC
*/

class HangRepository extends BaseRepository
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
        return Hang::class;
    }
}

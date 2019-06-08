<?php

namespace App\Repositories;

use App\Models\Support;
use App\Repositories\BaseRepository;

/**
 * Class SupportRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:46 pm UTC
*/

class SupportRepository extends BaseRepository
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
        return Support::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\Frame;
use App\Repositories\BaseRepository;

/**
 * Class FrameRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:40 pm UTC
*/

class FrameRepository extends BaseRepository
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
        return Frame::class;
    }
}

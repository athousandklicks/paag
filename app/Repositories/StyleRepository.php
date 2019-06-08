<?php

namespace App\Repositories;

use App\Models\Style;
use App\Repositories\BaseRepository;

/**
 * Class StyleRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:45 pm UTC
*/

class StyleRepository extends BaseRepository
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
        return Style::class;
    }
}

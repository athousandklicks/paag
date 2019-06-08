<?php

namespace App\Repositories;

use App\Models\Artist;
use App\Repositories\BaseRepository;

/**
 * Class ArtistRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:39 pm UTC
*/

class ArtistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'role_id',
        'name',
        'about',
        'cv',
        'exhibitions',
        'mentors',
        'tags',
        'image'
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
        return Artist::class;
    }
}

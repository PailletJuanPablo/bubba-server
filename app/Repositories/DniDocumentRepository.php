<?php

namespace App\Repositories;

use App\Models\DniDocument;
use App\Repositories\BaseRepository;

/**
 * Class DniDocumentRepository
 * @package App\Repositories
 * @version August 27, 2021, 3:09 am UTC
*/

class DniDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'dni_number',
        'dni',
        'card'
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
        return DniDocument::class;
    }
}

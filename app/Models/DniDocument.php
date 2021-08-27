<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DniDocument
 * @package App\Models
 * @version August 27, 2021, 3:09 am UTC
 *
 * @property string $dni_number
 * @property string $dni
 * @property string $card
 */
class DniDocument extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dni_documents';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'dni_number',
        'dni',
        'card',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dni_number' => 'string',
        'dni' => 'string',
        'card' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deleted_at' => 'nullable',
        'dni_number' => 'nullable|string|max:255',
        'dni' => 'nullable|string',
        'card' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version August 6, 2021, 3:15 am UTC
 *
 * @property \App\Models\Company $company
 * @property \App\Models\User $user
 * @property integer $company_id
 * @property integer $user_id
 * @property string $number
 * @property string $name
 * @property string $remit
 * @property string $dni
 * @property string $card
 * @property string $sign
 * @property string $dni_number
 * @property string $card_number
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'company_id',
        'user_id',
        'number',
        'name',
        'remit',
        'dni',
        'card',
        'sign',
        'dni_number',
        'card_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'user_id' => 'integer',
        'number' => 'string',
        'name' => 'string',
        'remit' => 'string',
        'dni' => 'string',
        'card' => 'string',
        'sign' => 'string',
        'dni_number' => 'string',
        'card_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deleted_at' => 'nullable',
        'company_id' => 'nullable',
        'user_id' => 'nullable',
        'number' => 'nullable|string|max:255',
        'name' => 'nullable|string|max:255',
        'remit' => 'nullable|string',
        'dni' => 'nullable|string',
        'card' => 'nullable|string',
        'sign' => 'nullable|string',
        'dni_number' => 'nullable|string|max:255',
        'card_number' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}

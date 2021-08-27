<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 * @package App\Models
 * @version August 19, 2021, 4:37 am UTC
 *
 * @property \App\Models\Company $company
 * @property \App\Models\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property integer $role_id
 * @property integer $company_id
 * @property string $remember_token
 * @property string $dni
 * @property string $domain
 * @property string $api_token
 */
class User extends Authenticatable
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role_id',
        'company_id',
        'remember_token',
        'dni',
        'domain',
        'api_token',
        'code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'role_id' => 'integer',
        'company_id' => 'integer',
        'remember_token' => 'string',
        'dni' => 'string',
        'domain' => 'string',
        'api_token' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable',
        'email_verified_at' => 'nullable',
        'password' => 'nullable',
        'role_id' => 'nullable',
        'company_id' => 'nullable',
        'deleted_at' => 'nullable',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'dni' => 'nullable|string|max:255',
        'domain' => 'nullable|string|max:255',
        'api_token' => 'nullable|string|max:255'
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
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'user_id');
    }
}

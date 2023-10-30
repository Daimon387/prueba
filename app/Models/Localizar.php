<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Localizar
 *
 * @property $id
 * @property $zona
 * @property $calle
 * @property $npuerta
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Persona[] $personas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Localizar extends Model
{
    
    static $rules = [
		'zona' => 'required',
		'calle' => 'required',
		'npuerta' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['zona','calle','npuerta','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'localizar_id', 'id');
    }
    

}

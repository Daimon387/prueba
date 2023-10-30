<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $tela_id
 * @property $precio
 * @property $color_id
 * @property $metraje
 * @property $created_at
 * @property $updated_at
 *
 * @property Colore $colore
 * @property Detalleventa[] $detalleventas
 * @property Inventarioproducto[] $inventarioproductos
 * @property Tipotela $tipotela
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'tela_id' => 'required',
		'precio' => 'required',
		'color_id' => 'required',
		'metraje' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tela_id','precio','color_id','metraje'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function colore()
    {
        return $this->hasOne('App\Models\Colore', 'id', 'color_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleventas()
    {
        return $this->hasMany('App\Models\Detalleventa', 'producto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarioproductos()
    {
        return $this->hasMany('App\Models\Inventarioproducto', 'producto_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipotela()
    {
        return $this->hasOne('App\Models\Tipotela', 'id', 'tela_id');
    }
    

}

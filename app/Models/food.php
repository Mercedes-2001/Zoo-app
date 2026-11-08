<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Food
 *
 * @property $cod_alim
 * @property $nom_alim
 * @property $peso_alim
 * @property $contenido_alim
 * @property $cant_total
 * @property $costo
 * @property $fk_prov
 * @property $created_at
 * @property $updated_at
 *
 * @property Supplier $supplier
 * @property Care[] $cares
 * @property Lot[] $lots
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Food extends Model
{
    
    protected $perPage = 20;

    protected $table = 'food';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'cod_alim'; // Se define que clave primaria 
    public $incrementing = true; 
    protected $keyType = 'int'; // Define que la clave primaria es de tipo intero
    protected $fillable = ['nom_alim', 'peso_alim', 'contenido_alim', 'cant_total', 'costo', 'fk_prov'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'fk_prov', 'rfc');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cares()
    {
        return $this->hasMany(\App\Models\Care::class, 'cod_alim', 'fk_alimento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lots()
    {
        return $this->hasMany(\App\Models\Lot::class, 'cod_alim', 'fk_alimento');
    }
    
}

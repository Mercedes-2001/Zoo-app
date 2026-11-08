<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lot
 *
 * @property $cod_lote
 * @property $fecha_caduc
 * @property $porcion
 * @property $fecha_compra
 * @property $fk_alimento
 * @property $created_at
 * @property $updated_at
 *
 * @property Food $food
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lot extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'cod_lote'; // Se define que la clave primaria es rfc 
    public $incrementing = true; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'integer'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['fecha_caduc', 'porcion', 'fecha_compra', 'fk_alimento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food()
    {
        return $this->belongsTo(\App\Models\Food::class, 'fk_alimento', 'cod_alim');
    }
    
}

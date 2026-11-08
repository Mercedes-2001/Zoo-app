<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Animal
 *
 * @property $id_ani
 * @property $nombre_ani
 * @property $edad_ani
 * @property $peso_ani
 * @property $altura
 * @property $sexo_ani
 * @property $fecha_nac
 * @property $descripcion_ani
 * @property $lugar_origen
 * @property $fk_especie
 * @property $fk_zona
 * @property $fk_nombre_zona
 * @property $created_at
 * @property $updated_at
 *
 * @property Species $species
 * @property Care[] $cares
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Animal extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'id_ani'; // Se define que la clave primaria es rfc 
    public $incrementing = true; 
    protected $keyType = 'int'; // Define que la clave primaria es de tipo entero
    protected $fillable = [
        'nombre_ani', 
        'edad_ani', 
        'peso_ani', 
        'altura', 
        'sexo_ani', 
        'fecha_nac', 
        'descripcion_ani', 
        'lugar_origen', 
        'fk_especie', 
        'fk_zona', 
        'fk_nombre_zona'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function species()
    {
        return $this->belongsTo(\App\Models\Species::class, 'fk_especie', 'id_esp');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cares()
    {
        return $this->hasMany(\App\Models\Care::class, 'id_ani', 'fk_animal');
    }
    
}

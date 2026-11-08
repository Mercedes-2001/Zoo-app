<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Turn
 *
 * @property $cod_turno
 * @property $descripcion
 * @property $hora_inicio
 * @property $hora_salida
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee[] $employees
 * @property Empturn[] $empturns
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Turn extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'cod_turno'; // Se define que la clave primaria es rfc 
    public $incrementing = true; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'int'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['descripcion', 'hora_inicio', 'hora_salida'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'cod_turno', 'fk_turno');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empturns()
    {
        return $this->hasMany(\App\Models\Empturn::class, 'cod_turno', 'fk_turno');
    }
    
}

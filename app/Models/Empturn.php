<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empturn
 *
 * @property $cod_empturn
 * @property $fk_turno
 * @property $fk_empleado
 * @property $horas_trabajadas
 * @property $motivo
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property Turn $turn
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empturn extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'cod_empturn'; // Se define que la clave primaria es rfc 
    public $incrementing = true; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'integer'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['fk_turno', 'fk_empleado', 'horas_trabajadas', 'motivo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'fk_empleado', 'num_trabajador');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turn()
    {
        return $this->belongsTo(\App\Models\Turn::class, 'fk_turno', 'cod_turno');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Care
 *
 * @property $id_cuidados
 * @property $fecha_inicio_cuidado
 * @property $hora_cuidado
 * @property $tratamiento
 * @property $cantidad_alimento
 * @property $fk_alimento
 * @property $fk_empleado
 * @property $fk_animal
 * @property $created_at
 * @property $updated_at
 *
 * @property Food $food
 * @property Animal $animal
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Care extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'id_cuidados'; // Se define que la clave primaria es rfc 
    public $incrementing = true; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'int'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['fecha_inicio_cuidado', 'hora_cuidado', 'tratamiento', 'cantidad_alimento', 'fk_alimento', 'fk_empleado', 'fk_animal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food()
    {
        return $this->belongsTo(\App\Models\Food::class, 'fk_alimento', 'cod_alim');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(\App\Models\Animal::class, 'fk_animal', 'id_ani');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'fk_empleado', 'num_trabajador');
    }
    
}

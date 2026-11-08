<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Data
 *
 * @property $num_trabajador
 * @property $tel
 * @property $correo_elec
 * @property $calle
 * @property $col
 * @property $cp
 * @property $n_I
 * @property $n_E
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Data extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'num_trabajador'; // Se define que la clave primaria es rfc 
    public $incrementing = false; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'integer'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['num_trabajador', 'tel', 'correo_elec', 'calle', 'col', 'cp', 'n_I', 'n_E', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'num_trabajador', 'num_trabajador');
    }
    
}

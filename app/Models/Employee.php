<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 *
 * @property $num_trabajador
 * @property $nom
 * @property $nom_s
 * @property $apat
 * @property $apmat
 * @property $edad
 * @property $sexo
 * @property $tipo_em
 * @property $fk_turno
 * @property $fk_jefe
 * @property $created_at
 * @property $updated_at
 *
 * @property Employee $employee
 * @property Turn $turn
 * @property Care[] $cares
 * @property Data $data
 * @property Employee[] $employees
 * @property Empturn[] $empturns
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Employee extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'num_trabajador'; // Se define que la clave primaria es rfc 
    public $incrementing = true; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'integer'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['nom', 'nom_s', 'apat', 'apmat', 'edad', 'sexo', 'tipo_em', 'fk_turno', 'fk_jefe'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'fk_jefe', 'num_trabajador');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turn()
    {
        return $this->belongsTo(\App\Models\Turn::class, 'fk_turno', 'cod_turno');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cares()
    {
        return $this->hasMany(\App\Models\Care::class, 'num_trabajador', 'fk_empleado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function data()
    {
        return $this->hasOne(\App\Models\Data::class, 'num_trabajador', 'num_trabajador');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(\App\Models\Employee::class, 'num_trabajador', 'fk_jefe');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empturns()
    {
        return $this->hasMany(\App\Models\Empturn::class, 'num_trabajador', 'fk_empleado');
    }
    
}

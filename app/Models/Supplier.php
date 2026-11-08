<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 *
 * @property $rfc
 * @property $nom_prov
 * @property $tel_prov
 * @property $correo_prov
 * @property $calle_prov
 * @property $col_prov
 * @property $cp_prov
 * @property $numext_prov
 * @property $numint_prov
 * @property $tipo_prov
 * @property $created_at
 * @property $updated_at
 *
 * @property Food[] $food
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Supplier extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'rfc'; // Se define que la clave primaria es rfc 
    public $incrementing = false; // Laravel asume que las claves primarias son autoincrementales, esto lo desactiva 
    protected $keyType = 'string'; // Define que la clave primaria es de tipo string 
    protected $fillable = ['rfc', 'nom_prov', 'tel_prov', 'correo_prov', 'calle_prov', 'col_prov', 'cp_prov', 'numext_prov', 'numint_prov', 'tipo_prov'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function food()
    {
        return $this->hasMany(\App\Models\Food::class, 'rfc', 'fk_prov');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Species
 *
 * @property $id_esp
 * @property $nom_cientf
 * @property $nom_comun
 * @property $tipo_nac
 * @property $familia
 * @property $created_at
 * @property $updated_at
 *
 * @property Animal[] $animals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Species extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $primaryKey = 'id_esp'; 
    public $incrementing = true; 
    protected $keyType = 'int'; 
    protected $fillable = [
        'nom_cientf', 
        'nom_comun', 
        'tipo_nac', 
        'familia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animals()
    {
        return $this->hasMany(\App\Models\Animal::class, 'fk_especie', 'id_esp');
    }
    
}

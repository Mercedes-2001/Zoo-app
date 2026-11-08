<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zone
 *
 * @property $id_zona
 * @property $nombre_zona
 * @property $ubicacion
 * @property $capacidad
 * @property $tipo_zona
 * @property $clima
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Zone extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'zones';
    protected $primaryKey = 'id_zona';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'nombre_zona', 
        'ubicacion', 
        'capacidad', 
        'tipo_zona', 
        'clima', 
        'status'];


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculo';
    protected $primarykey = 'id_vehiculo';
    use HasFactory;

    public $timestamps = false;

    public function tipoVehiculo(){

        return $this->belongsTo(TipoVehiculo::class, 'id_tipo_vehiculo');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculo extends Model
{
    protected $table = 'tipo_vehiculo';
    protected $primarykey = 'id_tipo_vehiculo';
    use HasFactory;

    public $timestamps = false;
}

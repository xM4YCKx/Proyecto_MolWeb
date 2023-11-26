<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_local extends Model
{
    protected $table = 'historial_vehiculo_local';
    protected $primarykey = 'id_historial_l';
    use HasFactory;
}

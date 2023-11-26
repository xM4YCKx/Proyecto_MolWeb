<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tarea_asignada';
    protected $primarykey = 'id_tarea';
    use HasFactory;

    public $timestamps = false;
}

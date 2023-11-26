<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'ruta';
    protected $primarykey = 'id_ruta';
    use HasFactory;

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    protected $primarykey = 'id_trabajador';
    use HasFactory;

    public $timestamps = false;
}

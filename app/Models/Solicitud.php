<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $primarykey = 'id_solicitud';
    use HasFactory;

    public $timestamps = false;
}

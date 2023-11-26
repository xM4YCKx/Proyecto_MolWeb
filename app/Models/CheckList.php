<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $table = 'check_list_vehiculo';
    protected $primarykey = 'id_check_list';
    use HasFactory;

    public $timestamps = false;
}

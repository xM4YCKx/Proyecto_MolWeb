<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebasController extends Controller
{
    public function fecha(){
        
        $ultimoMes=date('Y-m-d H:i:s', strtotime('now'));

        echo "fecha -> ".$ultimoMes;
    
    }
}

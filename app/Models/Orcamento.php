<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orcamento extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function Consulta ( $cliente,$dataini, $datafim,$vendedor){
        $query = Orcamento::query();
        if ($cliente){
            $query->where('cliente', 'LIKE', '%' . $cliente . '%');
        }
        if ($dataini){
            $query->where('data', '>=', date('Y-m-d', strtotime($dataini)));
        }
        if($datafim){
            $query->where('data', '<=', date('Y-m-d', strtotime($datafim)));
        }
        if ($vendedor){
            $query->where('vendedor', '=', $vendedor);
        }
        $orcamentos = $query->orderBy('data','DESC')->paginate();
        return $orcamentos;
    }
    
}

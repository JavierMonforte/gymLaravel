<?php

namespace App\Models;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descripcion',
        'duracion',
        'participantes'
    ];

    public function sesions()
    {
        return $this->hasMany(Sesion::class);
    }
    public function sesionesMes($mes)
    {
        $sesions = $this->sesions;
        $sesionMes = array();
        foreach ($sesions as $sesion) {
            // dd($sesion->inicio->month);
            $dia = Carbon::parse($sesion->inicio);
            
            //$dia = Carbon::createFromFormat('Y-m-d h:i:s', $sesion->inicio);
            if ($dia->month ==  $mes) {
                $sesionMes [] = $sesion;
            }
        }
        return $sesionMes;
    }
   /* public function fromDateTime($value)
    {
        return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');
    }*/
}

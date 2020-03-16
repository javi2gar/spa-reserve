<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaDeServicio extends Model
{
    protected $table = 'reserva_de_servicio';
    protected $primaryKey = 'reserva_id';


    protected $fillable = [
        'nombre_cliente',
        'dia_servicio',
        'hora_servicio',
        'servicio_id',
    ];

    public function servicioDeSpa()
    {
        return $this->belongsTo('App\ServicioDeSpa','servicio_id');
    }

}

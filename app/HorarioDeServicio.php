<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDeServicio extends Model
{
    protected $table = 'horario_de_servicio';

    protected $primaryKey = 'horario_id';

    protected $fillable = [
        'dia',
        'inicio', 
        'fin',
        'servicio_id',
               
       /*(rangos de horas en las que aplica el horario. Inicio - Fin)
            **Ej: Masaje de espalda, 01/01/2020 disponible de 10:00 - 13:00, 14:00 - 18:00.
        */
    ];

    public function servicioDeSpa()
    {
        return $this->belongsTo('App\ServicioDeSpa','servicio_id');
    }
}

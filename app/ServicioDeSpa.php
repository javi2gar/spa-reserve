<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioDeSpa extends Model
{
    protected $table = 'servicio_de_spa';

    protected $primaryKey = 'servicio_id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];

    public function horariosDeServicio()
    {
        return $this->hasMany('App\HorariosDeServicio','horario_id');
    }

    public function reservaDeServicio()
    {
        return $this->hasMany('App\ReservaDeServicio','reserva_id');
    }
}

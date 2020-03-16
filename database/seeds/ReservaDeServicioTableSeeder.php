<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservaDeServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserva_de_servicio')->insert(array(
            array(
                'nombre_cliente' => 'Mark Shuttleworth',   
                'comentarios' => 'Alergia al marisco', 
                'dia_servicio' => '2020-03-16',  
                'hora_servicio' => '13:00',                   
                'precio_total' =>  '16.50',
                'servicio_id' =>'6',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),  
            ),
            array(
                'nombre_cliente' => 'Benedict Torvalds',                  
                'comentarios' => 'Movilidad reducida',    
                'dia_servicio' => '2020-03-16',  
                'hora_servicio' => '18:00',  
                'precio_total' => '16.50',
                'servicio_id' =>'6',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),  
            ),
        ));
    }
}

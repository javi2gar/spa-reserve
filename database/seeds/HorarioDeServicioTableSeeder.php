<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HorarioDeServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horario_de_servicio')->insert(array(
            array(
                'dia' => '2020-03-03',   
                'inicio' => '10:00',  
                'fin' => '13:00',  
                'servicio_id' =>'6',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),  
            ),
            array(
                'dia' => '2020-03-03',   
                'inicio' => '14:00',  
                'fin' => '18:00',  
                'servicio_id' =>'6',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),  
            ),
        ));
    }
}

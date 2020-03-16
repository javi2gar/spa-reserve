<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServicioDeSpaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicio_de_spa')->insert(array(
            array(
                'nombre' => 'Circuito de Spa',   
                'descripcion' => ' Baño turco, sauna finlandesa, duchas de sensaciones y escocesas, 
                                piscina central con diferentes chorros y cuellos de cisne, y jacuzzi. ',  
                'precio' => '12.00',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),
            array(
                'nombre' => 'Circuito Spa Privado (2 personas)',   
                'descripcion' => 'Circuito Spa 60 min + Copas de cava de bienvenida',  
                'precio' => '60.00',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),
            array(
                'nombre' => 'Pack Glamour',   
                'descripcion' => 'Circuito Spa 90 min + Copa de Cava + Skin test o análisis de la piel 
                                + Higiene facial profunda + Uso de albornoz',  
                'precio' => '16.50',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ), 
            array(
                'nombre' => 'Envoltura Corporal',   
                'descripcion' => 'Peloides, algas, chocolate...',  
                'precio' => '38.00',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),  
            array(
                'nombre' => 'Pack Graduación para estudiantes',   
                'descripcion' => 'Pack Graduación Plus incluye: Circuito Spa 90 min. + bebida en zona relax 
                                + peeling express  + elegir entre mini-masaje o mini-limpieza facial de 15 min ',  
                'precio' => '16.50',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),
            array(
                'nombre' => 'Masaje de espalda',   
                'descripcion' => 'Vino, café, marino, frutas.',  
                'precio' => '16.50',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ),
            ),
            array(
                'nombre' => 'Masaje deportivo',   
                'descripcion' => 'A elegir 25 min. : Descontracturante o Tonificante',  
                'precio' => '12.00',  
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ),
        );
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use WithoutMiddleware;
use Tests\TestCase;
use App\ServicioDeSpa;
class ServicioDeSpaControllerTest extends TestCase
{      
     
    public function testDatabase()
    {
        // Make call to application...
        $this->assertDatabaseHas('servicio_de_spa', [
            'nombre' => 'Circuito de Spa',
            'precio' => 12
        ]);    

        $this->assertEquals('Circuito de Spa', servicioDeSpa::find(1)->nombre);    
        $this->assertEquals(6, count(\App\ServicioDeSpa::all()));
    }
    

    public function testStoreServicioDeSpa()
    {       
        $data = [
        'nombre' => 'Nombre servicio de test',
        'descripcion' => 'Descripción de test',
        'precio' => 12
        ];   
/*
        $response = $this->call('POST', 'ServicioDeSpa/store', $data);
        $newServicioDeSpa = \App\ServicioDeSpa::find(7);
        $this->assertEquals($data['nombre'], $newServicioDeSpa->nombre);
        $this->assertEquals(7, count(\App\ServicioDeSpa::all()));
  */ 
        //$newServicioDeSpa = ServicioDeSpa::create($data);     
        //$this->assertEquals(7,$newservicioDeSpaFound->servicio_id);
    }   

/*
    public function testDeleteServicioDeSpa()
    {
        $servicioDeSpaId = 6;
        $this->call('GET', 'servicioDeSpa/delete/' . $servicioDeSpaId);
        $this->assertEquals(6, count(\App\ServicioDeSpa::all()));
    }
  */  
    
}

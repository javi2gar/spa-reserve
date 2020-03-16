<?php

namespace App\Http\Controllers;

Use App\ReservaDeServicio;

use Illuminate\Http\Request;

class ReservaDeServicioController extends Controller
{
    public function index()
    {
        // Devolverá todas las reservas de servicios 
        //$reservaDeServicio= ReservaDeServicio::get();

        // Devolverá 5 reservas de servicios por página
        $reservaDeServicio= ReservaDeServicio::paginate(5);

        return view('reservaDeServicio.index')->with('reservaDeServicio', $reservaDeServicio);
    }

    public function show($IdReservasDeServicio){
        // Devuelve la reserva de servicio seleccionada por id.
        $reservaDeServicio= ServicioDeSpa::find($IdReservasDeServicio);
        return view('reservaDeServicio.show')->with('reservaDeServicio', $IdReservaDeServicio);
    }

    public function destroy($IdReservasDeServicio){
        // Elimina la reserva de servicio seleccionada por id.
        $reservaDeServicio = ServicioDeSpa::find($IdReservaDeServicio);
        $reservaDeServicio->delete();
        return redirect()->route('reservaDeServicio.index')->with('success', ' La reserva de servicio con Id : '  .$IdReservaDeServicio .' ha sido borrado correctamente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('reservaDeServicio.create');
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
 
     public function store(Request $request)
     {
       $request->validate([
         'nombre_cliente'=>'required|max:255',
         'comentarios'=> 'max:255',         
         'dia_servicio' => 'required',  
         'hora_servicio' => 'required',
         'servicio_id' =>'required' 
       ]);
       $reservaDeServicio = new ReservaDeServicio([
         'nombre' => $request->get('nombre'),
         'comentarios'=> $request->get('comentarios'),
         'dia_servicio'=> date('d/m/y', strtotime($request->get('dia_servicio'))),
         'hora_servicio'=> date('H:i', strtotime($request->get('hora_servicio'))),
         'servicio_id'=> $request->get('servicio_id'),
         'precio_total'=> $request->get('precio_total')  
       ]);

      //Si está libre la hora se guarda la reserva 
      if(comprobarSiReservaEstaLibre($reservaDeServicio))
      {
        $reservaDeServicio->save();        
        return redirect()->route('reservaDeServicio.index')->with('success', ' La reserva de servicio se ha sido añadido correctamente.');
      }
      else{
        return redirect()->route('reservaDeServicio.create')->with('danger', ' La reserva de servicio a esa hora ya está asignada.');
      }
     }

     public function edit($IdReservaDeServicio)
     {
         $reservaDeServicio = ReservaDeServicio::find($IdReservaDeServicio);
         return view('reservaDeServicio.edit', compact('reservaDeServicio'));
     }
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $IdReservaDeServicio)
     {         
        $request->validate([
          'nombre_cliente'=>'required|max:255',
          'comentarios'=> 'max:255',         
          'dia_servicio' => 'required',  
          'hora_servicio' => 'required',
          'servicio_id' =>'required'  
        ]); 

       $reservaDeServicio = ReservaDeServicio::find($IdReservaDeServicio);
       $reservaDeServicio->nombre = $request->get('nombre');
       $reservaDeServicio->comentarios = $request->get('comentarios'); 
       $reservaDeServicio->dia_servicio = date('d/m/y', strtotime($request->get('dia_servicio')));
       $reservaDeServicio->hora_servicio = date('H:i', strtotime($request->get('hora_servicio')));
       $reservaDeServicio->servicio_id = $request->get('servicio_id');
       $reservaDeServicio->precio_total = $request->get('precio_total');  


       $reservaDeServicio->save();
       return redirect()->route('reservaDeServicio.index')->with('success', ' La reserva de servicio ha sido actualizado correctamente.');
     }

    public function comprobarSiReservaEstaLibre( $reservaDeServicio)
    {
      $reserva = DB::table('reserva_de_servicio')->where([
        ['servicio_id', '=',  $reservaDeServicio->servicio_id],
        ['dia', '=',  $reservaDeServicio->dia],            
        ['hora', '=',  $reservaDeServicio->hora],
      ])->get();

      if(is_null($reserva)){
        return true;
      }
    }        
}

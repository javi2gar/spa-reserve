<?php

namespace App\Http\Controllers;

use App\HorarioDeServicio;

use Illuminate\Http\Request;

class HorarioDeServicioController extends Controller
{
   public function index()
   {
       // Devolverá todos los horarios de servicos
       //$horarioDeServicio= horarioDeServicio::get();

       // Devolverá 5 horarios de servicios por página
       $horarioDeServicio= HorarioDeServicio::paginate(5);

       return view('horarioDeServicio.index')->with('horarioDeServicio', $horarioDeServicio);
   }

   public function show($IdHorarioDeServicio){
       // Devuelve el de servicio seleccionado por id.
       $horarioDeServicio= HorarioDeServicio::find($IdHorarioDeServicio);
       return view('horarioDeServicio.show')->with('horarioDeServicio', $IdHorarioDeServicio);
   }

   public function destroy($IdHorarioDeServicio){
       // Elimina el horario de servicio por id.
       $horarioDeServicio = HorarioDeServicio::find($IdHorarioDeServicio);
       $horarioDeServicio->delete();
       return redirect()->route('horarioDeServicio.index')->with('success', ' El horario de servicio ha sido borrado correctamente');
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('horarioDeServicio.create');
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
        'dia'=>'required',
        'inicio'=> 'required',
        'fin' => 'required',        
        'servicio_id' =>'required'
      ]);
      $horarioDeServicio = new HorarioDeServicio([
        'dia' => date('Y-m-d', strtotime($request->get('dia'))),
        'inicio'=> date('H:i', strtotime($request->get('inicio'))),
        'fin'=> date('H:i', strtotime($request->get('fin'))),
        'servicio_id' => $request->get('servicio_id'),
      ]);
      $horarioDeServicio->save();
      return redirect()->route('horarioDeServicio.index')->with('success', ' El horario del servicio se ha sido añadido correctamente.');
    }

    public function edit($IdHorarioDeServicio)
    {
        $horarioDeServicio = HorarioDeServicio::find($IdHorarioDeServicio);
        $horarioDeServicio->dia = date('d/m/Y', strtotime($horarioDeServicio ->dia));
        $horarioDeServicio->inicio = date('H:i', strtotime($horarioDeServicio ->inicio));
        $horarioDeServicio->fin = date('H:i', strtotime($horarioDeServicio ->fin));
        return view('horarioDeServicio.edit', compact('horarioDeServicio'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IdHorarioDeServicio)
    {         
       $request->validate([
        'dia'=>'required',
        'inicio'=> 'required',
        'fin' => 'required',        
        'servicio_id' =>'required'
       ]); 

      $horarioDeServicio = HorarioDeServicio::find($IdHorarioDeServicio);
      $horarioDeServicio->dia = date('Y-m-d', strtotime($request->get('dia')));
      $horarioDeServicio->inicio = date('H:i', strtotime($request->get('inicio'))); 
      $horarioDeServicio->fin = date('H:i', strtotime($request->get('fin'))); 
      $horarioDeServicio->servicio_id = $request->get('servicio_id');  
     
      $horarioDeServicio->save();
      return redirect()->route('horarioDeServicio.index')->with('success', ' El el horario de servicio ha sido actualizado correctamente.');
    }
}

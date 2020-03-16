<?php

namespace App\Http\Controllers;

use App\ServicioDeSpa;

use Illuminate\Http\Request;

class ServicioDeSpaController extends Controller
{
    public function index()
    {
        // Devolverá todos los servicos de Spa
        //$servicioDeSpa= ServicioDeSpa::get();

        // Devolverá 5 servicios de Spa por página
        $servicioDeSpa= ServicioDeSpa::paginate(5);

        return view('servicioDeSpa.index')->with('servicioDeSpa', $servicioDeSpa);
    }

    public function show($IdServicioDeSpa){
        // Devuelve el servicio de Spa seleccionada por id.
        $servicioDeSpa= ServicioDeSpa::find($IdServicioDeSpa);
        return view('servicioDeSpa.show')->with('servicioDeSpa', $IdServicioDeSpa);
    }

    public function destroy($IdServicioDeSpa){
        // Elimina el servicio de Spa seleccionada por id.
        $servicioDeSpa = ServicioDeSpa::find($IdServicioDeSpa);
        $servicioDeSpa->delete();
        return redirect()->route('servicioDeSpa.index')->with('success', ' El servicio de Spa con Id : '  .$IdServicioDeSpa .' ha sido borrado correctamente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         return view('servicioDeSpa.create');
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
         'nombre'=>'required|max:255',
         'descripcion'=> 'max:255'
       ]);
       $servicioDeSpa = new ServicioDeSpa([
         'nombre' => $request->get('nombre'),
         'descripcion'=> $request->get('descripcion'),
         'precio'=> $request->get('precio')  
       ]);
       $servicioDeSpa->save();
       return redirect()->route('servicioDeSpa.index')->with('success', ' El servicio de Spa se ha sido añadido correctamente.');
     }

     public function edit($IdServicioDeSpa)
     {
         $servicioDeSpa = ServicioDeSpa::find($IdServicioDeSpa);
         return view('servicioDeSpa.edit', compact('servicioDeSpa'));
     }
     /** 
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $IdServicioDeSpa)
     {         
        $request->validate([
         'nombre'=>'required|max:255',
         'descripcion'=> 'max:255'
        ]); 

       $servicioDeSpa = ServicioDeSpa::find($IdServicioDeSpa);
       $servicioDeSpa->nombre = $request->get('nombre');
       $servicioDeSpa->descripcion = $request->get('descripcion'); 
       $servicioDeSpa->precio = $request->get('precio'); 
      
       $servicioDeSpa->save();
       return redirect()->route('servicioDeSpa.index')->with('success', ' El servicio de Spa se ha sido actualizado correctamente.');
     }
}

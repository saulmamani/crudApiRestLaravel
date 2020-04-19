<?php

namespace App\Http\Controllers;

use App\Directorio;
use App\Http\Requests\CreateDirectorioRequest;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //GET listar datos
    public function index(Request $request)
    {
        if($request->has('txtBuscar'))
        {
            $contactos = Directorio::where('nombre_completo', 'like', '%'. $request->txtBuscar. '%')
                        ->orWhere('telefono', $request->txtBuscar)
                        ->get();
        }
        else
            $contactos = Directorio::all();

        return $contactos;
    }

    //POST insertar nuevos elementos
    public function store(CreateDirectorioRequest $request)
    {
        $input = $request->all();
        $directorio = Directorio::create($input);
        return response()->json([
            'res' => true,
            'directorio' => $directorio
        ]);
    }

    //GET mostrar un elemento
    public function show(Directorio $directorio)
    {
        return $directorio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

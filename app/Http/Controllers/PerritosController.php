<?php

namespace App\Http\Controllers;

use App\Models\Perritos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Paginación
        $data['perritos'] = Perritos::paginate(5);


        return view('perritos.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('perritos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //Validaciones de datos
        $campos=[
            'Nombre' => 'required|string|max:50',
            'Color' => 'required|string|max:50',
            'Raza' => 'required|string|max:50',
            'Foto' => 'required|max:10000|mimes:jpeg,jpg,png',
        ];

        $mensaje=["required" => 'El campo de :attribute es requerido'];
        $this->validate($request, $campos, $mensaje);

        // $dataPerritos=request()->all();
        $dataPerritos=request()->except('_token');

        //Almacenar la foto
        if($request->hasFile('Foto')){
            $dataPerritos['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Perritos::insert($dataPerritos);

        // return response()->json($dataPerritos);
        return redirect('perritos')->with('Mensaje', 'Perrito agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perritos  $perritos
     * @return \Illuminate\Http\Response
     */
    public function show(Perritos $perritos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perritos  $perritos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $perrito = Perritos::findOrFail($id);

        return view('perritos.edit', compact('perrito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perritos  $perritos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validaciones de datos
        $campos=[
            'Nombre' => 'required|string|max:50',
            'Color' => 'required|string|max:50',
            'Raza' => 'required|string|max:50',
            
        ];

        //Validacion de foto
        if($request->hasFile('Foto')){

            $campos += ['Foto' => 'required|max:10000|mimes:jpeg,jpg,png'];

        }

        $mensaje=["required" => 'El campo de :attribute es requerido'];
        $this->validate($request, $campos, $mensaje);

        $dataPerritos=request()->except(['_token', '_method']);

        //Reemplazar la foto
        if($request->hasFile('Foto')){

            $perrito = Perritos::findOrFail($id);

            //Eliminar la foto
            Storage::delete('public/'.$perrito->Foto);

            $dataPerritos['Foto']=$request->file('Foto')->store('uploads', 'public');

        }

        Perritos::where('id', '=', $id)->update($dataPerritos);

        // $perrito = Perritos::findOrFail($id);
        // return view('perritos.edit', compact('perrito'));
        return redirect('perritos')->with('Mensaje', 'Perrito modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perritos  $perritos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //Buscar la foto
        $perrito = Perritos::findOrFail($id);

        //Eliminar la foto
        if(Storage::delete('public/'.$perrito->Foto)){
            Perritos::destroy($id);
        }

        return redirect('perritos')->with('Mensaje', 'Perrito eliminado exitosamente');

    }
}

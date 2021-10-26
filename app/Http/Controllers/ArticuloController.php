<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articulo = Articulo::all();
        return $articulo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validacionArticulo($request);

        $articulo = Articulo::create($request -> all());
        return $articulo;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);
        return $articulo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validacionArticulo($request);

        $articulo= Articulo::findOrFail($id);
        $articulo->update($request->all());
        return $articulo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo= Articulo::findOrFail($id);
        $articulo->delete();
    }


    public function validacionArticulo(Request $request){

        $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'precio' => 'required|numeric|min:1|max:99999999',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u',
            'ArticuloCategorias_id' => 'required|numeric|min:1|max:99999999' 

        ]);
    }
}

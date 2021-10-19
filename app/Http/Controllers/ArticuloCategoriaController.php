<?php

namespace App\Http\Controllers;

use App\Models\ArticuloCategoria;
use Illuminate\Http\Request;


class ArticuloCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categoria = ArticuloCategoria::all();
        return $categoria;
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
           

        $this->ValidacionRubros($request);

        $categoria = ArticuloCategoria::create($request -> all());
     
        return $categoria;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticuloCategoria  $articuloCategoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = ArticuloCategoria::find($id);
        return $categoria;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticuloCategoria  $articuloCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticuloCategoria $articuloCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticuloCategoria  $articuloCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->ValidacionRubros($request);

        $categoria= ArticuloCategoria::findOrFail($id);
        $categoria->update($request->all());
        return $categoria;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticuloCategoria  $articuloCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria= ArticuloCategoria::findOrFail($id);
        $categoria->delete();
    }

    public function ValidacionRubros(Request $request){
        $this->validate($request, [
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u' 

        ]);
    }



}

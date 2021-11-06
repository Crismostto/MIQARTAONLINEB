<?php

namespace App\Http\Controllers;

use App\Models\HistoricoMesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoMesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historicoMesa = 'SELECT historico_mesas.*, (SELECT SUM(cantidad*precio) FROM historico_mesa_pedidos WHERE historico_mesa_pedidos.historicoMesa_id = historico_mesas.id) AS totalMesa FROM historico_mesas;';
        $vistaHistoricoMesa =  DB::select($historicoMesa);
        return $vistaHistoricoMesa;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoricoMesa  $historicoMesa
     * @return \Illuminate\Http\Response
     */
    public function show(HistoricoMesa $historicoMesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoricoMesa  $historicoMesa
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoricoMesa $historicoMesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoricoMesa  $historicoMesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoricoMesa $historicoMesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoricoMesa  $historicoMesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoricoMesa $historicoMesa)
    {
        //
    }
}

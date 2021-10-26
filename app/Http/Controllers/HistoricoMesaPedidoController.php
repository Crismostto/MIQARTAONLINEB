<?php

namespace App\Http\Controllers;

use App\Models\HistoricoMesaPedido;
use App\Models\MesaPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoMesaPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historicoMesaPedido = HistoricoMesaPedido::all();
        return $historicoMesaPedido;
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
        $Pedido = MesaPedido::create($request -> all());
        return $Pedido;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HistoricoMesaPedido  $historicoMesaPedido
     * @return \Illuminate\Http\Response
     */
    public function show(HistoricoMesaPedido $historicoMesaPedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HistoricoMesaPedido  $historicoMesaPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoricoMesaPedido $historicoMesaPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HistoricoMesaPedido  $historicoMesaPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoricoMesaPedido $historicoMesaPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HistoricoMesaPedido  $historicoMesaPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoricoMesaPedido $historicoMesaPedido)
    {
        //
    }

    public function lista($id)
    {

        $consultaPedido = 'SELECT historico_mesa_pedidos.id,articulos.nombre, historico_mesa_pedidos.cantidad ,historico_mesa_pedidos.precio, historico_mesa_pedidos.historicoMesa_id, historico_mesa_pedidos.precio * historico_mesa_pedidos.cantidad AS Total
    FROM articulos INNER JOIN historico_mesa_pedidos on articulos.id = historico_mesa_pedidos.articulo_id
    WHERE   historico_mesa_pedidos.historicoMesa_id = ' . $id . ' ';

        $vistaHistoricoPedido = DB::select($consultaPedido);
        return $vistaHistoricoPedido;
    }

}

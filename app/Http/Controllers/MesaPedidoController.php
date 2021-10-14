<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MesaPedido;

use Illuminate\Http\Request;

class MesaPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedido = MesaPedido::all();
        return $pedido;
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
     * @param  \App\Models\MesaPedido  $mesaPedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesaP = MesaPedido::find($id);
        return $mesaP;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MesaPedido  $mesaPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(MesaPedido $mesaPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MesaPedido  $mesaPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MesaPedido $mesaPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MesaPedido  $mesaPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesaPedido $mesaPedido)
    {
        //
    }

    public function lista($id)
    {

        $consultaPedido = 'SELECT mesa_pedidos.id,articulos.nombre, mesa_pedidos.cantidad ,mesa_pedidos.precio, mesa_pedidos.mesa_id, mesa_pedidos.precio * mesa_pedidos.cantidad AS Total
    FROM articulos INNER JOIN mesa_pedidos on articulos.id = mesa_pedidos.articulo_id
    WHERE  mesa_pedidos.mesa_id = ' . $id . ' ';

        $vistaPedido = DB::select($consultaPedido);
        return $vistaPedido;
    }

    public function cierreMesa($id)
    {

        $generarHistoricoMesa = 'INSERT INTO historico_mesas(historico_mesas.mesa_id,historico_mesas.fecha_apertura,historico_mesas.fecha_cierre)
        SELECT mesas.id, mesas.fechaApertura, CURRENT_TIMESTAMP()
        FROM mesas
        WHERE mesas.id = ' . $id . ' ';

        $cierreMesa = DB::select($generarHistoricoMesa);
        return $cierreMesa;
    }

    public function cierrePedido($id)
    {
      $mesa = 1;  
        $generarHistoricoPedido = 
        'INSERT INTO historico_mesa_pedidos (
            historico_mesa_pedidos.historicoMesa_id,
            historico_mesa_pedidos.articulo_id,
            historico_mesa_pedidos.cantidad,
            historico_mesa_pedidos.precio)
        SELECT historico_mesas.id, mesa_pedidos.articulo_id, mesa_pedidos.cantidad, mesa_pedidos.precio 
        FROM mesa_pedidos 
        INNER JOIN historico_mesas
        WHERE  historico_mesas.id = ' . $id .' AND mesa_pedidos.mesa_id = ' . $mesa . ' ';

        $cierrePedido = DB::select($generarHistoricoPedido);
        return $cierrePedido;
    }
}

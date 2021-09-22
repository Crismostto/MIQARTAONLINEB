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
        
        // $mesaPedido=MesaPedido::all();
        // echo "pasa";
        // return $mesaPedido;


        // $articuloNombre = Articulo::
        // join('mesa_pedidos', 'articulos.id', '=', 'mesa_pedidos.articulo_id')
        // ->select('articulos.nombre')
        // ->where('articulos.id = mesa_pedidos.articulo_id')
        // ->get();
    
        // dd($articuloNombre);

        $consultaPedidos = 'SELECT articulos.nombre, mesa_pedidos.cantidad ,mesa_pedidos.precio
        FROM articulos INNER JOIN mesa_pedidos
        WHERE articulos.id = mesa_pedidos.articulo_id';
        $vistaPedidos = DB::select($consultaPedidos);
        
        return $vistaPedidos;
        
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
    public function show(MesaPedido $mesaPedido)
    {
        //
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
    public function PedidosInfo(){
    //     $articuloNombre = DB::select('select articulos.nombre
    //     from articulos innerjoin mesa_pedidos
    //     where articulos.id = mesa_pedidos.articulo_id','');
    //     echo "pedidos info :)";
    // }

    }
}
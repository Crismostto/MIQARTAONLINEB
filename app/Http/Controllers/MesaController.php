<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\MesaPedido;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesa = 'SELECT mesas.*, (SELECT SUM(cantidad*precio) FROM mesa_pedidos WHERE mesa_pedidos.mesa_id = mesas.id) AS totalMesa FROM mesas;';
        $vistaMesa =  DB::select($mesa);
        return $vistaMesa;
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
        
        $mesa = Mesa::create($request -> all());
        return $mesa;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mesa = Mesa::find($id);
        return $mesa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mesa = Mesa::findOrFail($id);
        $mesa-> update($request -> all());
        return $mesa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mesa = Mesa::findOrFail($id);
        $mesa -> delete();
    }
    
    public function cambiarEstadoMesa(Request $request)
    {
        $id= $request->idm;
        $flag= $request->habilitar;
        
        if ($flag == 0){
            $estado= 'UPDATE mesas
            SET estado = 0
            WHERE mesas.id = ' .$id .  ' ';
        
            DB::select($estado);
            return response()->json(['cod' => 200, 'mensaje' => 'Se habilito con exito']);

        }elseif($flag == 2){
            $estado= 'UPDATE mesas
            SET estado = 2
            WHERE mesas.id = ' .$id .  ' ';
        
            DB::select($estado);
            return response()->json(['cod' => 200, 'mensaje' => 'Se cerro la mesa con exito']);
       }elseif($flag== 3){
        $estado= 'UPDATE mesas
        SET estado = 3
        WHERE mesas.id = ' .$id .  ' ';
    
        DB::select($estado);
        return response()->json(['cod' => 200, 'mensaje' => 'Se realizo el pedido con exito']);
       }
    }

  
}

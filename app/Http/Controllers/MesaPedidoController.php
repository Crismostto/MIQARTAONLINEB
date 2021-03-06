<?php

namespace App\Http\Controllers;

use App\Models\HistoricoMesa;
use App\Models\Mesa;
use Illuminate\Support\Facades\DB;
use App\Models\MesaPedido;
use GrahamCampbell\ResultType\Result;
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
        $Pedido = MesaPedido::create($request -> all());
        return $Pedido;
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

    //Se imprime la lista de pedidos relacionada a cada mesa que le pertecene. 
    public function lista($id)
    {

        $consultaPedido = 'SELECT mesa_pedidos.id,articulos.nombre, mesa_pedidos.cantidad ,mesa_pedidos.precio, mesa_pedidos.mesa_id, mesa_pedidos.precio * mesa_pedidos.cantidad AS subTotal
    FROM articulos INNER JOIN mesa_pedidos on articulos.id = mesa_pedidos.articulo_id
    WHERE  mesa_pedidos.mesa_id = ' . $id . ' ';

        $vistaPedido = DB::select($consultaPedido);
        foreach ($vistaPedido as $Total){
            $totalPedido = $Total->subTotal;
            $this->mostrarTotalPedido($totalPedido);
        }
        return $vistaPedido;
    }

    public function cierreTotal(Request $request)
    {

        try{
            DB::beginTransaction();
                //Pasamos el ID de la mesa
                $id = $request->id;

                //Se realiza el SELECT de la consulta en sql
                $mesa = Mesa::where('id', $id)->get();

                // Se realiza el INSERT INTO con el create dentro de HistoricoMesa y le pasamos los siguientes parametros.
                //'mesa_id','fecha_apertura', 'fecha_cierre'
                    $hm = HistoricoMesa::create([
                        'mesa_id' => $mesa[0]->id,
                        'fecha_apertura' => $mesa[0]->fechaApertura,
                        'fecha_cierre' => now() 
                    ]);
                
                //Se guarda la ultima posicion del ID de Historico_mesa   
                $historico_id= $hm->id;
                
                //SQL donde se guarda los pedidos en  Historico_pedidos 
                $generarHistoricoPedido = 
                'INSERT INTO historico_mesa_pedidos (
                    historico_mesa_pedidos.historicoMesa_id,
                    historico_mesa_pedidos.articulo_id,
                    historico_mesa_pedidos.cantidad,
                    historico_mesa_pedidos.precio)
                SELECT historico_mesas.id, mesa_pedidos.articulo_id, mesa_pedidos.cantidad, mesa_pedidos.precio 
                FROM mesa_pedidos 
                INNER JOIN historico_mesas
                WHERE  historico_mesas.id = ' . $historico_id .' AND mesa_pedidos.mesa_id = ' . $id . ' ';
        
                DB::select($generarHistoricoPedido);
                
                $this->borrarPedido($request);
                $this->cambiarEstadoMesa($id);
                DB::commit();    
            } catch(\Exception $e){
                DB::rollback();
                return response()->json(['message' => 'Error']);
            }
            
          //  $this->borrarPedido($request);
            return response()->json(['message' => 'Success','cod' => 200]);
    }

    public function borrarPedido(Request $request){
       $id = $request->id;
       $borrarPedido = 'DELETE from mesa_pedidos
        WHERE mesa_pedidos.mesa_id = ' . $id . ' ';
        
        DB::select($borrarPedido); 
    }

    public function cambiarEstadoMesa($id){
       
       $estado= 'UPDATE mesas
        SET estado = 0
        WHERE mesas.id = ' .$id .  ' ';
       
       DB::select($estado);

    }

    public function mostrarTotalPedido($total){
       
        return $total;
 
     }

}

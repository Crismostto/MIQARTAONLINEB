<?php

namespace App\Http\Controllers;

use App\Models\HistoricoMesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Illuminate\Pagination\Paginator;

class HistoricoMesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //Obteniendo total de los pedidos de cada mesa. 
        $prueba = DB::table('historico_mesa_pedidos')
         ->select ('historicoMesa_id', DB::raw('SUM(cantidad*precio) as totalMesa'))
         ->groupBy('historicoMesa_id');
        
        //Obteniendo las mesas junto con el total obtenido anteriormente.
         $historicoMesa= DB::table('historico_mesas')
         ->joinSub($prueba, 'prueba', function($join){ 
            $join->on('historico_mesas.id', '=', 'prueba.historicoMesa_id');
         })->paginate(5);
         return [
             'paginate'=> [
                 'total'=> $historicoMesa->total(),
                 'current_page'=> $historicoMesa->currentPage(),
                 'per_page'=> $historicoMesa->perPage(),
                 'last_page'=> $historicoMesa->lastPage(),
                 'from'=> $historicoMesa->firstItem(),
                 'to'=> $historicoMesa->lastItem(),
             ],
             'tasks' => $historicoMesa->items()
         ];
    
    // QUERY CON SQL MANUAL. (NO PERMITE EL METHOD PAGINATE)     
    //    $historicoMesa = 'SELECT historico_mesas.*,
    //     (SELECT SUM(cantidad*precio) FROM historico_mesa_pedidos WHERE historico_mesa_pedidos.historicoMesa_id = historico_mesas.id) AS totalMesa 
    //     FROM historico_mesas;';
    //     $vistaHistoricoMesa =  DB::select($historicoMesa);
    //     return ($vistaHistoricoMesa);
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

    public function filtroMesa(Request $request)
    {
        $id = $request->id;

         //Obteniendo total de $ Gastado relacionado a pedidos de cada mesa. 
         $prueba = DB::table('historico_mesa_pedidos')
         ->select ('historicoMesa_id', DB::raw('SUM(cantidad*precio) as totalMesa'))
         ->groupBy('historicoMesa_id');
         
     //Obteniendo la SUMA total de todas las mesas relacionadas al ID guardada en $totalmesa1.
     $TotalMesa= DB::table('historico_mesas')
     ->joinSub($prueba, 'prueba', function($join) use($id){ 
        $join->on('historico_mesas.id', '=', 'prueba.historicoMesa_id')
             ->where('historico_mesas.mesa_id', '=', $id);
     })->get();
     
     $totalmesa1 = 0;
     foreach ($TotalMesa as $totalmesa){
         $totalmesa1 = $totalmesa1 + $totalmesa->totalMesa;
     } 
     

     //Obteniendo las mesas junto con el total obtenido anteriormente y poniendo filtro seleccion a travez de ID en el where.
        $historicoMesa= DB::table('historico_mesas')
          ->joinSub($prueba, 'prueba', function($join) use($id){ 
             $join->on('historico_mesas.id', '=', 'prueba.historicoMesa_id')
                  ->where('historico_mesas.mesa_id', '=', $id);
          })->paginate(10);
          return [
            'paginate'=> [
                'total'=> $historicoMesa->total(),
                'current_page'=> $historicoMesa->currentPage(),
                'per_page'=> $historicoMesa->perPage(),
                'last_page'=> $historicoMesa->lastPage(),
                'from'=> $historicoMesa->firstItem(),
                'to'=> $historicoMesa->lastItem(),
            ],
            'tasks' => $historicoMesa->items() ,
            'totalMesa' => $totalmesa1
        ];
    }

    public function filtroFecha(Request $request)
    {
        $fechauno=  strtotime($request->fechaUno); 
        
        $fechados=  strtotime($request->fechaDos);

        //Obteniendo total de los pedidos de cada mesa. 
        $prueba = DB::table('historico_mesa_pedidos')
        ->select ('historicoMesa_id', DB::raw('SUM(cantidad*precio) as totalMesa'))
        ->groupBy('historicoMesa_id');

         //Obteniendo las mesas junto con el total obtenido anteriormente.
         $historicoMesa= DB::table('historico_mesas')
         ->joinSub($prueba, 'prueba', function($join){ 
            $join->on('historico_mesas.id', '=', 'prueba.historicoMesa_id');
         })->get();

        // Obteniendo las MESAS filtradas con las fechas y su Total de cada una && ademas se obtiene la SUMA TOTAL de todas esas mesas donde se guarda en $totalFechaFiltrada. 
         $totalFechaFiltrada= 0; 
        foreach ($historicoMesa as $fecha) {
             if( $fechauno < strtotime($fecha->fecha_cierre) && $fechados >= strtotime($fecha->fecha_cierre) - (60*60*24)  )
             {
                $arrayFechasFiltradas[]= $fecha; 
                $totalFechaFiltrada= $totalFechaFiltrada + $fecha->totalMesa;
             }
         }

        //  dd($arrayFechasFiltradas , $totalFechaFiltrada);
         return[
             'totalFiltroFecha'=>  $totalFechaFiltrada,
             'arrayFiltradoFecha'=> $arrayFechasFiltradas
         ];
    }
}

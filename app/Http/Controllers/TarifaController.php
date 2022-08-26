<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTarifaRequest;
use App\Http\Requests\UpdateTarifaRequest;
use App\Models\Tarifa;
use App\Models\Ltd;
use App\Models\Servicio;

use Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TarifaController extends Controller
{

    const INDEX_r = "tarifas.index";

    const DASH_v = "tarifa.dashboard";
    const CREAR_v = "tarifa.crear";
    const EDITAR_v = "tarifa.editar";
    const SHOW_v = "tarifa.show";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);    
            $tabla = Tarifa::where('estatus',1)
                    ->get();

            $pluckLtd = Ltd::where('estatus',1)
                                ->pluck('nombre','id');

            $pluckServicio = Servicio::where('estatus',1)
                    ->pluck('nombre','id');

            return view(self::DASH_v 
                    ,compact("tabla", "pluckLtd", "pluckServicio")
                );

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." Exception");    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);    
            $tabla = array();

            $pluckLtd = Ltd::where('estatus',1)
                                ->pluck('nombre','id');

            $pluckServicio = Servicio::where('estatus',1)
                                ->pluck('nombre','id');
            return view(self::CREAR_v 
                    ,compact("tabla","pluckLtd", "pluckServicio")
                );
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::info("Error general ");       
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTarifaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTarifaRequest $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        try {
            
            Tarifa::create($request->except('_token'));

            $tmp = sprintf("El registro de la nueva TARIFA '%s', fue exitoso",$request->get('nombre'));
            $notices = array($tmp);
  
            return \Redirect::route(self::INDEX_r) -> withSuccess ($notices);

        } catch(\Illuminate\Database\QueryException $ex){ 
            Log::info(__CLASS__." ".__FUNCTION__." "."QueryException");
            Log::debug($ex->getMessage()); 
            return \Redirect::back()
                ->withErrors(array($ex->errorInfo[2]))
                ->withInput();

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__." "."Exception");
            Log::debug( $e->getMessage() );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarifa $tarifa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarifa $tarifa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarifaRequest  $request
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarifaRequest $request, Tarifa $tarifa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarifa  $tarifa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarifa $tarifa)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ltd;
use App\Http\Requests\StoreLtdRequest;

use Log;

class LtdController extends Controller
{
    const INDEX = "ltds.index";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);    
            $tabla = array();
            return view('ltd.dashboard' 
                    ,compact("tabla")
                );
        } catch (Exception $e) {
                
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
            return view('ltd.crear' 
                    ,compact("tabla")
                );
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLtdRequest $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        try {
            //dd(  );
            $tmp = sprintf("El registro del nuevo LTD '%s', fue exitoso",$request->get('nombre'));
            $notices = array($tmp);
  

        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
            Log::debug( $e->getMessage() );
        }

        return \Redirect::route(self::INDEX) -> withSuccess ($notices);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ltd  $ltd
     * @return \Illuminate\Http\Response
     */
    public function show(Ltd $ltd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ltd  $ltd
     * @return \Illuminate\Http\Response
     */
    public function edit(Ltd $ltd)
    {
        try {
            Log::info(__CLASS__." ".__FUNCTION__);    
            $tabla = array();
            return view('ltd.editar' 
                    ,compact("tabla")
                );
        } catch (Exception $e) {
            Log::info(__CLASS__." ".__FUNCTION__);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ltd  $ltd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ltd $ltd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ltd  $ltd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ltd $ltd)
    {
        //
    }
}

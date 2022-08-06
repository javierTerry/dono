<?php

namespace App\Http\Controllers;

use App\Models\Ltd;
use Illuminate\Http\Request;

use Log;

class LtdController extends Controller
{
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
        //
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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCotizadorRequest;
use App\Http\Requests\UpdateCotizadorRequest;
use App\Models\Cotizador;

class CotizadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCotizadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCotizadorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizador $cotizador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizador $cotizador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCotizadorRequest  $request
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCotizadorRequest $request, Cotizador $cotizador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizador  $cotizador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizador $cotizador)
    {
        //
    }
}

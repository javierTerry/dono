@extends('dashboard')
@section('content')

@include('guia.dashboard.header')

<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header bg-transparent border-bottom-0">
                <div>
                    <label class="main-content-label mb-2">Creacion de Guia</label> <span class="d-block tx-12 mb-0 text-muted">Introduce los datos del remitente y destino</span>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            @include("guia.crear.seccion1")
            @include("guia.crear.seccion2")
            @include("guia.crear.seccion3")
        <!-- Inicio Row Botones-->
        
            @include("guia.crear.botones")
        </div>
        <!-- Fin Row Botones-->
    </div>
</div>
<!-- End Row -->
@endsection
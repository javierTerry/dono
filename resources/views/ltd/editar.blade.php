@extends('dashboard')
@section('content')



<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header bg-transparent border-bottom-0">
                <div>
                    <label class="main-content-label mb-2">Creacion de LTD</label> <span class="d-block tx-12 mb-0 text-muted">Seccion para crear un proveedor de mensajeria</span>
                </div>
            </div>
        </div>
        {!! Form::model($ltd,['route' => ['ltds.update',$ltd], 'method' => 'PUT' , 'class'=>'parsley-style-1', 'id'=>'generalForm' ]) !!}
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header bg-transparent border-bottom-0">
                            @include('ltd.crear.campos.campos')

                        </div>
                    </div>
                    <div>
                        <a href="{{ route('ltds.index') }}" class="btn badge-dark" >Cancelar</a>
                        <button type="submit" class="btn btn-primary ml-3" >Guardar</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<!-- End Row -->

<!-- END Page -->
@endsection
<!--Row-->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card mg-b-20">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="exportGeneral" class="table table-striped table-bordered text-nowrap" >
                        <thead>
                            <tr>
                                <th>CLAVE</th>
                                <th>USUARIO</th>
                                <th>MENSAJERIA</th>
                                <th>REMITENTE</th>
                                <th>DESTINATARIO</th>
                                <th>TIPO DE ENVIO</th>
                                <th>PIEZAS</th>
                                <th>ESTATUS</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>   
                            @foreach( $tabla as $key => $item)
                            <tr>
                                <td>{{ $item['clave'] }}</td>
                                <td>{{ $item['users_id'] }}</td>
                                <td>{{ $item['id_mensajeria'] }}</td>
                                <td>{{ $item['remitente_clave'] }}</td>
                                <td>{{ $item['destinatario_clave'] }}</td>
                                <td>{{ $item['tipo_envio'] }}</td>
                                <td>{{ $item['piezas'] }}</td>
                                <td>{{ $item['estatus'] }}</td>
                                <td class="text-center">    
                                    <a href="{{ route('envio.edit', $item['clave']) }}" class="text-warning tx-28" >
                                        <i class="pe-7s-note"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                              <td colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row-->
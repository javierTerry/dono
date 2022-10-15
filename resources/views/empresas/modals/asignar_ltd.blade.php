<div class="modalAsignarLtd modal fade" id="asignarLtd{{ $objeto->id }}" tabindex="-1" role="dialog" aria-labelledby="modalAsignarLtd" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Asignar LTD a la Empresa</h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            	<span aria-hidden="true">×</span>
	            </button>
	        </div>
	      	{!! Form::open([ 'route' => ['api.empresaltd.store'], 'metdod' => 'POST',		 	'class'=>'parsley-style-1', 'id'=>'generalForm' ]) 
	      	!!}
      		@csrf

	    	<div class="modal-body">
	        	<p class="bigger-50 bolder center grey">
					<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
					Selecciona los LTD para la empresa '{{ $objeto->nombre }}'.  	
				</p>

				<div class="col-lg-12">
					<div class="form-group ">
						<div class="selectgroup selectgroup-pills">
							

							@foreach ($ltds as $ltd)
							    <label class="selectgroup-item ">
									{{ Form::checkbox('value[]', $ltd->id
										, isset($ltdActivo[$objeto->id][$ltd->id]) ? 1 : 0
										, array('class'=>'selectgroup-input'
											,'name'		=> $ltd->nombre) 
									)}}
									<span class="selectgroup-button">{{ $ltd->nombre }}</span>
								</label>
							@endforeach		
						</div><!--Fin class="selectgroup selectgroup-pills -->
					</div><!-- Fin div class="form-group " -->
				</div><!-- Fin div class="col-lg-12" -->
	      	</div><!-- Fin div class="modal-body" -->
		    <div class="modal-footer">
		      	<button id="{{$objeto->id}}" class="btnAsignarLtd btn btn-primary" type="button" >Asignar</button>
				<a class="btn badge-dark" data-dismiss="modal">Cerrar</a>	
		    </div> <!-- modal-footer -->
		    

		    {!! Form::hidden($objeto->id
			    , $objeto->id
			    ,['class'       => 'form-control'
			        ,'id'       => 'empresa_id'
			        ,'name'		=> 'empresa_id'
			        
			    ])
			!!}
			{!! Form::close() !!}
	    </div> <!-- modal-content -->
  	</div> <!-- modal-dialog -->
</div> <!--modal fad -->
<div class="payment-type d-flex mg-b-20">
	<input type="radio" name="radio3" id="credit" value="credit" >
		<label class="credit-label payment-cards four ml-0 col" for="credit">
			<span class="d-none d-md-block">ESTAFETA</span>
			<img src="{{ asset('img/png-transparent-estafeta.png') }}" alt="estafeta">
			
			<div class="text-right">
				<a href="" data-toggle="modal" data-target="#deleteModal" class="remove-list text-danger tx-20 remove-button" data-abc="true" alt="Eliminar"><i class="fa fa-trash" alt="Eliminar"></i></a>
			
				<a href="{{ route('ltds.edit', 1) }}" class="text-info tx-20" data-abc="true">
					<i class="fe fe-edit"></i>
				</a>
			</div>
			
		</label>

	<input type="radio" name="radio3" id="debit" value="debit">
		<label class="debit-label payment-cards four col" for="debit">
			<span class="d-none d-md-block">DHL</span><img src="../../assets/img/mastercard.png" alt="Debitcard">
		</label>

	<input type="radio" name="radio3" id="amex" value="amex">
		<label class="amex-label payment-cards four col" for="amex">
			<span class="d-none d-md-block">REDPACK</span>
			<img src="../../assets/img/amex.png" alt="amexg1096">
		</label>
</div>

<!-- Terminos y Condiciones Modal -->
@include('ltd.crear.modals.eliminar')
<!-- End Basic modal -->
<div>
	<style>
		table {
		  border: 1px solid #ccc;
		  border-collapse: collapse;
		  margin: 0;
		  padding: 0;
		  width: 100%;
		  table-layout: fixed;
		}

		table caption {
		  font-size: 1.5em;
		  margin: .5em 0 .75em;
		}

		table tr {
		  background-color: #f8f8f8;
		  border: 1px solid #ddd;
		  padding: .35em;
		}

		table th,
		table td {
		  padding: .625em;
		  text-align: center;
		}

		table th {
		  font-size: .85em;
		  letter-spacing: .1em;
		  text-transform: uppercase;
		}

		@media screen and (max-width: 600px) {
		  table {
		    border: 0;
		  }

		  table caption {
		    font-size: 1.3em;
		  }
		  
		  table thead {
		    border: none;
		    clip: rect(0 0 0 0);
		    height: 1px;
		    margin: -1px;
		    overflow: hidden;
		    padding: 0;
		    position: absolute;
		    width: 1px;
		  }
		  
		  table tr {
		    border-bottom: 3px solid #ddd;
		    display: block;
		    margin-bottom: .625em;
		  }
		  
		  table td {
		    border-bottom: 1px solid #ddd;
		    display: block;
		    font-size: .8em;
		    text-align: right;
		  }
		  
		  table td::before {
		    /*
		    * aria-label has no advantage, it won't be read inside a table
		    content: attr(aria-label);
		    */
		    content: attr(data-label);
		    float: left;
		    font-weight: bold;
		    text-transform: uppercase;
		  }
		  
		  table td:last-child {
		    border-bottom: 0;
		  }
		}
	</style>
		<div class="container">
			<div class="sap_tabs" align="center">
				<div class="new_arrivals">
					<div class="container">
						<div class="row"><br>
							<div class="col-md-12">
								<h3 style="color:#eb646b;">Carrito <span>de Compras</span></h3>
							</div>
							<div class="col-md-12">
								@if (count(Cart::getContent()))
									<div class="row">
											<table class="table table-striped table-hover">
												<thead>
												<tr>
													<th scope="col">Producto</th>
													<th scope="col">Precio</th>
													<th scope="col">Cantidad</th>
													<th scope="col">Subtotal</th>
													<th scope="col">Acciones</th>
												</tr>
											</thead>
											<tbody>
												@php
													$total=0;
													$cartCollection = Cart::getContent();
													$cart = $cartCollection->sort();
												@endphp 
												@foreach ($cart as $value)
													@if ($value->attributes->tipo == "producto")
														<tr>
															<td scope="row" data-label="Producto"><img src="{{ asset('/images/productos/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;"> {{ $value->name }}</td>
															<td data-label="Precio">{{number_format($value->price, 0, '', '.') }}</td>
															<td data-label="Cantidad">
																<button class="btn btn-success" wire:click="cantidad('{{ $value->id }}', -1)"><span class="glyphicon glyphicon-minus" aria-hidden="true"></button>
																<b style="padding: 5px">{{ $value->quantity }}</b>
																<button class="btn btn-success" wire:click="cantidad('{{ $value->id }}', 1)"><span class="glyphicon glyphicon-plus" aria-hidden="true"></button></td>
															<td data-label="Subtotal">{{number_format($value->price*$value->quantity, 0, '', '.') }}</td>
															<td data-label="Acciones"><button class="btn btn-danger" wire:click="deletecarrito('{{ $value->id }}')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></button></td>
														</tr>
														@php
															$total+=$value->price*$value->quantity;
														@endphp
													@endif
												@endforeach
												<tr>
													<td colspan="4" style="text-align: left !important;"><b>Total:</b></td>
													<td>{{number_format($total, 0, '', '.') }}₲</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="row">
										<div class="col-12" align="center">
											<a href="{{ url('comprar') }}"><button type="button" class="item_add single-item hvr-outline-out button2"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Confirmar datos para comprar</button></a><br><br>
										</div>
									</div>
								@else
									El carrito está vacío <br><br><br>
								@endif
							</div>
						</div>	
					</div>
				</div>		  	 
			</div>
		</div>
</div>

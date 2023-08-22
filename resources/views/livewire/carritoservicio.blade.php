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
    <div class="container mt-3"><br>
		<div class="wthree_head_section">
			<h3 class="w3l_header">Cita <span>para Servicios</span></h3>
		</div>
    	@if (count(Cart::getContent()))
    		<div class="row">
					<table class="table table-striped table-hover">
						<thead>
					    <tr>
					      	<th scope="col">Servicio</th>
					      	<th scope="col">Precio</th>
					      	<th scope="col">Subtotal</th>
					      	<th scope="col">Acciones</th>
					    </tr>
					</thead>
					<tbody>
						@php
							$total=0;
						@endphp 
						@foreach (Cart::getContent() as $value)
							@if ($value->attributes->tipo == "servicio")
								<tr>
									<td scope="row" data-label="Producto" style="text-align: left !important"><img src="{{ asset('/images/servicios/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;"> {{ $value->name }}</td>
									<td data-label="Precio">{{number_format($value->price, 0, '', '.') }}</td>
									<td data-label="Subtotal">{{number_format($value->price*$value->quantity, 0, '', '.') }}</td>
									<td data-label="Acciones"><button class="btn btn-danger" wire:click="deletecarritoservicio('{{ $value->id }}')"><i class="fa fa-times-circle"></i></button></td>
								</tr>
								@php
									$total+=$value->price*$value->quantity;
								@endphp
							@endif
						@endforeach
						<tr>
							<td colspan="3" style="text-align: left !important;"><b>Total:</b></td>
							<td>{{number_format($total, 0, '', '.') }} ₲</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
		      	<div class="col-12" align="center">
			        <a href="{{ url('agendarcita') }}"><button type="button" class="btn btn-success"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Confirmar datos para solicitar servicios</button></a><br><br>
		      	</div>
	      	</div>
		@else
			El carrito está vacío <br><br><br>
		@endif
    </div>
</div>

<div>
	<style>
		#carrito {
			text-decoration: none;
			position: fixed;
			width: 55px;
			height: 45px;
			bottom: 35px;
			left: 2%;
			overflow: hidden;
			z-index: 999;
			border: none;
		}
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
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 footer-left">
				<h2><a href="{{url('/')}}"><img src="{{asset('images/empresa/'.$empresa->logo)}}" width="100px;" /></a></h2>
				<p><?php
		            $texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
		            echo substr($texto, 0, 300); 
		        ?></p>
			</div>
			<div class="col-md-9 footer-right">
				<div class="row">
					<div class="col-md-6 sign-gd">
						<h4>Información</h4>
						<ul>
							<li><a href="{{ url('/quienessomos') }}">Quienes Somos</a></li>
							<li><a href="{{ url('/productos') }}">Productos</a></li>
							<li><a href="{{ url('/servicios') }}">Servicios</a></li>
							<li><a href="{{ url('/contacto') }}">Contacto</a></li>
						</ul>
					</div>
					
					<div class="col-md-6 sign-gd-two">
						<h4>Información de nuestra tienda</h4>
						<ul>
							<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Dirección : {{ $empresa->direccion }}</li>
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:{{ $empresa->correo }}">{{ $empresa->correo }}</a></li>
							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Contacto : <a href="tel:{{ $empresa->telefono1 }}">{{ $empresa->telefono1 }}</a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
			<p class="copy-right">{{ $empresa->nombre }} | Desarrollado por <a href="http://techcirclepy.com/" target="_blank">TechCircle</a></p>
		</div>
	</div>
	<!-- Modal Carrito -->
	<div class="modal fade" wire:init="openModal" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Carrito de Compras <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button></h5>
				</div>
				<div class="modal-body">
					@if (count(Cart::getContent()))
						<div class="row">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th scope="col">Producto</th>
										<th scope="col">Precio</th>
										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>
									@php
										$total=0;
									@endphp
									@foreach (Cart::getContent() as $value)
										@if ($value->attributes->tipo == "producto")
											<tr>
												<td scope="row" data-label="Producto"><img src="{{ asset('/images/productos/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
												<td data-label="Precio">{{number_format($value->price, 0, '', '.') }}</td>
												<td data-label="Acciones"><button class="btn btn-danger" wire:click="deletecarrito('{{ $value->id }}')"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></button></td>
											</tr>
											@php
												$total+=$value->price*$value->quantity;
											@endphp
										@endif
									@endforeach
									<tr>
										<td colspan="2"><b>Total:</b></td>
										<td>{{number_format($total, 0, '', '.') }} ₲</td>
									</tr>
								</tbody>
							</table>
						</div>
					@else
						El carrito está vacío
					@endif
				</div>
				<div class="modal-footer">
					<button type="button" class="item_add single-item hvr-outline-out button2" data-dismiss="modal">Seguir comprando</button>
					<a href="{{ url('/carrito') }}"><button type="button" class="item_add single-item hvr-outline-out2 button2"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i></button></a>
				</div>
			</div>
		</div>
	</div>
	<p>
		<button class="btn btn-warning" id="carrito" data-toggle="modal" data-target="#exampleModalCenter"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> 
			@php
				$contador=0;
			@endphp
			@foreach (Cart::getContent() as $value)
				@if ($value->attributes->tipo == "producto")
					@php
						$contador+=1;
					@endphp
				@endif
			@endforeach
			@if ($contador > 0)
				<span class="badge badge-pill badge-success carritocontenido">
					{{ $contador }}
				</span>
			@endif
		</button>
	</p>
	<!-- //footer -->
</div>
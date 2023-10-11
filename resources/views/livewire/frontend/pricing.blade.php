<div>
	<?php
		function isMobile() {
			return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
		}
		if(isMobile()){
			$divisor=2;
		}else {
			$divisor=4;
		}
	?>
	<!-- product-nav -->
	<script src="{{asset('frontend/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true   // 100% fit in a container
			});
		});			
	</script>
	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div id="col-md-12"><br>
					<h1 style="color:#eb646b;text-align: center;">Nuestros <span>Productos</span></h1>
					<p>Aquí encontrarás las mejores productos al mejor precio.</p><br>
				</div>
				<div id="col-md-12">
					<input type="search" placeholder="Buscar producto" class="form-control" wire:model="search"><br>
				</div>	
			</div>
			<div class="row">
				@php $cont=1; @endphp
				@foreach ($productos as $value)
					<div class="col-xs-6 col-md-3">
						<div class="product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="/images/productos/{{ $value->foto }}" alt="" class="pro-image-front">
									<img src="/images/productos/{{ $value->foto }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="/product/{{$value->slug}}" class="link-product-add-cart">Ver producto</a>
										</div>
									</div>
									@if($value->oferta)
										<span class="product-new-top" style="background-color: #eb646b !important;">Oferta</span>
									@endif
								</div>
								<div class="item-info-product ">
									<h4><a href="/product/{{$value->slug}}">{{$value->nombre}}</a></h4>
									<div class="info-product-price">
										@if($value->oferta)
											<span class="item_price">{{number_format($value->oferta, 0, '', '.') }}</span>
											<del>{{number_format($value->precio, 0, '', '.') }}</del>
										@else
											<span class="item_price">{{number_format($value->precio, 0, '', '.') }}</span>
										@endif
									</div>
									@if (in_array($value->id, Cart::getContent()->pluck('id')->toArray()))
										<button type="button" class="item_add single-item hvr-outline-out2 button2" wire:click="deletecarrito({{ $value->id }})">
											<i class="fa fa-check-circle-o"></i> Agregado al carrito
										</button>
									@else
										<button type="button" class="item_add single-item hvr-outline-out button2" wire:click="addcarrito({{ $value->id }})">
											<i class="fa fa-shopping-cart"></i> Agregar al carrito
										</button>
									@endif										
								</div>
							</div>
						</div>
					</div>
					@if($cont%$divisor==0)
						</div><div class="row">
					@endif
					@php $cont+=1; @endphp
				@endforeach
			</div>
			<div class="row">
				<div class="col-md-12">
					{{ $productos->links() }} 
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>	
</div>
<div>
        <div class="new_arrivals"><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" align="center">
                        <h1 style="color:#eb646b;">
                            @if($producto->tipo == 1)
                                Producto
                            @else
                                Servicio
                            @endif
                            <span>{{ $producto->nombre }}</span>
                        </h1>
                        <small class="para1">
                            <b>Compartir:</b>
                            <a href="https://wa.me?text=Mira%20este%20producto%20{{ Request::fullUrl() }}" target="_blank">
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-whatsapp" style="color:#fff;"></i>
                                </button>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}" target="_blank">
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-facebook" style="color:#fff;"></i>
                                </button>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text= Mira%20este%20producto&url={{ Request::fullUrl() }}" target="_blank">
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-twitter" style="color:#fff;"></i>
                                </button>
                            </a>
                        </small><br><br>
                    </div>
                </div>	 
                <div class="row">
                    <div class="col-md-6">
                        @if($producto->tipo == 1)
                            <img src="/images/productos/{{$producto->foto}}" width="100%" style="border-radius: 50px;">
                        @else
                            <img src="/images/servicios/{{$producto->foto}}" width="100%" style="border-radius: 50px;">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p class="para1"><?=  $producto->descripcion  ?></p><hr>
                        <div class="row">
                            @if($producto->oferta)
                                <div class="col-md-6">
                                    <span class="blockquote-footer"><b>| Precio: </b><strike>{{number_format($producto->precio, 0, '', '.')}}</strike> <span class="sup">₲</span></span>
                                </div>
                                <div class="col-md-6">
                                    <span class="blockquote-footer"><b>| Oferta: </b>{{number_format($producto->oferta, 0, '', '.')}} <span class="sup">₲</span></span>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <span class="blockquote-footer"><b>| Precio: </b>{{number_format($producto->precio, 0, '', '.')}} <span class="sup">₲</span></span>
                                </div>
                            @endif
                        </div><hr>
                        <center>
                            @if (in_array($producto->id, Cart::getContent()->pluck('id')->toArray()))
                                <button type="button" class="item_add single-item hvr-outline-out2 button2" wire:click="deletecarrito({{ $producto->id }})">
                                    <i class="fa fa-check-circle-o"></i> Agregado al carrito
                                </button>
                            @else
                                <button type="button" class="item_add single-item hvr-outline-out button2" wire:click="addcarrito({{ $producto->id }})">
                                    <i class="fa fa-shopping-cart"></i> Agregar al carrito
                                </button>
                            @endif
                        </center>
                    </div>	
                </div>
                <div class="row">
                    <div class="col-md-12"><br>
                        <h3 style="color:#eb646b;">Productos relacionados</h3><br>
                    </div>
                    @foreach($productos as $value)
                        <div class="col-xs-6 col-md-2">
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
                    @endforeach
                </div>
            </div>
        </div>
	</div>
</div>
<div>
    <div class="row">
        <div class="col-md-12">
            @include('livewire.productos.create')
        </div>
        <div class="col-md-12">
            <input wire:model="search" class="form-control" type="search" placeholder="Buscar por código o nombre del producto">
        </div>
        <div class="col-md-12" align="right">
            <small>Filtro por {{$fila}} en orden @if($orden == "asc") ascendente @else descendente @endif</small>
        </div>
    </div>
    <div class="row table-responsive">
        @if ($productos->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="cursor:pointer" wire:click="ordenar('codigo')">Código</th>
                        <th style="cursor:pointer" wire:click="ordenar('nombre')">Producto</th>
                        <th style="cursor:pointer" wire:click="ordenar('precio')">Precio</th>
                        <th style="cursor:pointer" wire:click="ordenar('stock')">Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $pro)
                        <tr>
                            <td>{{ $pro->codigo }}</td>
                            <td>
                                @if($pro->foto)
                                    <img src="{{ asset('/images/productos/'.$pro->foto) }}" style="width:40px;border-radius:50px;">
                                @endif
                                {{ $pro->nombre }}
                            </td>
                            <td>
                                <p><b>Precio: </b>{{number_format($pro->precio, 0, '', '.') }}</p>
                                @if($pro->oferta)
                                    <p><b>Oferta: </b>{{number_format($pro->oferta, 0, '', '.') }}</p>
                                @endif
                                @if($pro->precio2)
                                    <p><b>Precio 2: </b>{{number_format($pro->precio2, 0, '', '.') }}</p>
                                @endif
                                @if($pro->precio3)
                                    <p><b>Precio 3: </b>{{number_format($pro->precio3, 0, '', '.') }}</p>
                                @endif
                            </td>
                            <td>{{ $pro->stock }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" wire:click="$set('producto_id', {{ $pro->id }})" data-target="#viewModal{{ $pro->id }}"><i class="far fa-eye"></i></button>
                                <!-- Modal view-->
                                @include('livewire.productos.modal.modalwievproducto')
                                <button wire:click="edit({{ $pro->id }})" class="btn btn-sm btn-info"><i class="far fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $pro->id }}"><i class="far fa-trash-alt"></i></button>
                                <!-- Modal  delete-->
                                @include('livewire.productos.modal.modaldelete')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col-12 alert alert-info">
                No se encuentran registros para {{ $search }}
            </div>
        @endif
        <div class="col-md-12">
            {{$productos->links()}}
        </div>
    </div>


    @section('adminlte_js')
        <script> console.log('Hi!, {{Auth::user()->name}}'); </script>
        <script>
            window.livewire.on('alert', param => {
                toastr[param['type']](param['message']);
            });
        </script>
        <script>
            $('#descripcion').summernote({
                height: 50,
                codemirror: {
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('descripcion', contents);
                    }
                }
            });

            Livewire.on('descripcion', descripcion => {
                $('#descripcion').summernote('code', descripcion);
            });

            $("#nombre").keyup(function () {
                var value = $(this).val();
                var slug = function(str) {
                    var $slug = '';
                    var trimmed = $.trim(str);
                    $slug = trimmed.replace(/ß/g,"ss").
                    replace(/ /g,"-").
                    replace(/[àáâãäå]/g,"a").
                    replace(/æ/g,"ae").
                    replace(/ç/g,"c").
                    replace(/[èéêë]/g,"e").
                    replace(/[ìíîï]/g,"i").
                    replace(/ñ/g,"n").
                    replace(/[òóôõö]/g,"o").
                    replace(/œ/g,"oe").
                    replace(/[ùúûü]/g,"u").
                    replace(/[ýÿ]/g,"y");
                    return $slug.toLowerCase();
                }
                @this.set('slug', slug(value));
            });

            $('#categorias_id').select2();
            $('#categorias_id').on('change', function (e) {
                var data = $('#categorias_id').select2("val");
                @this.set('categorias_id', data);
            });
            Livewire.on('categorias_id', categorias_id => {
                if(categorias_id){
                    const categorias = [];
                    categorias_id.map(getitems);
                    function getitems(item) {
                        categorias.push(item.categoria_id);
                    }
                    $('#categorias_id').val(categorias).trigger('change');
                }else{
                    $('#categorias_id').val(null).trigger('change');
                }
            });

            // Separador de miles
            function formatNumber(n) {
                n = String(n).replace(/\D/g, ""); // Eliminar caracteres no numéricos
                return n === '' ? n : n.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
            $(".number").keyup(function(e){
                const element = e.target;
                const value = element.value;
                var Myelement = document.getElementById(element.id);
                var parse = formatNumber(value);
                Myelement.value = parse;
                @this.set(element.id, parse);
            });

            Livewire.on('precio', precio => {
                $('#precio').val(precio);
            });
            Livewire.on('precio2', precio2 => {
                $('#precio2').val(precio2);
            });
            Livewire.on('precio3', precio3 => {
                $('#precio3').val(precio3);
            });
            Livewire.on('oferta', oferta => {
                $('#oferta').val(oferta);
            });
            Livewire.on('stock', stock => {
                $('#stock').val(stock);
            });
            
        </script>
    @stop
</div>
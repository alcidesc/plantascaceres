@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h3>Editar Servicio</h3><hr>
@stop

@section('content')
    <style>
        /*-----  Css de botones para subir imagenes -----*/
        .thumb {
            width: 200px;
            border: 0px solid #000;
            margin: 10px 5px 0 0;
        }
        .yourBtn {
            width: 200px;
            padding: 10px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border: 1px dashed #BBB;
            text-align: center;
            cursor: pointer;
            margin: 0 auto;
        }
    </style>

    {!! Form::model($servicio,['method'=>'PATCH','route'=>['servicios.update',$servicio->id],'files'=>'true']) !!}
    {{Form::token()}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group" align="center">
                            <label>Foto del servicio:</label><br>
                            <output id="list">
                                @if($servicio->foto)
                                <img src="{{asset('images/servicios/'.$servicio->foto)}}" class="img-responsive" alt="" style="width: 200px;" />
                                @else
                                    <img src="{{asset('imgsystem/producto.png')}}" class="img-responsive" alt="" style="width: 200px;" />
                                @endif
                            </output>
                            <div class="yourBtn" onclick="getFile()">
                                <img src="{{asset('imgsystem/flechita.svg')}}" alt=""> <span>Subir Imagen&hellip;</span>
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input id="files" type="file" value="upload" name="foto" onchange="sub(this)" accept="image/jpeg, image/png, image/bmp" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Nombre del servicio:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shopping-bag"></i></span>
                            </div>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{$servicio->nombre}}" name="nombre" placeholder="Nombre del servicio">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="informacion">Descripción del servicio</label>
                            <textarea name="description" id="informacion" class="textarea form-control" style="width: 100%" placeholder="Escriba el cuerpo del mensaje" cols="30" rows="10" required>{{ $servicio->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"><br>
                        <label>Precio de venta:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="text" id="precio" value="{{ number_format($servicio->precio, 0, '', '.') }}" name="precio" class="number form-control @error('precio') is-invalid @enderror" placeholder="Precio de venta">
                            @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6"><br>
                        <label>Precio de oferta:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            </div>
                            <input type="text" id="oferta" value="{{ number_format($servicio->oferta, 0, '', '.') }}" name="oferta" class="number form-control @error('oferta') is-invalid @enderror" placeholder="Precio de oferta">
                            @error('oferta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="informacion">Seleccione Categorias</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" class="form-select select2" name="categorias[]" multiple="multiple" required>
                                @foreach($categorias as $value)
                                    <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                                @endforeach
                            </select>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer" align="center">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Editar Servicio</button>
            </div>
        </div>
    {!!Form::close()!!}
    <script>
        function archivo(evt) {
            var files = evt.target.files; // FileList object
                 
            // Obtenemos la imagen del campo "file".
            for (var i = 0, f; f = files[i]; i++) {
                //Solo admitimos imágenes.
                if (!f.type.match('image.*')) {
                    continue;
                }
                 
                var reader = new FileReader();
                 
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Insertamos la imagen
                        document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
                 
                reader.readAsDataURL(f);
            }
        }
                 
        document.getElementById('files').addEventListener('change', archivo, false);

        function getFile() {
            document.getElementById("files").click();
        }

            function sub(obj) {
            var file = obj.value;
            var fileName = file.split("\\");
            //document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
            event.preventDefault();
        }
    </script>
@stop
@section('adminlte_js')
    <script>
        // Separador de miles
        function formatNumber (n) {
            n = String(n).replace(/\D/g, "");
            return n === '' ? n : Number(n).toLocaleString();
        }
        $(".number").keyup(function(e){
            const element = e.target;
            const value = element.value;
            var Myelement = document.getElementById(element.id);
            Myelement.value = formatNumber(value);
        });

        $(function () {
            // Summernote
            $('#informacion').summernote({
                height: '100%',
            });
        });
        $('.js-example-basic-multiple').select2();
        const categorias = [];
        @foreach($categoriaservicios as $cat)
            categorias.push({{$cat->categoria_id}});
        @endforeach
        $('.js-example-basic-multiple').val(categorias).trigger('change');
    </script>
@stop
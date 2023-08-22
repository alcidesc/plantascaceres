@extends('adminlte::page')

@section('title', 'Productos Recepcionados')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')
<div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-3">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Carpetas</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
            </div>
                </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                      <a href="#" class="nav-link">
                        <i class="far fa-envelope"></i> Productos Recibidos
                        <span class="badge bg-primary float-right">11</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-envelope-open"></i> Productos en proceso
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-trash-alt"></i> Productos entregados
                      </a>
                  </li>
                </ul>
            </div>
            <!-- /.card-body -->
            </div>
          </div>

          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
          
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Solicitud de compra de productos:</h5>
                <h6>Remitente: {{ $producto->usuario_id }}
                  <span class="mailbox-read-time float-right">{{ $producto->update_at }}</span></h6>
              </div>
           
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>{{ $producto->nombre }}</p>

                <p>Horario de Cita propuesto:</p>
                <p>{{ $producto->nombre }}</p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
  
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
            </div>
          </div>
        
        </div>
      </div>
    </section>
  </div>
  
</div>

</div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

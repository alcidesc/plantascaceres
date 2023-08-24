@extends('adminlte::page')

@section('title', 'Mensajes leidos')

@section('content_header')
    <h1>Mensajes</h1>
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
                        <i class="far fa-envelope"></i> Recibidos
                        <span class="badge bg-primary float-right">12</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-envelope-open"></i> Leidos
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="far fa-trash-alt"></i> Papelera
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
                <h5>Nuevo Mensaje desde la web</h5>
                <h6>Remitente: {{ $contacto->nombre }}
                  <span class="mailbox-read-time float-right">{{ $contacto->update_at }}</span></h6>
              </div>
           
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>{{ $contacto->mensaje }}</p>

                <p>Número de celular:</p>
                <p>{{ $contacto->celular }}</p>
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

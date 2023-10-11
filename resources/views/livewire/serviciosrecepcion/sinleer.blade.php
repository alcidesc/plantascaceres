<div class="col-md-9">
    <div class="card card-primary card-outline">
        <div class="card-header">
        <div class="card-tools">
            <div class="input-group input-group-sm">
                <input wire:model="search" class="form-control" type="search" placeholder="Buscar correo">
            <div class="input-group-append">
                <div class="btn btn-primary">
                        <i class="fas fa-search"></i>
                </div>
            </div>
            </div>
        </div>
        </div>
      
    <div class="card-body p-0"> 
        <div class="mailbox-controls">
        <!-- Check all button -->
        <div class="float-right">
            {{ $servicio->links() }}
        </div>
        </div>
        <div class="table-responsive mailbox-messages">
            @if ($servicio->count())
                @foreach ($servicio as $value)  	    			
                    <table class="table table-hover table-striped" >
                		<tbody >
                  			<tr >
                        		<td class="mailbox-name"><a href="#" wire:click="leer({{ $value->id }})">{{ $value->name }}</a>
                        		</td>
                    			<td class="mailbox-subject" ><b>Solicitud de Agendamiento de Servicio</b>
                    			</td>
                    			<td class="mailbox-attachment" ></td>
                    			<td class="mailbox-date" >{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                  			</tr>
                  		</tbody>
            	   </table>
                @endforeach
            @else
                <table class="table table-hover table-striped" >
                    <tbody >
                        <tr >
                            <td>
                                Sin mensajes
                            </td>
                        </tr>
                    </tbody>
                </table>
	        @endif
        </div>
        </div>    
        <div class="card-footer p-0">
            <div class="mailbox-controls">
               
                <div class="float-right">
                    {{ $servicio->links() }}
                </div>
                <!-- /.float-right -->
            </div>
        </div>
    </div>
</div>

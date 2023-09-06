<div>
    <section class="content">
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
                        <a href="#" class="nav-link" wire:click="estado(0)">
                            <i class="far fa-envelope"></i> Recibidos
                            <span class="badge bg-primary float-right">{{ $contador }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" wire:click="estado('1')">
                            <i class="far fa-envelope-open"></i> Leidos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" wire:click="estado(2)">
                            <i class="far fa-trash-alt"></i> Papelera
                        </a>
                    </li>
                </ul>
            </div>
        		</div>
        	</div>
        	
    @if ($LeerMode)
        @include('livewire.correosadmin.leer')
    @else
        @include('livewire.correosadmin.sinleer')
    @endif

        </div>
    </section>
</div>
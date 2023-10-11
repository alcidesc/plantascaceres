<div>
	<div class="wthree-mid jarallax">
		<img class="jarallax-img" src="{{ asset('frontend/images/33.jpg')}}" alt="">
		<div class="container">
			<h1>{{ $empresa->nombre }}</h1>
			<p style="color: white !important">
				<?php
		            $texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
		            echo substr($texto, 0, 300); 
		        ?>
	        </p>
			<div class="botton">
				<a href="{{ url('/quienessomos')}}">Sobre Nosotros</a>
			</div>
		</div>
	</div>
</div>
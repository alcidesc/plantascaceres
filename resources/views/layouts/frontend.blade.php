<!DOCTYPE html>
<html>
	<head>
		{!! SEOMeta::generate() !!}
		{!! OpenGraph::generate() !!}
		{!! Twitter::generate() !!}
		{!! JsonLd::generate() !!}
		
		<!-- for-mobile-apps -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
				function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //for-mobile-apps -->
		<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
		<!-- pignose css -->
		<link href="{{asset('frontend/css/pignose.layerslider.css')}}" rel="stylesheet" type="text/css" media="all" />
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'> 

		<!-- //pignose css -->
		<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
		<!-- js -->
		<script type="text/javascript" src="{{asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
		<!-- //js -->
		<!-- cart -->
			<script src="{{asset('frontend/js/simpleCart.min.js')}}"></script>
		<!-- cart -->
		<!-- for bootstrap working -->
			<script type="text/javascript" src="{{asset('frontend/js/bootstrap-3.1.1.min.js')}}"></script>
		<!-- //for bootstrap working -->
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
		<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
		@livewireStyles

		<!-- Meta Pixel Code -->
			<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window, document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '317764454158746');
				fbq('track', 'PageView');
				</script>
				<noscript><img height="1" width="1" style="display:none"
				src="https://www.facebook.com/tr?id=317764454158746&ev=PageView&noscript=1"
				/></noscript>
				<!-- End Meta Pixel Code -->
	</head>
	<body>

		<livewire:info></livewire:info>
		
		<livewire:navbar></livewire:navbar>
	
	
		@yield('contenido')
	
	
		<livewire:footer></livewire:footer>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		@livewireScripts

		<script>
			window.livewire.on('alert', param => {
				toastr[param['type']](param['message']);
			});
		</script>
		@include('toastr.alertas')
	</body>
</html>

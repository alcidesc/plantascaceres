<!--/footer-->
<footer class="w3l-footer">
	<div class="w3l-footer-16 py-5">
		<div class="container py-md-5">
			<div class="row footer-p">
				<div class="col-lg-6 col-md-6 pe-lg-5">
					<h2><a href="{{url('/')}}"><img src="{{asset('images/empresa/'.$empresa->logo)}}" width="100px;" /></a></h2>
					<p><?php
						$texto = preg_replace ('/<[^>]*>/', ' ', $empresa->info);
						echo substr($texto, 0, 300); 
					?></p>
				</div>
				<div class="col-lg-6 col-md-6">
					<h4 class="mt-3">Let's Start Work With FinAgenc Today</h4>
				</div>
			</div>
			<div class="row footer-p mt-5 pt-lg-4">
				<div class="col-lg-4 col-md-6 pe-lg-5">
					<div class="column">
						<h3>Phone</h3>
						<p><a href="tel:+(21) 255 088 4943">+(21) 255 088 4943</a></p>
					</div>

					<div class="column mt-lg-5 mt-4">
						<h3>Address </h3>
						<p>FinAenc, Honey Street,Main Road
							London, UK - 62617.</p>
					</div>

				</div>
				<div class="col-lg-4 col-md-6">

					<div class="column">
						<h3>Support</h3>
						<p><a href="mailto:finagenc@mail.com" class="mail">finagenc@mail.com</a></p>
					</div>
					<div class="column mt-lg-5 mt-4">
						<h3>Follow</h3>
						<ul class="social">
							<li><a href="#facebook"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li><a href="#linkedin"><i class="fab fa-linkedin-in"></i></a>
							</li>
							<li><a href="#twitter"><i class="fab fa-twitter"></i></a>
							</li>
							<li><a href="#google"><i class="fab fa-google-plus-g"></i></a>
							</li>

						</ul>
					</div>

				</div>
				<div class="col-lg-4 col-md-6 mt-lg-0 mt-4 pl-xl-0">
					<h3>Newsletter</h3>
					<div class="end-column">
						<form action="#" class="subscribe d-flex" method="post">
							<input type="email" name="email" placeholder="Email Address" required="">
							<button class="btn btn-secondary"><i class="fas fa-paper-plane"></i></button>
						</form>
						<p class="mt-4">Subscribe to our mailing list and get updates to your email inbox.</p>
					</div>
				</div>
			</div>

			<div class="below-section pt-lg-4 mt-5">
				<div class="row">

					<p class="copy-text col-lg-7">&copy; 2022 FinAgenc. All rights reserved. Design by <a href="https://w3layouts.com/" target="_blank"> W3Layouts</a>
					</p>
					<div class="col-lg-5 w3footer-gd-links d-flex">

						<a href="#privacy">Privacy Policy</a>
						<a href="#terms" class="mx-3">Terms of service</a>
						<a href="#faq">FAQ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
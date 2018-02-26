<!-- Footer
================================================== -->
<div class="margin-top-15"></div>

<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="six columns">
			<h4>Vision</h4>
			<p style="text-align: justify;">Menjadi perusahaan bidang jasa yang terbaik di Indonesia yang mendatangkan kebaikan bagi pengunjung, masyarakat, dan negara sehingga  menjadi aset berharga di dunia pariwisata.</p>
		</div>
		<div class="ten columns">
			<h4>MISION</h4>
			<ol style="list-style-type:disc">
                <li style="text-align: justify;"> Mengembangkan konsep bisnis jasa yang berkah, ramah, nyaman, dan mengutamakan pelayanan terbaik terhadap pelanggan.</li>
                <li style="text-align: justify;">Memberikan kualitas tinggi pada pengembangan lini bisnis pariwisata yang dikelola serta mengkombinasikannya dengan keunikan kearifan lokal budaya Indonesia.</li>
                <li style="text-align: justify;">Memperakukan pegawai sebagai modal yang harus dijaga dan dikembangkan melalui program pelatihan dan pengembangan yang berkelanjutan. </li>
            </ol>
		</div>
	</div>

	<div class="container">
		<div class="thirteen columns">
			<h4>Core Value</h4>
			<ol style="list-style-type:disc">
                <li style="text-align: justify;"> Sincerity</li>
                <li style="text-align: justify;"> Ownership</li>
                <li style="text-align: justify;"> Uniqueness</li>
                <li style="text-align: justify;"> Learning</li>
            </ol>
		</div>

		<div class="three columns">
			<h4>Company</h4>
			<ul class="footer-links">
				<li><a href="#">About Us</a></li>
				<li><a href="{{ route('fraud') }}">Fraud Information</a></li>
				<li><a href="{{ route('faq') }}">FAQ</a></li>
				<li><a href="#">Terms of Service</a></li>
				<li><a href="{{ route('privacy_policy') }}">Privacy Policy</a></li>
			</ul>
		</div>

	</div>
	<!-- Bottom -->
	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
				<div class="copyrights">©  Copyright 2017 by <a href="#">SAS Hospitality</a>. All Rights Reserved.</div>
			</div>
		</div>
	</div>

</div>

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<!-- Scripts
================================================== -->
<script src="{{ asset('scripts/jquery-2.1.3.min.js') }}"></script>
<script src="{{ asset('/js/jquery.priceformat.min.js')}}"></script>
<script src="{{ asset('scripts/custom.js?v=2') }}"></script>
<script src="{{ asset('scripts/jquery.superfish.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.showbizpro.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('scripts/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('scripts/waypoints.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.jpanelmenu.js') }}"></script>
<script src="{{ asset('scripts/stacktable.js') }}"></script>
<script src="{{ asset('scripts/headroom.min.js') }}"></script>


<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/js/jquery.steps.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('/js/moment.min.js') }}"></script>

<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap-timepicker.min.js')}}"></script>

<script src="{{ asset('/js/sweetalert.min.js')}}"></script>
 @yield('additional-script')
</body>
</html>


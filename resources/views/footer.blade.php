<div class="main-footer">
	<div class="footer">
		<div class="container">
			<div class="col-md-6 grid_3">
				<h4>Seeking</h4>
				<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
			</div>
			<div class="col-md-6 grid_3">
				<h4>Reminder when available a job</h4>
				{!! Form::open(['route' => 'subscribe', 'method' => 'post']) !!}
					<input type="text" name="email" class="form-control" placeholder="Enter your email">
					{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
					<button type="submit" class="btn red">Subscribe now!</button>
				{!! Form::close() !!}
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer_bottom">	
	<div class="container">
		<div class="clearfix"> </div>
		<div class="copy">
			<p>Copyright © SAS Hospitality. All Rights Reserved.</p>
		</div>
	</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/js/jquery.steps.js') }}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('/js/moment.min.js') }}"></script>

<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ asset('/js/jquery.priceformat.min.js')}}"></script>
<script src="{{ asset('/js/sweetalert.min.js')}}"></script>
</body>
</html>


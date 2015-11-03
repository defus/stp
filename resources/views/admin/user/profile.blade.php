@extends('layouts.master')

@section('title', 'Modifier votre profile - vue 360°')

@section('script')
<!-- form validation -->
<script type="text/javascript">
	$(document).ready(function () {
		$.listen('parsley:field:validate', function () {
			validateFront();
		});
		$('#resetPasswordForm .btn').on('click', function () {
			$('#resetPasswordForm').parsley().validate();
			validateFront();
		});
		var validateFront = function () {
			if (true === $('#resetPasswordForm').parsley().isValid()) {
				$('.bs-callout-info').removeClass('hidden');
				$('.bs-callout-warning').addClass('hidden');
			} else {
				$('.bs-callout-info').addClass('hidden');
				$('.bs-callout-warning').removeClass('hidden');
			}
		};
		
		$('#resetEmailForm .btn').on('click', function () {
			$('#resetEmailForm').parsley().validate();
			validateFront();
		});
		var validateFront = function () {
			if (true === $('#resetEmailForm').parsley().isValid()) {
				$('.bs-callout-info').removeClass('hidden');
				$('.bs-callout-warning').addClass('hidden');
			} else {
				$('.bs-callout-info').addClass('hidden');
				$('.bs-callout-warning').removeClass('hidden');
			}
		};
	});

	try {
		hljs.initHighlightingOnLoad();
	} catch (err) {}
</script>
<!-- /form validation -->
@endsection

@section('content')
<div class="row">

	@if (Session::has('errors'))
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<ul>
		@foreach (Session::get('errors')->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	@endif
	@if (Session::has('success'))
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		{{Session::get('success')}}
	</div>
	@endif
	
	<!-- form input mask -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Changez votre mot de passe</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left" method="post" action="{{url('/admin/user/reset-password')}}" data-parsley-validate id="resetPasswordForm">
					{!! csrf_field() !!}
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Ancien mot de passe</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control" name="password_old" required="" minlength="6" data-parsley-trigger="change" >
							<span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Nouveau mot de passe</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control" name="password" id="password" required="" minlength="6" data-parsley-trigger="change" >
							<span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Confirmer votre mot de passe</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control" name="password_confirmation" required="" minlength="6" data-parsley-equalto="#password" data-parsley-trigger="change" >
							<span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="ln_solid"></div>

					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-primary" name="ResetPassword">Modifier le mot de passe</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
	<!-- form input mask -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Changez votre email</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left"  method="post" action="{{url('/admin/user/reset-email')}}" data-parsley-validate id="resetEmailForm">
					{!! csrf_field() !!}

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="email" class="form-control" name="email" required="" data-parsley-maxlength="255">
							<span class="fa fa-at form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="ln_solid"></div>

					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-primary" name="ResetEmail">Modifier email</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
	<!-- form input mask -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Changez vos coordonnées</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Nom</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control">
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Téléphone</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control">
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-primary">Enregistrer</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- /col -->
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Désactivez votre compte</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form class="form-horizontal form-label-left">
							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-primary">Désactiver votre compte</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- /col -->
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
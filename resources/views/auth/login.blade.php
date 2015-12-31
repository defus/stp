@extends('layouts.auth')

@section('title', 'Connexion')

@section('script')
<!-- form validation -->
<script type="text/javascript">
	$(document).ready(function () {
		$.listen('parsley:field:validate', function () {
			validateFront();
		});
		$('#loginForm .btn').on('click', function () {
			$('#loginForm').parsley().validate();
			validateFront();
		});
		var validateFront = function () {
			if (true === $('#loginForm').parsley().isValid()) {
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
<div class="animate form">
	<section class="login_content">
		
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Oup's' !</strong>
			Erreur de connexion.<br><br>
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
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
		
		<form method="post" action="{{url('/auth/login')}}" data-parsley-validate id="loginForm">
				{!! csrf_field() !!}
			<h1>Connexion</h1>
			<div>
				<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required="" />
			</div>
			<div>
				<input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" required="" />
			</div>
			<div>
				<input type="checkbox" name="remember" value="{{ old('remember') }}"> Se souvenir de moi</input>
			</div>
			<div>
				<br/><button type="submit" class="btn btn-default submit" name="Connexion">Connexion</button>
				<a class="reset_pass" href="#">Mot de passe oublié ?</a>
			</div>
			<div class="clearfix"></div>
			<div class="separator">
				<p class="change_link">Nouvel utilisateur ?
					<a href="{{url('/auth/register')}}" class="to_register"> Créez un compte </a>
				</p>
				<div class="clearfix"></div>
				<br />
				<div>
					<a href="{{url('/')}}"><h1><i class="fa fa-truck" style="font-size: 26px;"></i> Transplateforme.com</h1></a>
					<p>©2015 Tous droits reservés. Transplateforme.com. Conditions d'utilisation</p>
				</div>
			</div>
		</form>
		<!-- form -->
	</section>
	<!-- content -->
</div>
@endsection
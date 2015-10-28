@extends('layouts.auth')

@section('title', 'Enregistrer')

@section('content')
<div class="animate form">
	<section class="login_content">
		
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Ohhhh !</strong>
			Il y a quelques problèmes avec votre saisie.<br><br>
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
		@endif
		
		<form method="POST" action="{{url('/auth/register')}}">
			{!! csrf_field() !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<h1>Créer votre compte</h1>
			<div>
				<input type="text" class="form-control" placeholder="Votre nom" name="name" value="{{ old('name') }}" required="" />
			</div>
			<div>
				<input type="text" class="form-control" placeholder="Nom de société" name="societe" value="{{ old('societe') }}" required="" />
			</div>
			<div>
				<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required="" />
			</div>
			<div>
				<input type="password" class="form-control" placeholder="Mot de passe" name="password" required="" />
			</div>
			<div>
				<input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="password_confirmation" required="" />
			</div>
			<div>
				<input type="text" class="form-control" placeholder="N° register de commerce" name="rc" value="{{ old('rc') }}" required="" />
			</div>
			<div>
				<input type="text" class="form-control" placeholder="Téléphone" name="tel" rvalue="{{ old('tel') }}" equired="" />
			</div>
			<div>
				Transporteur : <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> 
				Donneur d'ordre' : <input type="radio" class="flat" name="gender" id="genderF" value="F" />
			</div>
			<div>
				<br/><button type="submit" class="btn btn-success">S'inscrire</button>
			</div>
			<div class="clearfix"></div>
			<div class="separator">
				<p class="change_link">Déja membre ?
					<a href="{{url('/auth/login')}}" class="to_register"> Connexion </a>
				</p>
				<div class="clearfix"></div>
				<br />
				<div>
					<h1><i class="fa fa-paw" style="font-size: 26px;"></i> Shared Carrier Plateform</h1>
					<p>©2015 Tous droits reservés. Shared Carrier Plateform. Conditions d'utilisation</p>
				</div>
			</div>
		</form>
		<!-- form -->
	</section>
	<!-- content -->
</div>
@endsection
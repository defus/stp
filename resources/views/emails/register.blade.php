@extends('layouts.emails')

@section('titre', "Veuillez confirmer votre adresse email")

@section('content')
	<h1>Bonjour {{$user->name}},</h1>
	<p>Pour confirmer votre adresse email, veuillez cliquer sur le lien ci-dessous :</p>
	<a href="{{url('/auth/confirmation/' . $user->confirmation_code)}}" alt="Lien de confirmation d'inscription'">{{url('/auth/confirmation/' . $user->confirmation_code)}}</a>
	<br/><br/>
	<p>Merci encore une fois pour votre inscription sur Transplateforme.com.</p>
	<p>L'équipe Transplateforme.com</p> 
@endsection
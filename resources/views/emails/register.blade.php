@extends('layouts.emails')

@section('titre', "Veuillez confirmer votre adresse email")

@section('content')
	<h1>Bonjour {{$user->name}},</h1>
	<p>Pour confirmer votre adresse email, veuillez cliquer sur le lien ci-dessous :</p>
	<a href="{{url('/auth/confirmation')}}" alt="Lien de confirmation d'inscription'">{{url('/auth/confirmation')}}</a>
	<br/><br/>
	<p>Merci encore une fois de vous être inscrit sur STP.</p>
	<p- L'équipe</p> 
@endsection
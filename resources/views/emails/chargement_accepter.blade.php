@extends('layouts.emails')

@section('titre', "Votre réponse à la demande de chargement a été acceptée par le donneur d'ordre")

@section('content')
	<h1>Bonjour {{$user->name}},</h1>
    <p>Votre réponse à la demande de chargement a été acceptée par le donneur d'ordre sur la plateforme Transplateforme.com</P>
	<p>Pour consulter la réponse à la demande de chargement, veuillez cliquer sur le lien ci-dessous :</p>
	<a href="{{url('admin/chargement/' . $chargement->id . '/repondre')}}" alt="Lien de la demande de chargement">
        {{url('admin/chargement/' . $chargement->id . '/repondre')}}
    </a>
	<br/><br/>
	<p>Merci encore une fois pour votre confiance.</p>
	<p>L'équipe Transplateforme.com</p> 
@endsection
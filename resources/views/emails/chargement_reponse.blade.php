@extends('layouts.emails')

@section('titre', "Nouvelle réponsé à votre demande de chargement ajoutée par un transporteur")

@section('content')
	<h1>Bonjour {{$user->name}},</h1>
    <p>Une réponse à votre demande de chargement a été postée par un transporteur sur la plateforme Transplateforme.com</P>
	<p>Pour consulter la réponse à votre demande de chargement, veuillez cliquer sur le lien ci-dessous :</p>
	<a href="{{url('admin/chargement/' . $chargement->id)}}" alt="Lien de la demande de chargement">
        {{url('admin/chargement/' . $chargement->id)}}
    </a>
	<br/><br/>
	<p>Merci encore une fois pour votre confiance.</p>
	<p>L'équipe Transplateforme.com</p> 
@endsection
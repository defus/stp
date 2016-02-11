@extends('layouts.emails')

@section('titre', "Nouvelle demande de chargement ajoutée par un donneur d'ordre")

@section('content')
	<h1>Bonjour {{$user->name}},</h1>
    <p>Un donneur d'ordre a ajouté une nouvelle demande de chargement sur la plateforme Transplateforme.com</P>
	<p>Pour consulter la demande, veuillez cliquer sur le lien ci-dessous :</p>
	<a href="{{url('admin/chargement/' . $chargement->id . '/repondre')}}" alt="Lien pour répondre à la demande de chargement">
        {{url('admin/chargement/' . $chargement->id)}}
    </a>
	<br/><br/>
	<p>Merci encore une fois pour votre confiance.</p>
	<p>L'équipe Transplateforme.com</p> 
@endsection
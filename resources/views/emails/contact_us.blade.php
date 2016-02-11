@extends('layouts.emails')

@section('titre', "Mail d'un contact de la plateforme TransPlateforme.Com")

@section('content')
	<h1>Le contact {{$data['name']}}, d'email {{$data['email']}} vous a contacter.</h1>
	<br/><br/>
	<p>Le sujet est de son message est :</p>
	<h2>{{$data['sujet']}}</h2>
	<br/><br/>
	<p>Le messgae est :</p>
	<p><small>{{$data['message']}}</small></p>
	<br/><br/>
	<p>L'équipe Transplateforme.com</p> 
@endsection
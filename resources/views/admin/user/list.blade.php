@extends('layouts.master')

@section('title')
    @if ($typeListe == 'donneursordre')
        Consultation des donneurs d'ordres enregistrés dans la plateforme
    @endif
    @if ($typeListe == 'transporteurs')
        Consultation des transporteurs enregistrés dans la plateforme
    @endif
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
	
	@if(auth()->user()->confirmed == 0)
	<div class="alert alert-warning alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Votre email n'est pas encore confirmé ! <br/>Veuillez confirmer votre email en répondant au message que nous avons envoyé sur votre boîte email.
	</div>
	@endif
	
	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Liste des utilisateurs</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<p>Consultation des transporteurs et donneurs d'ordres enregistrés dans la plateforme</p>

				<!-- start project list -->
				<table class="table table-striped projects">
					<thead>
						<tr>
							<th style="width: 1%">#</th>
							<th style="width: 25%">Nom</th>
							<th style="width: 25%">Societé</th>
							<th style="width: 20%">Type</th>
							<th style="width: 20%">Adresse</th>
							<th style="width: 10%">#Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$user->id}}</td>
							<td>{{$user->name}}</td>
							<td>
								{{$user->societe}}
								<br/>
								<img src="{{url('/users/' . $user->logo)}}" alt="Logo de la société" style="width:56px;height:56px;"/>
							</td>
							<td>{{($user->c_type == 'T') ? 'Transporteur' : "Donneur d'ordre"}}</td>
							<td>{{$user->rue . ', ' .  $user->ville . ', ' . $user->pays}}</td>
							<td>
								<a href="{{url('/admin/user/' . $user->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Voir </a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<!-- end project list -->
				
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
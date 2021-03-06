@extends('layouts.master')

@section('title', 'Liste des demandes de chargements')

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
				<h2>{{$titre}}</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<p>Liste des ordres émises en cours</p>

				<!-- start project list -->
				<table class="table table-striped projects">
					<thead>
						<tr>
							<th style="width: 1%">#</th>
							@can(App\User::TRANSPORTEUR)
								<th style="width: 10%">Donneur d'ordre</th>
							@endcan
							<th style="width: 15%">Interval chargement</th>
							<th style="width: 20%">Lieu de chargement</th>
							<th style="width: 20%">Lieu de livaison</th>
							<th style="width: 15%">Type vehicule</th>
							<th style="width: 15">Type marchandise</th>
							@can(App\User::DONNEUR_ORDRE)
								<th style="width: 10%">Nombre de réponses</th>
								<th>Status</th>
							@endcan
							<th style="width: 10%">#Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($chargements as $chargement)
						<tr>
							<td>{{$chargement->id}}</td>
							@can(App\User::TRANSPORTEUR)
							<td>
								{{$chargement->owner->societe}}
								<br/>
								<img src="{{url('/users/' . $chargement->owner->logo)}}" alt="Logo de la société" style="width:56px;height:56px;"/>
							</td>
							@endcan
							<td>
								<a><b>Entre {{$chargement->depart_date}} et {{$chargement->depart_date_fin}}
								</b></a>
							</td>
							<td>
								<a><b>{{$chargement->depart_rue}}
									<br/>{{$chargement->depart_ville}}
								</b></a>
							</td>
							<td>
								<a><b>{{$chargement->arrivee_rue}}
									<br/>{{$chargement->arrivee_ville}}
								</b></a>
							</td>
							<td>
								<a><b>{{$chargement->type_vehicule}}</b></a>
							</td>
							<td>
								<a><b>{{$chargement->nature_marchandise}}</b></a>
							</td>
							@can(App\User::DONNEUR_ORDRE)
							<td>Reçues : {{$chargement->reponses()->count()}}
								<br/>Acceptées : {{$chargement->reponses()->where('statut', 'A')->count()}}
								<br/>Vues : {{$chargement->nombre_vue}}
							</td>
							<td>
								@if($chargement->statut === 'O')
									<button type="button" class="btn btn-warning btn-xs">En cours</button>
								@elseif($chargement->statut === 'A')
									<button type="button" class="btn btn-success btn-xs">Archivé</button>
								@endif
							</td>
							@endcan
							<td>
								@can(App\User::DONNEUR_ORDRE)
									<a href="{{url('/admin/chargement/' . $chargement->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Consulter les réponses </a>
								@endcan
								@can(App\User::TRANSPORTEUR)
									@if($chargement->reponses()->where('transporteur_id',Auth::user()->id)->count() <=0)
										<a href="{{url('/admin/chargement/'.$chargement->id.'/repondre')}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Répondre </a>
									@else
										<a href="{{url('/admin/chargement/'.$chargement->id.'/repondre')}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Voir ma réponse </a>
									@endif
								@endcan
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
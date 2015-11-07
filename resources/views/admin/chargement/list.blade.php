@extends('layouts.master')

@section('title', 'Liste des demandes de chargements')

@section('content')
<div class="row">

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
							@if(auth()->user()->c_type === 'T')
								<th style="width: 20%">Société</th>
							@endif
							<th style="width: 20%">Départ</th>
							<th style="width: 20%">Arrivée</th>
							<th style="width: 30%">Colis</th>
							@if(auth()->user()->c_type === 'O')
								<th style="width: 10%">Nombre de réponses</th>
								<th>Status</th>
							@endif
							<th style="width: 10%">#Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($chargements as $chargement)
						<tr>
							<td>{{$chargement->id}}</td>
							@if(auth()->user()->c_type === 'T')
							<td>
								{{$chargement->owner->societe}}
								<br/>
								<img src="{{url('/users/' . $chargement->owner->logo)}}" alt="Logo de la société" style="width:56px;height:56px;"/>
							</td>
							@endif
							<td>
								<a>Rue, ville, pays</a>
								<br />
								<small>date et heure de départ</small>
							</td>
							<td>
								<a>Rue, ville, pays</a>
								<br />
								<small>date et heure limite de livraison</small>
							</td>
							<td>
								<a>Frais de transit, Distance</a>
								<br />
								<small>Type de trajet, nature de marchandise, volume</small>
							</td>
							@if(auth()->user()->c_type === 'O')
							<td>10</td>
							<td>
								@if($chargement->statut === 'O')
									<button type="button" class="btn btn-warning btn-xs">En cours</button>
								@elseif($chargement->statut === 'A')
									<button type="button" class="btn btn-success btn-xs">Archivé</button>
								@endif
							</td>
							@endif
							<td>
								@if(auth()->user()->c_type === 'O')
									<a href="{{url('/admin/chargement/' . $chargement->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Consulter les réponses </a>
								@elseif(auth()->user()->c_type === 'T')
									<a href="{{url('/admin/chargement/2/repondre')}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Répondre </a>
								@endif
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
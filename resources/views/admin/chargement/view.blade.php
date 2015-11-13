@extends('layouts.master')

@section('title', "Consultation des réponses à la demande de chargement")

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
	
	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Détails de la demande de chargement</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<div class="col-md-9 col-sm-9 col-xs-12">

					<ul class="stats-overview">
						<li>
							<span class="name"> Nombre de réponses </span>
							<span class="value text-success"> {{$chargement_nombre}} </span>
						</li>
						<li>
							<span class="name"> Réponse la plus rescente </span>
							<span class="value text-success"> {{($reponse_rescent != NULL) ? $reponse_rescent->created_at : "N/A"}} </span>
						</li>
						<li class="hidden-phone">
							<span class="name"> Réponse ayant le petit prix </span>
							<span class="value text-success"> {{($reponse_petit_prix != NULL) ? $reponse_petit_prix->offre_financiere : "N/A"}} </span>
						</li>
					</ul>
					<br />

					<div>

						<h4>Liste des réponses reçues</h4>

						<!-- end of user messages -->
						<ul class="messages">
							@foreach($reponses as $reponse)
							<li {{($reponse->statut == 'A') ? 'class="well"' : ''}}>
								<img class="avatar" src="{{url('/users/' . $reponse->transporteur->logo)}}" alt="Logo de la société" />
								<div class="message_date">
									<h3 class="date text-info">{{$reponse->created_at->format('d')}}</h3>
									<p class="month">{{$reponse->created_at->format('F')}}</p>
								</div>
								<div class="message_wrapper">
									<h4 class="heading">{{ $reponse->transporteur->societe}}</h4>
									<p>Statut : 
										@if($reponse->statut == 'A')
										<a class="btn btn-success btn-xs">Acceptée</a>
										@else
										<a class="btn btn-warning btn-xs">Non acceptée</a>
										@endif
									</p>
									<p>Offre financière : {{ $reponse->offre_financiere}}</p>
									<blockquote class="message">{{ $reponse->a_propos}}</blockquote>
									<br/>
									@if($reponse->statut != 'A')
									<a href="{{url('/admin/chargement/'.$chargement->id.'/accepter/' . $reponse->id)}}" class="btn btn-sm btn-primary">Accepter l'offre</a>
									@endif
									<br/>
								</div>
							</li>
							@endforeach
						</ul>
						<!-- end of user messages -->

					</div>


				</div>

				<!-- start project-detail sidebar -->
				<div class="col-md-3 col-sm-3 col-xs-12">

					<section class="panel">

						<div class="x_title">
							<h2>Détails du chargement</h2>
							<div class="clearfix"></div>
						</div>
						<div class="panel-body">
							<div class="text-center mtop20">
								<a href="{{url('/admin/chargement/'.$chargement->id.'/archive')}}" class="btn btn-sm btn-primary">Archiver</a>
							</div>
							<h5>Statut</h5>
							<ul class="list-unstyled project_files">
								<li><button type="button" class="btn btn-warning btn-xs">En cours</button>
								</li>
							</ul>
							<h5>Départ</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Lieu : {{$chargement->depart_rue}}, 
											<br/>Vile : {{$chargement->depart_ville}}, 
											<br/>Pays : {{$chargement->depart_pays}}</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Date de départ : {{$chargement->depart_date}}</a>
								</li>
							</ul>
							<br/>
							<h5>Livraison</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Lieu : {{$chargement->arrivee_rue}}, 
											<br/>Vile : {{$chargement->arrivee_ville}}, 
											<br/>Pays : {{$chargement->arrivee_pays}}</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Date limite de livraison : {{$chargement->arrivee_date_limite}}</a>
								</li>
							</ul>
							<br/>
							<h5>Plus d'informations</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Frais de transit : {{$chargement->frais_transit}}
											<br/> Distance : {{$chargement->distance}} km</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Type de trajet : {{$chargement->type_trajet}}
											<br/>Nature de la marchandise : {{$chargement->nature_marchandise}}
											<br/>Type d'assurance : {{$chargement->type_assurance}}
											<br/>Poids : {{$chargement->poids}} Kg
											<br/>Volume : {{$chargement->volume}} m3
											<br/>Ce chargement contient t'il des articles dangereux ? : {{$chargement->produit_dangereux == 'N' ? 'NON' : 'OUI'}}<br/></a>
								</li>
							</ul>
							<br />
							<h5>Liste de colisage</h5>
							<table class="table">
								<thead>
									<tr>
										<th>Emballage</th>
										<th>Nombre d'unités</th>
										<th>Empilable ?</th>
									</tr>
								</thead>
								<tbody>
									@foreach($chargement->colis as $colis)
									<tr>
										<td>{{$colis->emballage}}</td>
										<td>{{$colis->nombre_unite}}</td>
										<td>{{($colis->empilable === 'O') ? 'Empilable' : 'Non empilable' }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							
						</div>

					</section>

				</div>
				<!-- end project-detail sidebar -->
				
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
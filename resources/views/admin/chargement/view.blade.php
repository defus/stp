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
							<span class="name"> Nombre de vues </span>
							<span class="value text-success"> {{$chargement->nombre_vue}} </span>
						</li>
					</ul>
					<br />

					<div>

						<h4>Liste des réponses reçues</h4>

						<!-- end of user messages -->
						<ul class="messages">
							@foreach($reponses as $reponse)
							<li {{($reponse->statut == 'A') ? 'class="well"' : ''}}>
								<a href="{{url('/admin/user/' . $reponse->transporteur->id)}}"><img class="avatar" src="{{url('/users/' . $reponse->transporteur->logo)}}" alt="Logo de la société" /></a>
								<div class="message_date">
									<h3 class="date text-info">{{$reponse->created_at->format('d')}}</h3>
									<p class="month">{{$reponse->created_at->format('F')}}</p>
								</div>
								<div class="message_wrapper">
									<h4 class="heading"><a href="{{url('/admin/user/' . $reponse->transporteur->id)}}">{{ $reponse->transporteur->societe}}</a></h4>
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
								<li><button type="button" class="btn btn-warning btn-xs">En cours</button></li>
								<li>Nombre de vues : {{$chargement->nombre_vue}}</li>
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
							<h5>Marchandise</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Distance : {{$chargement->distance}} km</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Type de trajet : {{$chargement->type_trajet}}
											<br/>Nature de la marchandise : {{$chargement->nature_marchandise}}
											<br/>Poids : {{$chargement->poids}} Kg
											<br/>Type de véhicule : {{$chargement->type_vehicule}}
											<br/>Nombre de voyages : {{$chargement->nombre_voyage}}<br/></a>
								</li>
							</ul>
							<br />
							<h5>Paiement</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Moyen de paiement : {{$chargement->mode_paiement}}</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Délai de paiement : {{$chargement->delai_paiement}}
											<br/>Type de prix : {{$chargement->type_prix}}
											<br/>Prix fixe : {{$chargement->prix_fixe}} {{$chargement->devise}}</a>
								</li>
							</ul>
							<br />
							<h5>Informations complémentaires</h5>
							<p>{{$chargement->info_complementaire}}</p>
							<br/>
							
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
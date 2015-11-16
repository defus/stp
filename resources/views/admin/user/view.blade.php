@extends('layouts.master')

@section('title', "Profil du donneur d'ordre ou du transporteur sélectionné")

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
				<h2>Rapport utilisateur <small>Rapport d'activité</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<div class="col-md-3 col-sm-3 col-xs-12 profile_left">

					<div class="profile_img">

						<!-- end of image cropping -->
						<div id="crop-avatar">
							<!-- Current avatar -->
							<div class="avatar-view" title="Change the avatar">
								<img src="{{url('/users/' . $user->logo)}}" alt="Avatar">
							</div>
						</div>
						<!-- end of image cropping -->

					</div>
					<h3>{{$user->name}}</h3>

					<ul class="list-unstyled user_data">
						<li><i class="fa fa-user user-profile-icon"></i> Type : {{($user->c_type == 'T') ? 'Transporteur' : "Donneur d'ordre"}}
						</li>
						
						<li><i class="fa fa-at user-profile-icon"></i> Email : {{$user->email}}
						</li>
						
						<li><i class="fa fa-map-marker user-profile-icon"></i> Adresse : {{$user->rue}}, {{$user->ville}}, {{$user->pays}}
						</li>
						
						<li><i class="fa fa-phone user-profile-icon"></i> Téléphone : {{$user->tel}}
						</li>

						<li><i class="fa fa-briefcase user-profile-icon"></i> Société : {{$user->societe}}
						</li>
						
						<li><i class="fa fa-briefcase user-profile-icon"></i> RC : {{$user->rc}}
						</li>
						
					</ul>

				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">

					<div class="profile_title">
						<div class="col-md-12">
							<h2>Rapport de l'activité de l'utilisateur</h2>
						</div>
					</div>
					
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="true">A propos</a>
							</li>
							@if(count($chargements) > 0)
							<li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Demandes de chargement réscents</a>
							</li>
							@endif
							@if(count($reponses) > 0)
							<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Réponses réscentes</a>
							</li>
							@endif
							
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
								<p>{{$user->a_propos}} </p>
							</div>
							
							@if(count($chargements) > 0)
							<div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">

								<!-- start recent activity -->
								<ul class="messages">
									@foreach($chargements as $chargement)
									<li>
										<img src="{{url('/users/' . $user->logo)}}" class="avatar" alt="Avatar">
										<div class="message_date">
											<h3 class="date text-info">{{$chargement->created_at->format('d')}}</h3>
											<p class="month">{{$chargement->created_at->format('F')}}</p>
										</div>
										<div class="message_wrapper">
											<h4 class="heading"> Demande de chargement</h4>
											<blockquote class="message">Du {{$chargement->depart_date}} au {{$chargement->arrivee_date_limite}}</blockquote>
											<br />
											<p class="url">
												<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
												<a href="#"><i class="fa fa-map-marker"></i> <b>Départ :</b> {{$chargement->depart_rue}}, {{$chargement->depart_ville}}, {{$chargement->depart_pays}} </a><br/>
												<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
												<a href="#"><i class="fa fa-map-marker"></i> <b>Arrivée :</b> {{$chargement->arrivee_rue}}, {{$chargement->arrivee_ville}}, {{$chargement->arrivee_pays}} </a>
											</p>
										</div>
									</li>
									@endforeach
								</ul>
								<!-- end recent activity -->

							</div>
							@endif
							@if(count($reponses) > 0)
							<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

								<!-- start recent activity -->
								<ul class="messages">
									@foreach($reponses as $reponse)
									<li>
										<img src="{{url('/users/' . $user->logo)}}" class="avatar" alt="Avatar">
										<div class="message_date">
											<h3 class="date text-info">{{$reponse->created_at->format('d')}}</h3>
											<p class="month">{{$reponse->created_at->format('F')}}</p>
										</div>
										<div class="message_wrapper">
											<h4 class="heading"> Réponse à une demande de chargement</h4>
											<blockquote class="message">Du {{$reponse->chargement->depart_date}} au {{$reponse->chargement->arrivee_date_limite}}</blockquote>
											<br />
											<p class="url">
												<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
												<a href="#"><i class="fa fa-map-marker"></i> <b>Départ :</b> {{$reponse->chargement->depart_rue}}, {{$reponse->chargement->depart_ville}}, {{$reponse->chargement->depart_pays}} </a><br/>
												<span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
												<a href="#"><i class="fa fa-map-marker"></i> <b>Arrivée :</b> {{$reponse->chargement->arrivee_rue}}, {{$reponse->chargement->arrivee_ville}}, {{$reponse->chargement->arrivee_pays}} </a>
											</p>
										</div>
									</li>
									@endforeach
								</ul>
								<!-- end recent activity -->

							</div>
							@endif
							
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
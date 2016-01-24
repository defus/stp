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
				<h2>Utilisateur <small>Détails de l'utilisateur</small></h2>
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
							<h2>Informations détaillées de l'utilisateur</h2>
						</div>
					</div>
					
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="true">A propos</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
								<p>{{$user->a_propos}} </p>
							</div>
							
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
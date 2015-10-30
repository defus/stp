@extends('layouts.master')

@section('title', 'Détails du chargement sélectionné')

@section('content')
<div class="row">

	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Détails du chargement</h2>
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
							<span class="value text-success"> 3 </span>
						</li>
						<li>
							<span class="name"> Offre la plus rescente </span>
							<span class="value text-success"> 12 octobre 2015 </span>
						</li>
						<li class="hidden-phone">
							<span class="name"> Plus petit prix </span>
							<span class="value text-success"> 120 MAD </span>
						</li>
					</ul>
					<br />

					<div>

						<h4>Liste des offres reçues</h4>

						<!-- end of user messages -->
						<ul class="messages">
							<li>
								<img src="{{url('tp_back')}}/images/img.jpg" class="avatar" alt="Avatar">
								<div class="message_date">
									<h3 class="date text-info">24</h3>
									<p class="month">Mai</p>
								</div>
								<div class="message_wrapper">
									<h4 class="heading">Desmond Davison</h4>
									<p>Offre financière : 12000 MAD</p>
									<blockquote class="message">Bonjour, je suis disponible pour travailer avec vous.</blockquote>
									<br/>
									<a href="#" class="btn btn-sm btn-primary">Accepter l'offre</a>
									<br/>
								</div>
							</li>
							<li>
								<img src="{{url('tp_back')}}/images/img.jpg" class="avatar" alt="Avatar">
								<div class="message_date">
									<h3 class="date text-info">24</h3>
									<p class="month">Mai</p>
								</div>
								<div class="message_wrapper">
									<h4 class="heading">Desmond Davison</h4>
									<p>Offre financière : 12000 MAD</p>
									<blockquote class="message">Bonjour, je suis disponible pour travailer avec vous.</blockquote>
									<br />
									<a href="#" class="btn btn-sm btn-primary">Accepter l'offre</a>
									<br/>
								</div>
							</li>
							<li>
								<img src="{{url('tp_back')}}/images/img.jpg" class="avatar" alt="Avatar">
								<div class="message_date">
									<h3 class="date text-info">24</h3>
									<p class="month">Mai</p>
								</div>
								<div class="message_wrapper">
									<h4 class="heading">Desmond Davison</h4>
									<p>Offre financière : 12000 MAD</p>
									<blockquote class="message">Bonjour, je suis disponible pour travailer avec vous.</blockquote>
									<br />
									<a href="#" class="btn btn-sm btn-primary">Accepter l'offre</a>
									<br/>
								</div>
							</li>
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
								<a href="#" class="btn btn-sm btn-primary">Archiver</a>
							</div>
							<h5>Statut</h5>
							<ul class="list-unstyled project_files">
								<li><button type="button" class="btn btn-warning btn-xs">En cours</button>
								</li>
							</ul>
							<h5>Départ</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Rue, ville, pays</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> date et heure de départ</a>
								</li>
							</ul>
							<br/>
							<h5>Livraison</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Rue, ville, pays</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> date et heure limite de livraison</a>
								</li>
							</ul>
							<br/>
							<h5>Colis</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Frais de transit, Distance</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Type de trajet, nature de marchandise, volume</a>
								</li>
							</ul>
							<br />
							<h5>Liste de colisage</h5>
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Emballage</th>
										<th>Nombre d'unités</th>
										<th>Empilable ?</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>1200</td>
										<td>OUI</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>1230</td>
										<td>NON</td>
									</tr>
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
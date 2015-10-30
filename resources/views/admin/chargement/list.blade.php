@extends('layouts.master')

@section('title', 'Liste des demandes de chargements')

@section('content')
<div class="row">

	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Demandes de chargements</h2>
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
							<th style="width: 20%">Société</th>
							<th style="width: 20%">Départ</th>
							<th style="width: 20%">Arrivée</th>
							<th style="width: 30%">Colis</th>
							<th style="width: 10%">Nombre de réponses</th>
							<th>Status</th>
							<th style="width: 10%">#Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Tartanpion</td>
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
							<td>10</td>
							<td>
								<button type="button" class="btn btn-success btn-xs">Archivé</button>
							</td>
							<td>
								<a href="{{url('/admin/chargement/1')}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Consulter les réponses </a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Tartanpion 2</td>
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
							<td>10</td>
							<td>
								<button type="button" class="btn btn-warning btn-xs">En cours</button>
							</td>
							<td>
								<a href="{{url('/admin/chargement/2/repondre')}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Répondre </a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Tartanpion 3</td>
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
							<td>10</td>
							<td>
								<button type="button" class="btn btn-warning btn-xs">En cours</button>
							</td>
							<td>
								<a href="{{url('/admin/chargement/3/repondre')}}" class="btn btn-primary btn-xs"><i class="fa fa-search"></i> Répondre </a>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- end project list -->
				
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
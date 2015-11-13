@extends('layouts.master')

@section('title', 'Répondre à la demande de chargement')

@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		$.listen('parsley:field:validate', function () {
			validateFront();
		});
		$('#repondreChargementForm .btn').on('click', function () {
			$('#repondreChargementForm').parsley().validate();
			validateFront();
		});
		var validateFront = function () {
			if (true === $('#repondreChargementForm').parsley().isValid()) {
				$('.bs-callout-info').removeClass('hidden');
				$('.bs-callout-warning').addClass('hidden');
			} else {
				$('.bs-callout-info').addClass('hidden');
				$('.bs-callout-warning').removeClass('hidden');
			}
		};
	});
@endsection

@section('content')
<div class="row">

	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Répondre à la demande de chargement</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<div class="col-md-9 col-sm-9 col-xs-12">

					<form class="form-horizontal form-label-left" data-parsley-validate id="repondreChargementForm" method="POST" action="{{url('/admin/chargement/' . $chargement->id . '/repondre')}}">
						{!! csrf_field() !!}
						
						<span class="section">Détails de la demande</span>
						
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Départ</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Lieu : {{$chargement->depart_rue}}, 
											<br/>Vile : {{$chargement->depart_ville}}, 
											<br/>Pays : {{$chargement->depart_pays}}
											<br/> Date de départ : {{$chargement->depart_date}}</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Livraison</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Lieu : {{$chargement->arrivee_rue}}, 
											<br/>Vile : {{$chargement->arrivee_ville}}, 
											<br/>Pays : {{$chargement->arrivee_pays}}
											<br/> Date limite de livraison : {{$chargement->arrivee_date_limite}}</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Plus d'informations</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Frais de transit : {{$chargement->frais_transit}}
											<br/> Distance : {{$chargement->distance}} km
											<br/>Type de trajet : {{$chargement->type_trajet}}
											<br/>Nature de la marchandise : {{$chargement->nature_marchandise}}
											<br/>Type d'assurance : {{$chargement->type_assurance}}
											<br/>Poids : {{$chargement->poids}} Kg
											<br/>Volume : {{$chargement->volume}} m3
											<br/>Ce chargement contient t'il des articles dangereux ? : {{$chargement->produit_dangereux == 'N' ? 'NON' : 'OUI'}}<br/></p>
									</div>
								</div>
							
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">    
								<div class="form-group">
									<label>Liste de colisage</label>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<p class="form-control-static">
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
										</p>
									</div>
								</div>
							</div>
						</div>
						
						<span class="section">Informations de la réponse</span>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Offre financière</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control col-md-7 col-xs-12" name="offre_financiere" value="{{$reponse_offre_financiere}}" data-parsley-type="number" data-parsley-trigger="change" required/>
								<span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">A propos</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="textarea" required="required" name="a_propos" class="form-control col-md-7 col-xs-12" data-parsley-maxlength="1000" data-parsley-trigger="change">{{$reponse_a_propos}}</textarea>
							</div>
						</div>
						
						<div class="ln_solid"></div>

						<div class="form-group">
							<div class="col-md-9 col-md-offset-3">
								<button type="submit" class="btn btn-success" name="RepondreBouton">Répondre à a demande</button>
								<a class="btn btn-warning" href="{{url('/admin/chargement')}}">Refuser</a>
							</div>
						</div>

					</form>

				</div>

				<!-- start project-detail sidebar -->
				<div class="col-md-3 col-sm-3 col-xs-12">

					<section class="panel">

						<div class="x_title">
							<h2>Donneur d'ordre</h2>
							<div class="clearfix"></div>
						</div>
						<div class="panel-body">
							
							<h5>Société</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><img src="{{url('/users/' . $chargement->owner->logo)}}" alt="Logo de la société" style="width:56px;height:56px;"/></a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Societé : {{$chargement->owner->societe}}</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Régistre de commerce : {{$chargement->owner->rc}}</a>
								</li>
							</ul>
							<br/>
							<h5>Adresse</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Lieu : {{$chargement->owner->rue}}, 
								<br/>Ville : {{$chargement->owner->ville}}, <br/>Pays :{{$chargement->owner->pays}}</a>
								</li>
							</ul>
							<br/>
							<h5>A propos de la société</h5>
							<ul class="list-unstyled project_files">
								<li><a href="">{{$chargement->owner->a_propos}}</a>
								</li>
							</ul>
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
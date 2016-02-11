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
						
						<span class="section">Détails de la demande de chargement</span>
						
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Départ</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Adresse : {{$chargement->depart_rue}}, {{$chargement->depart_ville}}, {{$chargement->depart_pays}}
											<br/> Date de départ : Entre {{$chargement->depart_date}} et {{$chargement->depart_date_fin}}</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Livraison</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Adresse : {{$chargement->arrivee_rue}}, {{$chargement->arrivee_ville}}, {{$chargement->arrivee_pays}}
											<br/> Date limite de livraison : {{$chargement->arrivee_date_limite}}</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Chargement</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
                                        <table class="table table-striped projects table-bordered">
                                        <tr>
                                        <td>Distance : {{$chargement->distance}} km</td>
                                        <td>Type de trajet : {{$chargement->type_trajet}}</td>
                                        <td>Nature de la marchandise : {{$chargement->nature_marchandise}}</td>
                                        <td>Type d'assurance : {{$chargement->type_assurance}}</td>
                                        </tr>
                                        <tr>
                                        <td>Poids : {{$chargement->poids}} Kg</td>
                                        <td>Type de véhicule : {{$chargement->type_vehicule}}</td>
                                        <td>Nombre de voyages : {{$chargement->nombre_voyage}}<br/></td>
                                        <td></td>
                                        </tr>
                                        </table>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Paiement</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
                                        <table class="table table-striped projects table-bordered">
                                        <tr>
                                        <td>Moyen de paiement : {{$chargement->mode_paiement}}</td>
                                        <td>Délai de paiement : {{$chargement->delai_paiement}}</td>
                                        <td>Type de prix : {{$chargement->type_prix}}</td>
                                        <td>Prix fixe : {{$chargement->prix_fixe}} {{$chargement->devise}}</td>
                                        </tr>
                                        </table>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Informations complémentaires</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">{{$chargement->info_complementaire}}<br/></p>
									</div>
								</div>
							
							</div>
							
						</div>
						
						<span class="section">Votre offre</span>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Offre financière Unitaire (DH HT)</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control col-md-7 col-xs-12" name="offre_financiere" 
                                value="{{$reponse_offre_financiere}}" data-parsley-type="number" 
                                data-parsley-trigger="change" required placeholder="0.00"/>
								<span class="fa fa-money form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Commentaires et clarifications </label>
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
							<h2>Informations du donneur d'ordre</h2>
							<div class="clearfix"></div>
						</div>
						<div class="panel-body">
							
							<ul class="list-unstyled project_files">
								<li><a href="{{url('/admin/user/' . $chargement->owner->id)}}"><img src="{{url('/users/' . $chargement->owner->logo)}}" alt="Logo de la société" style="width:56px;height:56px;"/></a></li>
								<li><a href="{{url('/admin/user/' . $chargement->owner->id)}}">Societé : {{$chargement->owner->societe}}</a></li>
								<li><a href="#">Régistre de commerce : {{$chargement->owner->rc}}</a></li>
							</ul>
							<br/>
							<h5>Adresse</h5>
							<ul class="list-unstyled project_files">
                                <li><a href="#">Lieu : {{$chargement->owner->rue}}, {{$chargement->owner->ville}}, {{$chargement->owner->pays}}</a></li>
                            </ul>
							<br/>
							<h5>Contact</h5>
							<ul class="list-unstyled project_files">
								<li>Nom : {{$chargement->owner->name}}, 
								<br/>Email : {{$chargement->owner->email}}, 
                                <br/>Téléphone :{{$chargement->owner->tel}}</a></li>
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
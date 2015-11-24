@extends('layouts.master')

@section('title', 'Ajouter un nouveau chargement')

@section('style')
<link rel="stylesheet" type="text/css" href="{{url('tp_back')}}/js/sweetalert/dist/sweetalert.css">
@endsection

@section('script')
<!-- sweetalert -->
<script type="text/javascript"  src="{{url('tp_back')}}/js/sweetalert/dist/sweetalert.min.js"></script> 
<!-- input mask -->
<script src="{{url('tp_back')}}/js/input_mask/jquery.inputmask.js"></script>
<!-- form wizard -->
<script type="text/javascript" src="{{url('tp_back')}}/js/wizard/jquery.smartWizard.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		//input mask
		$("#depart_date").inputmask();
		$("#depart_heure").inputmask();
		$("#arrivee_date_limite").inputmask();
		$("#arrivee_heure_limite").inputmask();
		
		// Smart Wizard 	
		$('#wizard').smartWizard({enableAllSteps:false, cycleSteps:false, labelNext:'Suivant', labelPrevious:'Précédent', labelFinish:'Terminer', onLeaveStep: leaveAStepCallback, onFinish: onFinishCallback, keyNavigation:false, hideButtonsOnDisabled: true});

		function leaveAStepCallback(obj, context){
			if(context.fromStep == 1 && context.toStep == 2){
				$('#createChargementFormStep1').parsley().validate();
				return validateFront($('#createChargementFormStep1'));
			}
			else if(context.fromStep == 2 && context.toStep == 3){
				$('#createChargementFormStep2').parsley().validate();
				return validateFront($('#createChargementFormStep2'));
			}
			return true;
		}
	
		function onFinishCallback(objs, context){
			$('#createChargementFormStep2').parsley().validate();
			if(validateFront($('#createChargementFormStep2'))){
				var f_step1_data = $('#createChargementFormStep1').serialize();
				var f_step2_data = $('#createChargementFormStep2').serialize();
				
				swal({   title: "Ajouter une demande de chargement",   text: "Créer la demande de chargement ?",   type: "info",   showCancelButton: true,   closeOnConfirm: false,   showLoaderOnConfirm: true, cancelButtonText : "Annuler", confirmButtonText : "Créer la demande"}, 
					function(){   
						$.ajax({
							url : '{{url('/admin/chargement')}}',
							dataType : 'json',
							type : 'post',
							data : f_step1_data + '&' + f_step2_data ,
							success : function(data) {
								swal({title: "Ajouter une demande de chargement",   text: "Création effectuée avec succès !",   type: "success"},function(){ 
									window.location = "{{url('/admin/chargement')}}/" + data.id;
								}); 
							},
							error : function(xhr, statut, postError) {
								var errorMessage = "";
								if(xhr.status == 422) {
									$.each(xhr.responseJSON, function(index, item){
										errorMessage = errorMessage + item + "<br/>";
									});
								}
								swal({title: "Ajouter une demande de chargement", text : "Erreur lors de la création du chargement !<br/><br/>" + errorMessage, type : "error", showLoaderOnConfirm:false, showConfirmButton:true, html:true}); 
							}
						}); 
					});
				
			}
		}
		
		var validateFront = function (form) {
			if (true === form.parsley().isValid()) {
				$('.bs-callout-info').removeClass('hidden');
				$('.bs-callout-warning').addClass('hidden');
				return true;
			} else {
				$('.bs-callout-info').addClass('hidden');
				$('.bs-callout-warning').removeClass('hidden');
				return false;
			}
		};
		
		//tableau des colis
		var colis_row_compteur=2;
		
		$("#add_colis_row").click(function(){
			$('#colis_'+ colis_row_compteur).html(
				'<td>' +
					'<select class="form-control" name="colis['+colis_row_compteur+'][emballage]" required data-parsley-maxlength="50" data-parsley-trigger="change">' +
						'<option value="Palette" selected>Palette</option>' +
						'<option value="Cartons">Cartons</option>' +
						'<option value="Caisse">Caisse</option>' +
						'<option value="Sacs">Sacs</option>' +
						'<option value="Barils">Barils</option>' +
						'<option value="Vrac liquide">Vrac liquide</option>' +
						'<option value="Vrac solide">Vrac solide</option>' +
						'<option value="Cintre">Cintre</option>' +
						'<option value="Autre">Autre</option>' +
					'</select>'+
				'</td>' +
				'<td><input class="form-control" type="text" name="colis['+colis_row_compteur+'][nombre_unite]" value="0" required placeholder="Nombre d\'unité" data-parsley-type="integer" data-parsley-trigger="change"/></td>' +
				'<td>' +
					'<select class="form-control" name="colis['+colis_row_compteur+'][empilable]" required data-parsley-maxlength="1" data-parsley-trigger="change">' +
						'<option value="N" selected>NON</option>' +
						'<option value="O">OUI</option>' +
					'</select>' +
				'</td>' +
				'<td><a href="#" class="btn btn-warning delete_colis_row" data="'+colis_row_compteur+'"><i class="fa fa-remove"></a></td>'
			);
			
			colis_row_compteur++; 
			
			$('#table_tbody_colis').append('<tr id="colis_'+colis_row_compteur+'"></tr>');
			
			return false;
		});
		
		$( document ).on('click', ".delete_colis_row", function(event ){
			event.preventDefault();
			
			var index = $(this).attr('data');
			$("#colis_"+index).detach();
			return false;
		});
	});
	
	try {
		hljs.initHighlightingOnLoad();
	} catch (err) {}


</script>
@endsection

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
				<h2>Formulaire de demande de chargement</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<!-- Smart Wizard -->
				<p>Remplissez toutes les étapes de ce formulaire pour enregistrer une nouvelle demande de chargement.</p>
				<div id="wizard" class="form_wizard wizard_horizontal">
					<ul class="wizard_steps">
						<li>
							<a href="#step-1">
								<span class="step_no">1</span>
								<span class="step_descr">Etape 1<br /><small>Itinéraire</small></span>
							</a>
						</li>
						<li>
							<a href="#step-2">
								<span class="step_no">2</span>
								<span class="step_descr">Etape 2<br /><small>Description de la marchandise</small></span>
							</a>
						</li>
					</ul>
					<div id="step-1">
						<form class="form-horizontal form-label-left" data-parsley-validate id="createChargementFormStep1">
							{!! csrf_field() !!}
							
							<span class="section">Lieu de chargement</span>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="depart_rue">Lieu <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="depart_rue" value="{{old('depart_rue')}}" required="required" class="form-control col-md-7 col-xs-12" data-parsley-maxlength="255" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="depart_ville">Ville <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="depart_ville" value="{{old('depart_ville')}}" required="required" class="form-control col-md-7 col-xs-12" data-parsley-maxlength="255" data-parsley-trigger="change">
								</div>
							</div>
							<input type="hidden" name="depart_pays" value="Maroc" />
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Date de départ <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" id="depart_date" name="depart_date" value="{{old('depart_date')}}" data-inputmask="'mask': '99/99/9999'" data-parsley-pattern="(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="depart_heure" class="control-label col-md-3 col-sm-3 col-xs-12">Heure de départ <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" required="required" type="text" id="depart_heure" name="depart_heure" value="{{old('depart_heure')}}" data-inputmask="'mask': '99:99:99'"  data-parsley-pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" data-parsley-trigger="change">
								</div>
							</div>
							
							<span class="section">Lieu de dépôt</span>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="arrivee_rue">Lieu <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" required="required" class="form-control col-md-7 col-xs-12"  name="arrivee_rue" value="{{old('arrivee_rue')}}" data-parsley-maxlength="255" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="arrivee_ville">Ville <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" required="required" class="form-control col-md-7 col-xs-12" name="arrivee_ville" value="{{old('arrivee_ville')}}" data-parsley-maxlength="255" data-parsley-trigger="change">
								</div>
							</div>
							<input type="hidden" name="arrivee_pays" value="Maroc" />
							<div class="form-group">
								<label for="arrivee_date_limite" class="control-label col-md-3 col-sm-3 col-xs-12">Date limite de livraison <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" id="arrivee_date_limite" name="arrivee_date_limite" value="{{old('arrivee_date_limite')}}" data-inputmask="'mask': '99/99/9999'" data-parsley-pattern="(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="arrivee_heure_limite" class="control-label col-md-3 col-sm-3 col-xs-12">Heure limite de livraison (heure locale) <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text" required="required" id="arrivee_heure_limite" name="arrivee_heure_limite" value="{{old('arrivee_heure_limite')}}" data-inputmask="'mask': '99:99:99'"  data-parsley-pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" data-parsley-trigger="change">
								</div>
							</div>

						</form>
					</div>
					<div id="step-2">
						
						<span class="section">Description</span>
						
						<form class="form-horizontal form-label-left" data-parsley-validate id="createChargementFormStep2">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rue">Frais de transit <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="frais_transit" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="Aucun" selected="selected">Aucun</option>
										<option value="A notre charge">A notre charge</option>
										<option value="A la charge du transporteur">A la charge du transporteur</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="distance">Distance (Km) <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" required="required" class="form-control col-md-7 col-xs-12" name="distance" value="{{old('distance')}}" data-parsley-type="integer" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="type_trajet" class="control-label col-md-3 col-sm-3 col-xs-12">Type de trajet <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="type_trajet" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="Aller simple" selected="selected">Aller simple</option>
										<option value="Allez/retour">Allez/retour</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nature_marchandise">Nature de la marchandise <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" required="required" type="text"  name="nature_marchandise" value="{{old('nature_marchandise')}}" required data-parsley-maxlength="255" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="type_assurance" class="control-label col-md-3 col-sm-3 col-xs-12">Type d'assurance requise <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="type_assurance" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="Aucune" selected="selected">Aucune</option>
										<option value="Marchandise">Marchandise</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="poids" class="control-label col-md-3 col-sm-3 col-xs-12">Poids (Kg) <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text"  name="poids" value="{{old('poids')}}" required data-parsley-type="number" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="volume" class="control-label col-md-3 col-sm-3 col-xs-12">Volume (m3) <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text"  name="volume" value="{{old('volume')}}" required data-parsley-type="number" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="produit_dangereux" class="control-label col-md-3 col-sm-3 col-xs-12">Ce chargement contient t'il des articles dangereux ? <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="produit_dangereux" required data-parsley-maxlength="1" data-parsley-trigger="change">
										<option value="N" selected="selected">NON</option>
										<option value="O">OUI</option>
									</select>
								</div>
							</div>
							
							<span class="section">Liste de colisage</span>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Liste de colisage</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<p class="form-control-static">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Emballage</th>
													<th>Nombre d'unités</th>
													<th>Empilable ?</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody id="table_tbody_colis">
												<tr id="colis_1">
													<td>
														<select class="form-control" name="colis[1][emballage]" data-parsley-maxlength="50" required data-parsley-trigger="change">
															<option value="Palette" selected>Palette</option>
															<option value="Cartons">Cartons</option>
															<option value="Caisse">Caisse</option>
															<option value="Sacs">Sacs</option>
															<option value="Barils">Barils</option>
															<option value="Vrac liquide">Vrac liquide</option>
															<option value="Vrac solide">Vrac solide</option>
															<option value="Cintre">Cintre</option>
															<option value="Autre">Autre</option>
														</select>
													</td>
													<td><input class="form-control" type="text" name="colis[1][nombre_unite]" value="0" placeholder="Nombre d'unité" required data-parsley-type="integer" data-parsley-trigger="change"/></td>
													<td>
														<select class="form-control" name="colis[1][empilable]" required data-parsley-maxlength="50" data-parsley-trigger="change">
															<option value="N" selected>NON</option>
															<option value="O">OUI</option>
														</select>
													</td>
													<td><a href="#" class="btn btn-warning delete_colis_row" data="1"><i class="fa fa-remove"></i></a></td>
												</tr>
												<tr id='colis_2'></tr>
											</tbody>
										</table>
									</p>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<a href="#" class="btn btn-success" id="add_colis_row">Ajouter un autre article</a>
								</div>
							</div>
							
							<span class="section">Paiement</span>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mode_paiement">Moyen de paiement <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="mode_paiement" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="Virement bancaire" selected="selected">Virement bancaire</option>
										<option value="Espèce">Espèce</option>
										<option value="Lettre de change">Lettre de change</option>
										<option value="Chèque">Chèque</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="delai_paiement">Délai de paiement <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="delai_paiement" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="A la commande" selected="selected">A la commande</option>
										<option value="Au départ">Au départ</option>
										<option value="A la livraison">A la livraison</option>
										<option value="Fin de mois">Fin de mois</option>
										<option value="30 jours fin de mois">30 jours fin de mois</option>
										<option value="60 jours fin de mois">60 jours fin de mois</option>
										<option value="90 jours fin de mois">90 jours fin de mois</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="devise" class="control-label col-md-3 col-sm-3 col-xs-12">Devise <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="devise" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="DH" selected="selected">DH</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_prix">Type de prix <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="type_prix" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="Fixe" selected="selected">Fixe</option>
										<option value="Enchères">Enchères</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="prix_fixe">Prix fixe (si le type de prix est fixe) <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="prix_fixe" value="0" data-parsley-type="number" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="info_complementaire" class="control-label col-md-3 col-sm-3 col-xs-12">Informations complémentaires <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea required="required" class="form-control col-md-7 col-xs-12"  name="info_complementaire" value="{{old('info_complementaire')}}" required data-parsley-maxlength="1000" data-parsley-trigger="change"></textarea>
								</div>
							</div>

						</form>
					</div>

				</div>
				<!-- End SmartWizard Content -->
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->

@endsection

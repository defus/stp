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
									<select name="depart_ville" value="{{old('depart_ville')}}" required="required" class="form-control col-md-7 col-xs-12" data-parsley-maxlength="255" data-parsley-trigger="change">
										<option value="AL HAJEB">AL HAJEB</option>
										<option value="AGADIR">AGADIR</option>
										<option value="AL HOCEIMA">AL HOCEIMA</option>
										<option value="ASSA ZAG">ASSA ZAG</option>
										<option value="	AZILAL">AZILAL</option>
										<option value="BENI MELLAL">BENI MELLAL</option>
										<option value="BENSLIMANE">BENSLIMANE</option>
										<option value="BOUJDOUR">BOUJDOUR</option>
										<option value="BOULEMANE">BOULEMANE</option>
										<option value="BERRECHID">BERRECHID</option>
										<option value="CASABLANCA">CASABLANCA</option>
										<option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
										<option value="CHTOUKA AIT BAHA">CHTOUKA AIT BAHA</option>
										<option value="CHICHAOUA">CHICHAOUA</option>
										<option value="DAKHLA">DAKHLA</option>
										<option value="EL JADIDA">EL JADIDA</option>
										<option value="EL KELAA DES SRAGHNAS">EL KELAA DES SRAGHNAS</option>
										<option value="ERRACHIDIA">ERRACHIDIA</option>
										<option value="ESSAOUIRA">ESSAOUIRA</option>
										<option value="ES SEMARA">ES SEMARA</option>
										<option value="FES">FES</option>
										<option value="FIGUIG">FIGUIG</option>
										<option value="GUELMIM">GUELMIM</option>
										<option value="IFRANE">IFRANE</option>
										<option value="KASBAT TADLA">Kasbat Tadla</option>
										<option value="KENITRA">KENITRA</option>
										<option value="KHEMISSET">KHEMISSET</option>
										<option value="KHENIFRA">KHENIFRA</option>
										<option value="KHOURIBGA">KHOURIBGA</option>
										<option value="LAAYOUNE">LAAYOUNE</option>
										<option value="LARACHE">LARACHE</option>
										<option value="MARRAKECH">MARRAKECH</option>
										<option value="MEKNES">MEKNES</option>
										<option value="MOHAMMADIA">MOHAMMADIA</option>
										<option value="NADOR">NADOR</option>
										<option value="NOUACEUR">NOUACEUR</option>
										<option value="OUARZAZATE">OUARZAZATE</option>
										<option value="OUJDA">OUJDA</option>
										<option value="OUED EDDAHAB">OUED EDDAHAB</option>
										<option value="RABAT" selected>RABAT</option>
										<option value="SAFI">SAFI</option>
										<option value="SALE">SALE</option>
										<option value="SKHIRAT">SKHIRAT</option>
										<option value="SEFROU">SEFROU</option>
										<option value="SETTAT">SETTAT</option>
										<option value="SIDI IFNI">Sidi Ifni</option>
										<option value="SIDI KACEM">SIDI KACEM</option>
										<option value="TANGER">TANGER</option>
										<option value="TAN TAN">TAN TAN</option>
										<option value="TAOUNAT">TAOUNAT</option>
										<option value="TATA">TATA</option>
										<option value="TAZA">TAZA</option>
										<option value="TAROUDANT">TAROUDANT</option>
										<option value="TETOUAN">TETOUAN</option>
										<option value="TEMARA">TEMARA</option>
										<option value="TIZNIT">TIZNIT</option>
									</select>
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
								<label for="depart_heure" class="control-label col-md-3 col-sm-3 col-xs-12">Heure de départ</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text" id="depart_heure" name="depart_heure" value="12:00" data-inputmask="'mask': '99:99'"  data-parsley-pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" data-parsley-trigger="change">
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
									<select name="arrivee_ville" value="{{old('arrivee_ville')}}" required="required" class="form-control col-md-7 col-xs-12" data-parsley-maxlength="255" data-parsley-trigger="change">
										<option value="AL HAJEB">AL HAJEB</option>
										<option value="AGADIR">AGADIR</option>
										<option value="AL HOCEIMA">AL HOCEIMA</option>
										<option value="ASSA ZAG">ASSA ZAG</option>
										<option value="	AZILAL">AZILAL</option>
										<option value="BENI MELLAL">BENI MELLAL</option>
										<option value="BENSLIMANE">BENSLIMANE</option>
										<option value="BOUJDOUR">BOUJDOUR</option>
										<option value="BOULEMANE">BOULEMANE</option>
										<option value="BERRECHID">BERRECHID</option>
										<option value="CASABLANCA" selected>CASABLANCA</option>
										<option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
										<option value="CHTOUKA AIT BAHA">CHTOUKA AIT BAHA</option>
										<option value="CHICHAOUA">CHICHAOUA</option>
										<option value="DAKHLA">DAKHLA</option>
										<option value="EL JADIDA">EL JADIDA</option>
										<option value="EL KELAA DES SRAGHNAS">EL KELAA DES SRAGHNAS</option>
										<option value="ERRACHIDIA">ERRACHIDIA</option>
										<option value="ESSAOUIRA">ESSAOUIRA</option>
										<option value="ES SEMARA">ES SEMARA</option>
										<option value="FES">FES</option>
										<option value="FIGUIG">FIGUIG</option>
										<option value="GUELMIM">GUELMIM</option>
										<option value="IFRANE">IFRANE</option>
										<option value="KASBAT TADLA">Kasbat Tadla</option>
										<option value="KENITRA">KENITRA</option>
										<option value="KHEMISSET">KHEMISSET</option>
										<option value="KHENIFRA">KHENIFRA</option>
										<option value="KHOURIBGA">KHOURIBGA</option>
										<option value="LAAYOUNE">LAAYOUNE</option>
										<option value="LARACHE">LARACHE</option>
										<option value="MARRAKECH">MARRAKECH</option>
										<option value="MEKNES">MEKNES</option>
										<option value="MOHAMMADIA">MOHAMMADIA</option>
										<option value="NADOR">NADOR</option>
										<option value="NOUACEUR">NOUACEUR</option>
										<option value="OUARZAZATE">OUARZAZATE</option>
										<option value="OUJDA">OUJDA</option>
										<option value="OUED EDDAHAB">OUED EDDAHAB</option>
										<option value="RABAT">RABAT</option>
										<option value="SAFI">SAFI</option>
										<option value="SALE">SALE</option>
										<option value="SKHIRAT">SKHIRAT</option>
										<option value="SEFROU">SEFROU</option>
										<option value="SETTAT">SETTAT</option>
										<option value="SIDI IFNI">Sidi Ifni</option>
										<option value="SIDI KACEM">SIDI KACEM</option>
										<option value="TANGER">TANGER</option>
										<option value="TAN TAN">TAN TAN</option>
										<option value="TAOUNAT">TAOUNAT</option>
										<option value="TATA">TATA</option>
										<option value="TAZA">TAZA</option>
										<option value="TAROUDANT">TAROUDANT</option>
										<option value="TETOUAN">TETOUAN</option>
										<option value="TEMARA">TEMARA</option>
										<option value="TIZNIT">TIZNIT</option>
									</select>
								</div>
							</div>
							<input type="hidden" name="arrivee_pays" value="Maroc" />
							<div class="form-group">
								<label for="arrivee_date_limite" class="control-label col-md-3 col-sm-3 col-xs-12">Date limite de livraison
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="date-picker form-control col-md-7 col-xs-12" type="text" id="arrivee_date_limite" name="arrivee_date_limite" value="{{old('arrivee_date_limite')}}" data-inputmask="'mask': '99/99/9999'" data-parsley-pattern="(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))" data-parsley-trigger="change">
								</div>
							</div>
							<div class="form-group">
								<label for="arrivee_heure_limite" class="control-label col-md-3 col-sm-3 col-xs-12">Heure limite de livraison</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text" id="arrivee_heure_limite" name="arrivee_heure_limite" data-inputmask="'mask': '99:99'"  data-parsley-pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" data-parsley-trigger="change">
								</div>
							</div>

						</form>
					</div>
					<div id="step-2">
						
						<span class="section">Chargement</span>
						
						<form class="form-horizontal form-label-left" data-parsley-validate id="createChargementFormStep2">
							<input type="hidden" name="frais_transit" value="Aucun" />
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
							<input type="hidden" name="type_assurance" value="Aucune" />
							<div class="form-group">
								<label for="poids" class="control-label col-md-3 col-sm-3 col-xs-12">Poids (Kg) <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text"  name="poids" value="{{old('poids')}}" required data-parsley-type="number" data-parsley-trigger="change">
								</div>
							</div>
							<input type="hidden" name="volume" value="0" />
							<input type="hidden" name="produit_dangereux" value="N" />
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type_vehicule">Type de véhicule <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="type_vehicule" required data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="Autobus">Autobus</option>
										<option value="Autocar">Autocar</option>
										<option value="Automobile">Automobile</option>
										<option value="Camion">Camion</option>
										<option value="Camionnette">Camionnette</option>
										<option value="Voiture">Voiture</option>
										<option value="Autre" selected="selected">Autre</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nombre_voyage" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre de voyages <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input class="form-control col-md-7 col-xs-12" type="text"  name="nombre_voyage" value="{{old('nombre_voyage')}}" required data-parsley-type="integer" data-parsley-trigger="change">
								</div>
							</div>
							
							<span class="section">Paiement</span>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="mode_paiement">Moyen de paiement								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" name="mode_paiement" data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="" selected="selected">Aucun</option>
										<option value="Virement bancaire">Virement bancaire</option>
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
									<select class="form-control col-md-7 col-xs-12" name="delai_paiement" data-parsley-maxlength="50" data-parsley-trigger="change">
										<option value="" selected="selected">Aucun</option>
										<option value="A la commande">A la commande</option>
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
								<label for="info_complementaire" class="control-label col-md-3 col-sm-3 col-xs-12">Informations complémentaires</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea class="form-control col-md-7 col-xs-12"  name="info_complementaire" value="{{old('info_complementaire')}}" data-parsley-maxlength="1000" data-parsley-trigger="change"></textarea>
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

@extends('layouts.master')

@section('title', 'Ajouter un nouveau chargement')

@section('content')
<div class="row">

	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Formulaire chargement</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				<!-- Smart Wizard -->
				<p>Remplissez toutes les étapes de ce formulaire pour enregistrer un nouveau chargement.</p>
				<div id="wizard" class="form_wizard wizard_horizontal">
					<ul class="wizard_steps">
						<li>
							<a href="#step-1">
								<span class="step_no">1</span>
								<span class="step_descr">
						Etape 1<br />
						<small>Départ</small>
					</span>
							</a>
						</li>
						<li>
							<a href="#step-2">
								<span class="step_no">2</span>
								<span class="step_descr">
						Etape 2<br />
						<small>Arrivée</small>
					</span>
							</a>
						</li>
						<li>
							<a href="#step-3">
								<span class="step_no">3</span>
								<span class="step_descr">
						Etape 3<br />
						<small>Colis</small>
					</span>
							</a>
						</li>
						<li>
							<a href="#step-4">
								<span class="step_no">4</span>
								<span class="step_descr">
						Etape 4<br />
						<small>Paiement</small>
					</span>
							</a>
						</li>
					</ul>
					<div id="step-1">
						<form class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rue">Rue <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="rue" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ville">Ville <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="ville" name="ville" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label for="pays" class="control-label col-md-3 col-sm-3 col-xs-12">Pays</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="pays" class="form-control col-md-7 col-xs-12" type="text" name="pays">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Date de départ <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="dateDepart" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Heure de départ <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" required="required" type="text" name="heureDepart">
								</div>
							</div>

						</form>

					</div>
					<div id="step-2">
						<form class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rue">Rue <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="rue" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ville">Ville <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="ville" name="ville" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label for="pays" class="control-label col-md-3 col-sm-3 col-xs-12">Pays</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="pays" class="form-control col-md-7 col-xs-12" type="text" name="pays">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Date limite de livraison <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="dateDepart" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Heure limite de livraison (heure locale)</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>

						</form>
					</div>
					<div id="step-3">
						<form class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rue">Frais de transit <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="rue" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ville">Distance <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="ville" name="ville" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label for="pays" class="control-label col-md-3 col-sm-3 col-xs-12">Type de trajet</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="pays" class="form-control col-md-7 col-xs-12" type="text" name="pays">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nature de la marchandise <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="dateDepart" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Type d'assurance requise</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Poids</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Volume</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Ce chargement contient t'il des articles dangereux ?</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							
							<span class="section">Liste de colisage</span>
							
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Emballage</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre d'unités</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Empilable ?</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="heureDepart" class="form-control col-md-7 col-xs-12" type="text" name="heureDepart">
								</div>
							</div>
							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-success">Ajouter un autre article</button>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Liste de colisage</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<p class="form-control-static">
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
									</p>
								</div>
							</div>

						</form>
					</div>
					<div id="step-4">
						<form class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rue">Moyen de paiement <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="rue" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ville">Délai de paiement <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="ville" name="ville" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label for="pays" class="control-label col-md-3 col-sm-3 col-xs-12">Devise</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="pays" class="form-control col-md-7 col-xs-12" type="text" name="pays">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Type de prix <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="dateDepart" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="heureDepart" class="control-label col-md-3 col-sm-3 col-xs-12">Informations complémentaires</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
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
@extends('layouts.master')

@section('title', 'Répondre à la demande de chargement')

@section('content')
<div class="row">

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

					<form class="form-horizontal form-label-left">

						<span class="section">Détails de la demande</span>
						
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Départ</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Rue, Vile, Pays<br/> Date et heure de départ</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Livraison</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Rue, Vile, Pays<br/> Date et heure limite de livraison</p>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-3">Colis</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<p class="form-control-static">Frais de transit : 1000<br/> Distance : 100 km<br/>Type de trajet : xxx<br/>Nature de la marchandise : yyy<br/>Type d'assurance : zzz<br/>Poids : 1000 Kg<br/>Volume:100 litre<br/>Ce chargement contient t'il des articles dangereux ? : Non<br/></p>
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
							</div>
						</div>
						
						<span class="section">Informations de la réponse</span>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">Offre financière</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" class="form-control">
								<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3">A propos</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
							</div>
						</div>
						
						<div class="ln_solid"></div>

						<div class="form-group">
							<div class="col-md-9 col-md-offset-3">
								<button type="submit" class="btn btn-success">Répondre à a demande</button>
								<button type="submit" class="btn">Refuser</button>
							</div>
						</div>

					</form>

				</div>

				<!-- start project-detail sidebar -->
				<div class="col-md-3 col-sm-3 col-xs-12">

					<section class="panel">

						<div class="x_title">
							<h2>Demandeur</h2>
							<div class="clearfix"></div>
						</div>
						<div class="panel-body">
							
							<h5>Société</h5>
							<ul class="list-unstyled project_files">
								<li><a href="">LOGO</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Nom de la société ou réaison sociale</a>
								</li>
								<li><a href=""><i class="fa fa-file-word-o"></i> Numero du régistre de commerce</a>
								</li>
							</ul>
							<br/>
							<h5>Adresse</h5>
							<ul class="list-unstyled project_files">
								<li><a href=""><i class="fa fa-file-word-o"></i> Rue, ville, pays</a>
								</li>
							</ul>
							<br/>
							<h5>A propos</h5>
							<ul class="list-unstyled project_files">
								<li><a href="">A Propos</a>
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
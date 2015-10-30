@extends('layouts.master')

@section('title', 'Modifier votre profile - vue 360°')

@section('content')
<div class="row">

	<!-- form input mask -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Changez votre mot de passe</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Ancien mot de passe</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Nouveau mot de passe</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Confirmer votre mot de passe</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="password" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="ln_solid"></div>

					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-success">Enregistrer</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
	<!-- form input mask -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Changez votre email</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Email</label>
						<div class="col-md-9 col-sm-9 col-xs-9">
							<input type="email" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="ln_solid"></div>

					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-success">Enregistrer</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
	<!-- form input mask -->
	<div class="col-md-4 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Changez vos coordonnées</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form class="form-horizontal form-label-left">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Nom</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control">
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-3">Téléphone</label>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<input type="text" class="form-control">
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="ln_solid"></div>

							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-success">Enregistrer</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- /col -->
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Désactivez votre compte</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form class="form-horizontal form-label-left">
							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" class="btn btn-success">Désactiver votre compte</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- /col -->
		</div>
	</div>
	<!-- /form input mask -->
	
</div><!-- /row -->
@endsection
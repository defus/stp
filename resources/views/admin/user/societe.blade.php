@extends('layouts.master')

@section('title', 'Editer les paramètres de votre société')

@section('content')
<div class="row">
	
	<!-- form input mask -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Formulaire société</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left">
	
					<span class="section">Information générale</span>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Nom de la société (raison sociale)</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Numero du registre de commerce</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Importer un logo</label>
						<input type="file">
					</div>
					<div class="ln_solid"></div>
					
					<span class="section">Adresse</span>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Rue</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Ville</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Pays</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="ln_solid"></div>
					
					<span class="section">A Propos</span>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">A propos</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
						</div>
					</div>
					<div class="ln_solid"></div>
	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-success">Enregistrer les modifications</button>
						</div>
					</div>
	
				</form>
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
	</div><!-- /row -->
@endsection
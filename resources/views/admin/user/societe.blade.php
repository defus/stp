@extends('layouts.master')

@section('title', 'Editer les paramètres de votre société')

@section('script')
<!-- form validation -->
<script type="text/javascript">
	$(document).ready(function () {
		$.listen('parsley:field:validate', function () {
			validateFront();
		});
		$('#updateSocieteForm .btn').on('click', function () {
			$('#updateSocieteForm').parsley().validate();
			validateFront();
		});
		var validateFront = function () {
			if (true === $('#updateSocieteForm').parsley().isValid()) {
				$('.bs-callout-info').removeClass('hidden');
				$('.bs-callout-warning').addClass('hidden');
			} else {
				$('.bs-callout-info').addClass('hidden');
				$('.bs-callout-warning').removeClass('hidden');
			}
		};
	});
	
	try {
		hljs.initHighlightingOnLoad();
	} catch (err) {}
	
</script>
<!-- /form validation -->
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
				<h2>Formulaire société</h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left" method="post" action="{{url('/admin/user/societe-update')}}" data-parsley-validate id="updateSocieteForm" enctype="multipart/form-data" >
					{!! csrf_field() !!}
					
					<span class="section">Information générale</span>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Nom de la société (raison sociale) <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="societe" value="{{$societe}}" required="" data-parsley-maxlength="255"  data-parsley-trigger="change">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Numero du registre de commerce <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="rc" value="{{$rc}}" required="" data-parsley-maxlength="50"  data-parsley-trigger="change">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Importer un logo <span class="required">*</span></label>
						<input type="file" name="logo" required=""  data-parsley-trigger="change">
						<img src="{{url('/users/' . $logo)}}" alt="" class="img-circle profile_img" style="width:56px;height:56px;/>
					</div>
					<div class="ln_solid"></div>
					
					<span class="section">Adresse</span>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Lieu <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="rue" value="{{$rue}}" required="" data-parsley-maxlength="255" data-parsley-trigger="change">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Ville <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="ville" value="{{$ville}}" required="" data-parsley-maxlength="255" data-parsley-trigger="change">
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">Pays <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" class="form-control" name="pays" value="Maroc" required="" data-parsley-maxlength="255" data-parsley-trigger="change" disabled>
							<input type="hidden" name="pays" value="Maroc" /> 
							<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						</div>
					</div>
					<div class="ln_solid"></div>
					
					<span class="section">A Propos</span>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-3">A propos <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="a_propos" required="required" name="a_propos" class="form-control col-md-7 col-xs-12" data-parsley-maxlength="1000" data-parsley-trigger="change">{{$a_propos}}</textarea>
						</div>
					</div>
					<div class="ln_solid"></div>
	
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-success" name="UpdateSociete">Enregistrer les modifications</button>
						</div>
					</div>
	
				</form>
			</div>
		</div>
	</div>
	<!-- /form input mask -->
	
	</div><!-- /row -->
@endsection
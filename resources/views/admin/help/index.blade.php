@extends('layouts.master')

@section('title', "Aide sur l'application Transplateforme.com")

@section('content')

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2> Aide Transplateforme.com<small>Accueil</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">


				<div class="row">

					<div class="col-sm-3 mail_list_column">

						<div class="mail_list">
							<div class="left">
								<i class="fa fa-star"></i> <i class="fa fa-question"></i>
							</div>
							<div class="right">
								<h3>Tutorial <small>10/10/2015</small></h3>
								<p>Tutorial d'utilisation de l'application </p>
							</div>
						</div>
						<div class="mail_list">
							<div class="left">
								<i class="fa fa-circle"></i>
							</div>
							<div class="right">
								<h3>Ajouter une nouvelle demande de chargement <small>10/10/2015</small></h3>
								<p><span class="badge">Facile</span> Explique comment ajouter une nouvelle demande de chargement</p>
							</div>
						</div>
						<div class="mail_list">
							<div class="left">
								<i class="fa fa-circle-o"></i><i class="fa fa-paperclip"></i>
							</div>
							<div class="right">
								<h3>Répondre à une nouvelle demande de chargement <small>10/10/2015</small></h3>
								<p><span class="badge">Facile</span> Expliquer comment répondre à une demande de chargement</p>
							</div>
						</div>
						
					</div>
					<!-- /MAIL LIST -->


					<!-- CONTENT MAIL -->
					<div class="col-sm-9 mail_view">
						<div class="inbox-body">
							<div class="mail_heading row">
								<div class="col-md-8">
									<div class="compose-btn">
										<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Imprimer" class="btn  btn-sm tooltips"><i class="fa fa-print"></i> </button>
									</div>

								</div>
								<div class="col-md-4 text-right">
									<p class="date"> 10 Octobre 2015</p>
								</div>
								<div class="col-md-12">
									<h4> Tutorial : Comment utiliser l'application Transplateforme.com ?</h4>
								</div>
							</div>
							<div class="sender-info">
								<div class="row">
									<div class="col-md-12">
										<strong>Landry</strong>
										<span>(defolandry@yahoo.fr)</span> 
									</div>
								</div>
							</div>
							<div class="view-mail">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
								<p>Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<p>Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
							<div class="attachment">
								<p>
									<span><i class="fa fa-paperclip"></i> 3 attachments — </span>
									<a href="#">Download all attachments</a> |
									<a href="#">View all images</a>
								</p>
								<ul>
									<li>
										<a href="#" class="atch-thumb">
											<img src="{{url('/tp_back')}}/images/1.png" alt="img" />
										</a>

										<div class="file-name">
											image-name.jpg
										</div>
										<span>12KB</span>


										<div class="links">
											<a href="#">View</a> -
											<a href="#">Download</a>
										</div>
									</li>

									<li>
										<a href="#" class="atch-thumb">
											<img src="{{url('/tp_back')}}/images/1.png" alt="img" />
										</a>

										<div class="file-name">
											img_name.jpg
										</div>
										<span>40KB</span>

										<div class="links">
											<a href="#">View</a> -
											<a href="#">Download</a>
										</div>
									</li>
									<li>
										<a href="#" class="atch-thumb">
											<img src="{{url('/tp_back')}}/images/1.png" alt="img" />
										</a>

										<div class="file-name">
											img_name.jpg
										</div>
										<span>30KB</span>

										<div class="links">
											<a href="#">View</a> -
											<a href="#">Download</a>
										</div>
									</li>

								</ul>
							</div>
							<div class="compose-btn pull-left">
								<button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Imprimer" class="btn  btn-sm tooltips"><i class="fa fa-print"></i> </button>
							</div>
						</div>

					</div>
					<!-- /CONTENT MAIL -->
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
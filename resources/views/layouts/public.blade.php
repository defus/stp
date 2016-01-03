<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title') | TransPlateforme.com</title>
  <link href="{{url('tp_front/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('tp_front/css/animate.min.css')}}" rel="stylesheet">
  <link href="{{url('tp_front/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{url('tp_front/css/lightbox.css')}}" rel="stylesheet">
  <link href="{{url('tp_front/css/main.css')}}" rel="stylesheet">
  <link href="{{url('tp_front/css/presets/preset1.css')}}" rel="stylesheet">
  <link href="{{url('tp_front/css/responsive.css')}}" rel="stylesheet">
  
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="{{url('tp_front')}}/images/favicon.ico">
</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url({{url('tp_front')}}/images/slider/transport-routier.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Bienvenue à <span>Transplateforme.com</span></h1>
            <p><small>La plateforme de mutualisation du transport professionnel</small></p>
            <a class="btn btn-start animated fadeInUpBig" href="{{url('/auth/register')}}">Créez un compte, C'est gratuit !</a>
            <a class="btn btn-start animated fadeInUpBig" href="{{url('/auth/login')}}">Connexion</a>
            <br/><br/>
            <p class="animated fadeInRightBig">Transportez moins cher, plus rapidement, n'importe où</p>
          </div>
        </div>
      </div>
      
      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider-->
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">
            <h1 style="color:white;"><i class="fa fa-truck"></i> TPCom</h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="#home">Accéder au service</a></li>
            <li class="scroll"><a href="#services">Bénéfices et avantages</a></li> 
            <li class="scroll"><a href="#contact">Contactez-nous</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Bénéfices et avantages</h2>
            <p>Pourquoi utiliser nos services</p>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-flask"></i>
            </div>
            <div class="service-info">
              <h3>Réduisez vos coûts</h3>
              <p>Le réseau de transporteurs plus vaste rend le processus plus compétitif menant naturellement à des prix plus bas. Une manœuvre des lois de l’offre et la demande à votre avantage</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-umbrella"></i>
            </div>
            <div class="service-info">
              <h3>Améliorez vos délais de livraison</h3>
              <p>Chaque transporteur est évalué sur sa ponctualité, rapidité, securité et communication vous permettant ainsi de choisir le mieux adapté pour optimiser vos délais de livraison</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <div class="service-icon">
              <i class="fa fa-cloud"></i>
            </div>
            <div class="service-info">
              <h3>Trouvez des transporteurs vers n’importe quelle destination</h3>
              <p>Avec le réseau plus étendu, trouvez facilement des transporteurs vers n’importe quelle destination</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#services-->
  
  <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Nous contacter</h2>
            <p>Ce formulaire de contact vous permet d'avoir plus d'informations sur le service que nous proposons ; ou de prendre contact avec nous</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="{{url('/contact')}}">
                {!! csrf_field() !!}
                
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="nom" class="form-control" placeholder="Nom" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Adresse email" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="sujet" class="form-control" placeholder="Sujet" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Entrez votre message" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Envoyer</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Service commercial de TransPlateforme.com.</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Adresse :</span> Appt x, imm n, Agdal, Rabat, Maroc </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:contact@transplateforme.com"> contact@transplateforme.com</a></li>
                  <li><i class="fa fa-phone"></i> <span> Fixe :</span> +212 5 xx xx xx  </li>
                  <li><i class="fa fa-phone"></i> <span> Fax :</span> +212 5 xx xx xx  </li>
                  <li><i class="fa fa-globe"></i> <span> Site Web:</span> <a href="www.transplateforme.com">www.transplateforme.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="{{url('/')}}"><h1 style="color:white;"><i class="fa fa-truck"></i> TransPlateforme.com</h1></a>
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2015 Transplateforme.com.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Conçu par <a href="#">Transplateforme.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="{{url('tp_front')}}/js/jquery.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/wow.min.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/mousescroll.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/smoothscroll.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/jquery.countTo.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/lightbox.min.js"></script>
  <script type="text/javascript" src="{{url('tp_front')}}/js/main.js"></script>

</body>
</html>
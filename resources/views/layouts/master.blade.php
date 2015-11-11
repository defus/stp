<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Shared Carrier Plateform</title>

    <!-- Bootstrap core CSS -->

    <link href="{{url('tp_back')}}/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('tp_back')}}/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('tp_back')}}/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{url('tp_back')}}/css/custom.css" rel="stylesheet">
    <link href="{{url('tp_back')}}/css/icheck/flat/green.css" rel="stylesheet">
    <!-- ion_range -->
    <link rel="stylesheet" href="{{url('tp_back')}}/css/normalize.css" />
    <link rel="stylesheet" href="{{url('tp_back')}}/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="{{url('tp_back')}}/css/ion.rangeSlider.skinFlat.css" />

    <!-- colorpicker -->
    <link href="{{url('tp_back')}}/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    
    <!-- sweetalert -->
    @yield('style')
    
    <script src="{{url('tp_back')}}/js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="{{url('tp_back')}}/../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{url('/')}}" class="site_title"><span>SCP</span></a>
                    </div>
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{url('/users/' . auth()->user()->logo)}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenue,</span>
                            <h2>{{auth()->user()->name}}</h2>
                            <h3>{{auth()->user()->getType()}}</h3>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>Favoris</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-truck"></i> Demandes de chargement</a>
                                    <ul class="nav child_menu" style="display: none">
                                        @can(App\User::DONNEUR_ORDRE)
                                        <li><a href="{{url('/admin/chargement/create')}}"> Ajouter une demande de chargement <span class="label label-success pull-right">Nouveau</span></a>
                                        </li>
                                        @endcan
                                        @can(App\User::DONNEUR_ORDRE)
                                        <li><a href="{{url('/admin/chargement')}}"> Mes Demandes de chargement en cours</a>
                                        </li>
                                        @endcan
                                        @can(App\User::TRANSPORTEUR)
                                        <li><a href="{{url('/admin/chargement')}}"> Demande de chargement en cours</a>
                                        </li>
                                        @endcan
                                        @can(App\User::DONNEUR_ORDRE)
                                        <li><a href="{{url('/admin/chargement/archive')}}"> Demandes de chargement archivées</a>
                                        </li>
                                        @endcan
                                        @can(App\User::ADMIN)
                                        <li><a href="{{url('/admin/chargement')}}"> Statistiques</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>Autres fonctions</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-bug"></i> Paramètres <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{url('/admin/user/profile')}}">Paramètres du compte</a>
                                        </li>
                                        <li><a href="{{url('/admin/user/societe')}}">Paramètres société</a>
                                        </li>
                                        <li><a href="{{url('/admin/help')}}">Aide</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Paramètres du compte" href="{{url('/admin/user/profile')}}">
                            <span class="fa fa-user" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Paramètres société" href="{{url('/admin/user/societe')}}">
                            <span class="fa fa-institution" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Aide" href="{{url('/admin/help')}}">
                            <span class="fa fa-question" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Déconnexion" href="{{url('/auth/logout')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{url('/users/' . auth()->user()->logo)}}" alt="">{{auth()->user()->name}}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="{{url('/admin/user/profile')}}">  Paramètres du compte</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/user/societe')}}">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Paramètres société</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/help')}}">Aide</a>
                                    </li>
                                    <li><a href="{{url('/auth/logout')}}"><i class="fa fa-sign-out pull-right"></i> Déconnexion</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">2</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{url('/users/' . auth()->user()->logo)}}" alt="Image du profile" />
                                    </span>
                                            <span>
                                        <span>{{auth()->user()->name}}</span>
                                            <span class="time">3 min environ</span>
                                            </span>
                                            <span class="message">
                                        Vous avez reçu dune nouvelle demande de transport 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{url('/users/' . auth()->user()->logo)}}" alt="Image du profile" />
                                    </span>
                                            <span>
                                        <span>{{auth()->user()->name}}</span>
                                            <span class="time">3 min environ</span>
                                            </span>
                                            <span class="message">
                                        Vous avez reçu dune nouvelle demande de transport 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>Voir toutes les alertes</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    @yield('title')
                </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Rechercher ...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    
                    @yield('content')
                </div>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Réseau de transporteurs. |
                            <span class="lead"> <i class="fa fa-truck"></i> Shared Carrier Plateform</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="{{url('tp_back')}}/js/bootstrap.min.js"></script>

    <!-- chart js -->
    <script src="{{url('tp_back')}}/js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="{{url('tp_back')}}/js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="{{url('tp_back')}}/js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="{{url('tp_back')}}/js/icheck/icheck.min.js"></script>
    <script src="{{url('tp_back')}}/js/custom.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="{{url('tp_back')}}/js/moment.min2.js"></script>
    <script type="text/javascript" src="{{url('tp_back')}}/js/datepicker/daterangepicker.js"></script>
    <!-- input mask -->
    <script src="{{url('tp_back')}}/js/input_mask/jquery.inputmask.js"></script>
    <!-- form validation -->
    <script type="text/javascript" src="{{url('tp_back')}}/js/parsley/parsley.min.js"></script>
    <script type="text/javascript" src="{{url('tp_back')}}/js/parsley/i18n/fr.js"></script>
    <script type="text/javascript">
        window.Parsley.setLocale('fr');
    </script>
    <!-- knob -->
    <script src="{{url('tp_back')}}/js/knob/jquery.knob.min.js"></script>
    <!-- range slider -->
    <script src="{{url('tp_back')}}/js/ion_range/ion.rangeSlider.min.js"></script>
    <!-- color picker -->
    <script src="{{url('tp_back')}}/js/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="{{url('tp_back')}}/js/colorpicker/docs.js"></script>

    <!-- image cropping -->
    <script src="{{url('tp_back')}}/js/cropping/cropper.min.js"></script>
    <script src="{{url('tp_back')}}/js/cropping/main2.js"></script>

    @yield('script')
</body>

</html>
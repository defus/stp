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

    <!-- switchery -->
    <link rel="stylesheet" href="{{url('tp_back')}}/css/switchery/switchery.min.css" />
    
    <!--[if lt IE 9]>
        <script src="{{url('tp_back')}}/../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <div id="wrapper">
            @yield('content')
        </div>
    </div>

    <script src="{{url('tp_back')}}/js/jquery.min.js"></script>
    
    <script src="{{url('tp_back')}}/js/bootstrap.min.js"></script>
    
    <!-- form validation -->
    <script type="text/javascript" src="{{url('tp_back')}}/js/parsley/parsley.min.js"></script>
    <script type="text/javascript" src="{{url('tp_back')}}/js/parsley/i18n/fr.js"></script>
    <script type="text/javascript">
        window.Parsley.setLocale('fr');
    </script>
    
    <!-- icheck -->
    <script src="{{url('tp_back')}}/js/icheck/icheck.min.js"></script>
    
    <script type="text/javascript">
        /** ******  iswitch  *********************** **/
        if ($("input.flat")[0]) {
            $(document).ready(function () {
                $('input.flat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });
        }
        /** ******  /iswitch  *********************** **/
    </script>
    
    @yield('script')    
</body>

</html>
<meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- The styles -->
        <link  href="{{url('/')}}/public/asset/css/bootstrap-cerulean.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <link href="{{url('/')}}/public/asset/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="{{url('/')}}/public/asset/css/charisma-app.css" rel="stylesheet">
        <link href="{{url('/')}}/public/asset/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
        <link href='{{url('/')}}/public/asset/css/fullcalendar.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
        <link href='{{url('/')}}/public/asset/css/chosen.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/uniform.default.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/colorbox.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/jquery.cleditor.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/jquery.noty.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/noty_theme_default.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/elfinder.min.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/elfinder.theme.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/jquery.iphone.toggle.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/opa-icons.css' rel='stylesheet'>
        <link href='{{url('/')}}/public/asset/css/uploadify.css' rel='stylesheet'>
        
        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- The fav icon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <script src="{{url('/')}}/public/js/country.js" type="text/javascript"></script>
        <script type="text/javascript">

            function check_delete() {
                var mes = confirm('You sure want to delete it?');
                if (mes) {
                    return true;
                } else {
                    return false;
                }

            }

        </script>
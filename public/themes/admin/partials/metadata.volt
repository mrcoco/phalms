<title>{{ config.application.siteName }} | admin page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ url("themes/admin/") }}css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ url("themes/admin/") }}css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ url("themes/admin/") }}trumbowyg/dist/ui/trumbowyg.min.css" type="text/css"/>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ url("themes/admin/") }}css/font.css" type="text/css"/>
<link href="{{ url("themes/admin/") }}css/font-awesome.css" rel="stylesheet">
<link href="{{ url("themes/admin/") }}bootgrid/jquery.bootgrid.css" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="{{ url("themes/admin/") }}js/jquery2.0.3.min.js"></script>
<script src="{{ url("themes/admin/") }}js/modernizr.js"></script>
<script src="{{ url("themes/admin/") }}js/jquery.cookie.js"></script>
<script src="{{ url("themes/admin/") }}js/screenfull.js"></script>
<script src="{{ url("themes/admin/") }}bootgrid/jquery.bootgrid.js"></script>

<script>
    $(function () {
        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

        if (!screenfull.enabled) {
            return false;
        }



        $('#toggle').click(function () {
            screenfull.toggle($('#container')[0]);
        });
    });
</script>
<!-- charts -->
<script src="{{ url("themes/admin/") }}js/raphael-min.js"></script>
<script src="{{ url("themes/admin/") }}js/morris.js"></script>
<link rel="stylesheet" href="{{ url("themes/admin/") }}css/morris.css">
<!-- //charts -->
<!--skycons-icons-->
<script src="{{ url("themes/admin/") }}js/skycons.js"></script>
<!--//skycons-icons-->
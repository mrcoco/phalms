<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>{{ config.application.siteName }}</title>

<!-- Vendor stylesheet files. REQUIRED -->
<!-- BEGIN: Vendor  -->
<link rel="stylesheet" href="{{ url("themes/admin/") }}assets/css/vendor.css">
<!-- END: core stylesheet files -->

<!-- Plugin stylesheet files. OPTIONAL -->

<link rel="stylesheet" href="{{ url("themes/admin/") }}assets/vendor/jqvmap/jqvmap.css">

<link rel="stylesheet" href="{{ url("themes/admin/") }}assets/vendor/dragula/dragula.css">

<link rel="stylesheet" href="{{ url("themes/admin/") }}assets/vendor/perfect-scrollbar/perfect-scrollbar.css">

<!-- END: plugin stylesheet files -->

<!-- Theme main stlesheet files. REQUIRED -->
<link rel="stylesheet" href="{{ url("themes/admin/") }}assets/css/chl.css">
<link id="theme-list" rel="stylesheet" href="{{ url("themes/admin/") }}assets/css/theme-peter-river.css">
<!-- END: theme main stylesheet files -->

<link rel="stylesheet" href="{{ url("themes/admin/") }}trumbowyg/dist/ui/trumbowyg.min.css" type="text/css"/>

{% if assets.exists("header") %}
    {{ assets.outputCss('header') }}
{% endif %}

<!-- begin pace.js  -->
<link rel="stylesheet" href="{{ url("themes/admin/") }}assets/vendor/pace/themes/blue/pace-theme-minimal.css">
<script src="{{ url("themes/admin/") }}assets/vendor/pace/pace.js"></script>
<!-- END: pace.js  -->

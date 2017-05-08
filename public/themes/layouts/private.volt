<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	{{ partial("metadata") }}
</head>
<body class="dashboard-page">
<script>
    var theme = $.cookie('protonTheme') || 'default';
    $('body').removeClass (function (index, css) {
        return (css.match (/\btheme-\S+/g) || []).join(' ');
    });
    if (theme !== 'default') $('body').addClass(theme);
</script>
{{ partial("menu") }}
<section class="wrapper scrollable">
	{{ partial("header") }}
	<div class="main-grid">
		<div class="agile-grids">
		{{ content() }}
		</div>
	</div>

	<!-- footer -->
	{{ partial("footer") }}
	<!-- //footer -->
</section>
<script src="{{ url("themes/admin/") }}js/bootstrap.js"></script>
<script src="{{ url("themes/admin/") }}trumbowyg/dist/trumbowyg.min.js"></script>
    {% if assets.exists('footer') %}
        {{ assets.outputJs('footer') }}
    {% endif %}
</body>
</html>
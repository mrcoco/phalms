<!-- Vendor javascript files. REQUIRED -->
<script src="{{ url("themes/admin/") }}assets/js/vendor.js"></script>
<!-- END: End javascript files -->

<script src="{{ url("themes/admin/") }}assets/js/toastr.min.js"></script>
<script src="{{ url("themes/admin/") }}assets/js/alert.js"></script>
<script src="{{ url("themes/admin/") }}assets/js/jquery.form.min.js"></script>
<script src="{{ url("themes/admin/") }}trumbowyg/dist/trumbowyg.min.js"></script>
<script src="{{ url("themes/admin/") }}bootgrid/jquery.bootgrid.js"></script>

<!-- Demo javascript files. NOT REQUIRED -->

<!-- END: demo javascript files -->

<script src="{{ url("themes/admin/") }}assets/js/chl.js"></script>
<script src="{{ url("themes/admin/") }}assets/js/chl-demo.js"></script>
<!-- <script src="{{ url("themes/admin/") }}assets/js/jquery.easy-autocomplete.min.js"></script> -->
<script src="{{ url("themes/admin/") }}assets/js/awesomplete.js" async></script>

{% if assets.exists("footer") %}
    {{ assets.outputJs('footer') }}
{% endif %}
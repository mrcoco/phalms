<!-- begin .app -->
<div class="app">
    <!-- begin .app-wrap -->
    <div class="app-wrap">

        {{ partial("header") }}
        <!-- begin .app-container -->
        <div class="app-container">

            {{ partial("aside") }}

            <!-- begin side-collapse-visible bar -->
            <div class="side-visible-line hidden-xs" data-side="collapse">
                <i class="fa fa-caret-left"></i>
            </div>
            <!-- begin side-collapse-visible bar -->

            <!-- begin .app-main -->
            <div class="app-main">

                {{ partial("breadcrum") }}

                <!-- begin .main-content -->
                <div class="main-content bg-clouds">

                    <!-- begin .container-fluid -->
                    <div class="container-fluid p-t-15">
                        <div class="row">
                            {{ content() }}
                        </div>

                    </div>
                    <!-- END: .container-fluid -->

                </div>
                <!-- END: .main-content -->

                <!-- begin .main-footer -->
                <footer class="main-footer bg-white p-a-5">
                    main footer
                </footer>
                <!-- END: .main-footer -->

            </div>
            <!-- END: .app-main -->
        </div>
        <!-- END: .app-container -->

        {{ partial("footer") }}

    </div>
    <!-- END: .app-wrap -->
</div>
<!-- END: .app -->

<span class="fa fa-angle-up" id="totop" data-plugin="totop"></span>
{{ partial("script") }}
{% if assets.exists('footer') %}
    {{ assets.outputJs('footer') }}
{% endif %}
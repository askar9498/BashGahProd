<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="fa">
<!--begin::Head-->
<head>
    <?php $__env->startSection('head-meta'); ?>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php echo $__env->yieldSection(); ?>
    <?php $__env->startSection('head-links'); ?>
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/media/logo-circle.png')); ?>"/>
        <link href="https://fonts.googleapis.com/cssfamily=Inter:300,400,500,600,700"/>
        <link href="<?php echo e(asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')); ?>" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.css')); ?>" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo e(asset('assets/plugins/global/plugins.bundle.rtl.css')); ?>" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo e(asset('assets/css/style.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css"/>
        <script src="<?php echo e(asset('assets/plugins/jquery.min.js')); ?>"></script>
        <script type="text/javascript"
                src="<?php echo e(asset('vendor/sweetalert2.all.min.js')); ?>"></script>
        <link href="<?php echo e(asset('assets/css/tables.css')); ?>" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
        <script type="text/javascript"
                src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
    <?php echo $__env->yieldSection(); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldContent('head-rest'); ?>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var thememode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            thememode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getitem("data-bs-theme") !== null) {
                thememode = localStorage.getitem("data-bs-theme");
            } else {
                thememode = defaultThemeMode;
            }
        }
        if (thememode === "system") {
            thememode = window.matchMedia("(prefers-color-scheme: dark)").matches
            "dark"
        :
            "light";
        }
        document.documentElement.setAttribute("data-bs-theme", thememode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--begin::اپلیکیشن-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <?php echo $__env->yieldContent('content'); ?>

    </div>
</div>
<?php $__env->startSection('scripts'); ?>
    <script>
        jalaliDatepicker.startWatch();
        $(document).ready(function (){
            $('.modal .select2-hidden-accessible').each(function (){
                let parent = $(this).closest('.modal');
                console.log(parent);
                if(parent){
                    $(this).select2({
                        dropdownParent: parent
                    });
                }
            });
        });
        ////////////
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('a.submit-link').forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault(); // Prevent the default anchor behavior

                    // Locate the parent form
                    var parentForm = this.closest('form');

                    // Submit the parent form
                    if (parentForm) {
                        parentForm.submit();
                    }
                });
            });
        });

        ////////////////////////
        function showProgressButton(t) {
            $(t).find(".indicator-label").hide();
            $(t).find(".indicator-progress").show();
        }

        function hideProgressButton(t) {
            $(t).find(".indicator-label").show();
            $(t).find(".indicator-progress").hide();
        }
    </script>
    <!--begin::Javascript-->
    <script>var hostUrl = "dashboard/";</script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="<?php echo e(asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')); ?>"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <!--end::Vendors Javascript-->
    <!--begin::سفارشی Javascript(used for this page only)-->
    <script src="<?php echo e(asset('assets/js/widgets.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/widgets.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/apps/chat/chat.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/utilities/modals/upgrade-plan.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/utilities/modals/create-app.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/utilities/modals/new-target.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/utilities/modals/users-search.js')); ?>"></script>
    <!--end::سفارشی Javascript-->
    <!--end::Javascript-->

<?php echo $__env->yieldSection(); ?>
</body>
<!--end::Body-->
</html>
<?php /**PATH /app/resources/views/panels/_html.blade.php ENDPATH**/ ?>
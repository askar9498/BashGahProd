<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>باشگاه بازنشستگان آریاساسول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="باشگاه بازنشستگان آریاساسول"/>
    <meta name="keywords" content="آریاساسول, باشگاه, بازنشستگان"/>
    <meta name="author" content="alisarlak"/>
    <meta name="email" content="alisarlak1397@gmail.com"/>
    <?php $__env->startSection('head-links'); ?>
        <link rel="shortcut icon" href="<?php echo e(asset('website/images/favicon.ico')); ?>">
        <link href="<?php echo e(asset('website/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('website/css/tobii.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('website/css/materialdesignicons.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo e(asset('website/css/line.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('website/css/tiny-slider.css')); ?>"/>
        <link href="<?php echo e(asset('website/css/swiper.min.css')); ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo e(asset('website/css/style.min.css')); ?>" rel="stylesheet" type="text/css" id="theme-opt"/>
        <link href="<?php echo e(asset('website/css/colors/default.css')); ?>" rel="stylesheet" id="color-opt">
        <link href="<?php echo e(asset('website/css/custom.css')); ?>" rel="stylesheet" id="custom-css">
        <script src="<?php echo e(asset('website/js/jquery-3.7.1.min.js.js')); ?>"></script>

    <?php echo $__env->yieldSection(); ?>
    <style>
        .news-item-wrapper,
        .sub-news-item-wrapper {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
        }

        @media (max-width: 450px) {
            .swiper-slider-hero {
                top: 152px;
                height: 42vh !important;
            }

            .swiper-slider-hero .title-heading .heading {
               font-size: 20px !important;
            }

            .swiper-slider-hero .title-heading p {
               font-size: 14px !important;
            }

            #navigation{
                top: 125px;
            }
            .slide-bg-image{
                max-width: 100%;
                min-height: 335px !important;
                max-height: 335px !important;
            }
            .service-section{
                padding: 359px 0;
            }

        }
    </style>
</head>

<body>
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <div>
            <a class="logo" href="/">
                <img src="<?php echo e(asset('website/images/logo-dark.png')); ?>" class="l-dark" height="70" alt="">
                <img src="<?php echo e(asset('website/images/logo-light.png')); ?>" class="l-light" height="70" alt="">
            </a>
        </div>
        <div class="buy-button">
            <a href="https://rcadmin.aryasasol.com/auth/signin" target="_blank">
                <div class="btn btn-primary login-btn-primary">ورود به باشگاه</div>
                <div class="btn btn-light login-btn-light"> ورود به باشگاه</div>
            </a>
        </div>
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <div id="navigation">
            <ul class="navigation-menu nav-light">
                <li><a href="/home" class="sub-menu-item">صفحه اصلی </a></li>
                <li><a href="/about-co" class="sub-menu-item">درباره شرکت </a></li>
                <li><a href="<?php echo e(route('home')."#CEO-Message"); ?>" class="sub-menu-item">پیام مدیرعامل </a></li>
                <li><a href="/about-rc" class="sub-menu-item">درباره باشگاه </a></li>
                <li><a href="/pages/gallery" class="sub-menu-item">گزارش تصویری</a></li>
                <li><a href="/contact-us" class="sub-menu-item">ارتباط با ما</a></li>
            </ul>
            <div class="buy-menu-btn d-none">
                <a href="https://rcadmin.aryasasol.com/auth/signin" target="_blank" class="btn btn-primary">ورود به
                    باشگاه</a>
            </div>
        </div>
    </div>
</header>

<?php echo $__env->yieldContent('content'); ?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                    <img src="<?php echo e(asset('website/images/logo-light.png')); ?>" height="70" alt="">
                </a>
                <p class="mt-4">سایت باشگاه بازنشستگان شرکت پلیمر آریاساسول به منظور تسهیل در امور بازنشستگان و
                    ارائه خدمات غیر حضوری و حمایت به ایشان در دسترس اعضا قرار گرفته است</p>
                <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                    <li class="list-inline-item"><a href="https://t.me/aryasasol_official" class="rounded"><i
                                    class="fea icon-sm fea-social uil-telegram"></i></a></li>
                    <li class="list-inline-item"><a href="https://instagram.com/aryasasol_official"
                                                    class="rounded"><i data-feather="instagram"
                                                                       class="fea icon-sm fea-social"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/aryasasol/"
                                                    class="rounded"><i data-feather="linkedin"
                                                                       class="fea icon-sm fea-social"></i></a></li>
                </ul><!--end icon-->
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">دسترسی سریع </h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="/home" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            صفحه اصلی </a></li>
                    <li><a href="/about-co" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            درباره شرکت </a></li>
                    <li><a href="#" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i> پیام مدیرعامل </a>
                    </li>
                    <li><a href="/about-rc" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            درباره باشگاه
                        </a></li>
                    <li><a href="#" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            گزارش تصویری </a></li>
                    <li><a href="/contact-us" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            ارتباط با ما </a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">پیوند ها </h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="https://en.mop.ir/" class="text-foot"><i
                                    class="uil uil-angle-left-b ms-1"></i>وزارت نفت</a></li>
                    <li><a href="https://en.nipc.ir/" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            شرکت ملی صنایع پتروشیمی</a></li>
                    <li><a href="https://aryasasol.com" class="text-foot"><i class="uil uil-angle-left-b ms-1"></i>
                            شرکت پلیمر آریاساسول</a></li>
                    <li><a href="https://aryasasolic.com" class="text-foot"><i
                                    class="uil uil-angle-left-b ms-1"></i>مرکز نوآوری آریاساسول </a></li>
                </ul>
            </div><!--end col-->
            <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <img src="<?php echo e(asset('website/images/Slogan.png')); ?>" style="width: 100%;">
                <!-- <p class="mt-4">ثبت نام کنید و آخرین نکات را از طریق رایانامه دریافت کنید.</p> -->

            </div>
        </div><!--end row-->
    </div><!--end container-->
</footer>
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">©
                        <script>document.write(new Date().getFullYear())</script>
                        طراحی شده در باشگاه بازنشستگان
                        <a href="#" target="_blank" class="text-reset">شرکت پلیمر آریاساسول</a>.
                    </p>
                </div>
            </div><!--end col-->

        </div><!--end row-->
    </div><!--end container-->
</footer>

<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i
            data-feather="arrow-up" class="icons"></i></a>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" id="close-video-modal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <video src="" id="video" autoplay controls></video>

            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('website/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/tiny-slider.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/shuffle.min.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/tobii.min.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/switcher.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/plugins.init.js')); ?>"></script>
<script src="<?php echo e(asset('website/js/app.js')); ?>"></script>

<script src="<?php echo e(asset('website/js/custom.js')); ?>"></script>
</body>

</html><?php /**PATH /app/resources/views/website/_html.blade.php ENDPATH**/ ?>
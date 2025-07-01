<?php $__env->startSection('head-links'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('head-links'); ?>
    <link href="<?php echo e(asset('/website/css/quill.snow.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Hero Start -->
    <section class="bg-half bg-dark d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level text-light">
                        <h2> <?php echo e($post->title); ?> </h2>
                        <ul class="list-unstyled mt-4">
                            <li class="list-inline-item h6 user text-muted me-2"><i class="mdi mdi-account"></i> مدیر
                                وبسایت
                            </li>
                            <li class="list-inline-item h6 date text-muted"><i class="mdi mdi-calendar-check"></i>
                                1402/08/20
                            </li>
                        </ul>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="#">وبلاگ </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">جزئیات وبلاگ</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!-- Blog STart -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- BLog Start -->
                <div class="col-lg-8 col-md-6 d-block">
                    <div class="card blog blog-detail border-0 shadow rounded d-block">
                        <img src="<?php echo e($post->image->download_link ?? ''); ?>" class="img-fluid rounded-top"
                             alt="<?php echo e($post->title); ?>">
                        <div class="card-body content d-block">
                            <?php echo $post->body; ?>

                        </div>
                    </div>
                    <div class="card shadow rounded border-0 mt-4">
                    </div>

                    <div class="card shadow rounded border-0 mt-4">
                        <div class="card-body">
                            <h5 class="card-title mb-0">پست های اخیر :</h5>

                            <div class="row">
                                <?php $__currentLoopData = $latest_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6 mt-4 pt-2">
                                        <div class="card blog rounded border-0 shadow">
                                            <div class="position-relative">
                                                <img src="<?php echo e($latest_post->image->download_link); ?>"
                                                     class="card-img-top rounded-top"
                                                     alt="<?php echo e($latest_post->title); ?>">
                                                <div class="overlay rounded-top bg-dark"></div>
                                            </div>
                                            <div class="card-body content">
                                                <a href="/news/<?php echo e($latest_post->slug); ?>" class="card-title title text-dark">
                                                    <p class="text-muted"> <?php echo e($latest_post->title); ?>

                                                    </p>
                                                    <h6></h6>
                                                </a>
                                                <div class="post-meta d-flex justify-content-between mt-3">
                                                    <ul class="list-unstyled mb-0">

                                                    </ul>
                                                    <a href="/news/<?php echo e($latest_post->slug); ?>" class="text-muted readmore">ادامه
                                                        مطلب
                                                        <i class="uil uil-angle-left-b align-middle"></i></a>
                                                </div>
                                            </div>
                                            <div class="author">
                                                <small class="text-light user d-block"><i class="uil uil-user"></i> مدیر
                                                    سایت</small>
                                                <small class="text-light date"><i class="uil uil-calendar-alt"></i>
                                                    <?php echo e(\Morilog\Jalali\Jalalian::forge($latest_post->created_at)->format('Y/m/d')); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- BLog End -->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 sidebar sticky-bar rounded shadow">
                        <div class="card-body">
                            <!-- SEARCH -->
                            <div class="widget">
                                <form role="search" method="get">
                                    <div class="input-group mb-3 border rounded">
                                        <input type="text" id="s" name="s" class="form-control border-0"
                                               placeholder="جستجوی کلمه کلیدی...">
                                        <button type="submit" class="input-group-text bg-transparent border-0"
                                                id="searchsubmit"><i class="uil uil-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- SEARCH -->

                            <!-- Categories -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">دسته بندیها </h5>
                                <ul class="list-unstyled mt-4 mb-0 blog-categories">
                                    <li><a href="jvascript:void(0)">بیمه تکمیلی </a> <span class="float-end">2</span>
                                    </li>
                                    <li><a href="jvascript:void(0)">سفر </a> <span class="float-end">3 </span></li>
                                    <li><a href="jvascript:void(0)">رفاهی </a> <span class="float-end">4</span></li>
                                    <li><a href="jvascript:void(0)">آموزش</a> <span class="float-end">5</span></li>
                                    <li><a href="jvascript:void(0)">مشاوره</a> <span class="float-end">6</span></li>
                                </ul>
                            </div>
                            <!-- Categories -->

                            <!-- پست های اخیر -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">پست های اخیر</h5>
                                <div class="mt-4">
                                    <?php $__currentLoopData = $related_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="clearfix post-recent">
                                            <div class="post-recent-thumb float-start"><a href="/news/2"> <img
                                                            alt="img"
                                                            src="<?php echo e($related_post->image->download_link); ?>"
                                                            class="img-fluid rounded"></a></div>
                                            <div class="post-recent-content float-start">
                                                <a href="/news/<?php echo e($related_post->slug); ?>"><?php echo e($related_post->title); ?></a>
                                                <span class="text-muted mt-2"><?php echo e(\Morilog\Jalali\Jalalian::forge($related_post->created_at)->format('Y/m/d')); ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <!-- پست های اخیر -->

                            <!-- TAG CLOUDS -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">برچسب ها </h5>
                                <div class="tagcloud mt-4">
                                    <a href="jvascript:void(0)" class="rounded">خبر </a>
                                    <a href="jvascript:void(0)" class="rounded">بیمه </a>
                                    <a href="jvascript:void(0)" class="rounded">جشنواره</a>
                                    <a href="jvascript:void(0)" class="rounded">خدمات </a>

                                </div>
                            </div>
                            <!-- TAG CLOUDS -->

                            <!-- SOCIAL -->
                            <div class="widget">
                                <h5 class="widget-title">دنبال کردن ما</h5>
                                <ul class="list-unstyled social-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="instagram" class="fea icon-sm fea-social"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i
                                                    data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('website._html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/website/news/single.blade.php ENDPATH**/ ?>
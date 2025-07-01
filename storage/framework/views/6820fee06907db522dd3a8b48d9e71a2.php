<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('main'); ?>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    لیست خبر ها</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">خانه</a>
                    </li>
                    <!--end::item-->
                    <!--begin::item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::item-->
                    <!--begin::item-->
                    <li class="breadcrumb-item text-muted">خبر ها</li>
                    <!--end::item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-10">
                <!--begin::جداول Widget 5-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">اخرین خبرها </span>
                            <span class="text-muted mt-1 fw-semibold fs-7"> </span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="/admin/news/create" class="btn btn-sm fw-bold btn-primary">افزودن خبر</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="border-0">
                                    <th class="p-3 min-w-70px">شناسه خبر</th>
                                    <th class="p-3">عنوان</th>
                                    <th class="p-3">دسته بندی</th>
                                    <th class="p-3">وضعیت</th>
                                    <th class="p-3">زمان انتشار</th>
                                    <th class="p-3">عملیات</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="transaction_table" id="transaction_table">
                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <a href="/admin/news/<?php echo e($newsItem->id); ?>"
                                               class="text-center"><?php echo e($newsItem->id); ?></a>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center">
                                                <a href="/admin/news/<?php echo e($newsItem->id); ?>" class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                          style="background-image:url(<?php echo e(asset($newsItem->image->download_link??'assets/media/notify-banner.png')); ?>);"></span>
                                                </a>
                                                <div class="ms-5">
                                                    <a href="/admin/news/<?php echo e($newsItem->id); ?>"
                                                       class="text-gray-600 text-hover-primary fs-5 "
                                                       data-kt-ecommerce-product-filter="product_name">
                                                        <?php echo e($newsItem->title); ?>

                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-gray-700 fw-normal  text-hover-primary mb-1 fs-7"><?php echo e($newsItem->category->title); ?></p>
                                        </td>

                                        <td class="text-center">
                                            <?php switch($newsItem->status):
                                                case (\App\Enums\PostStatuses::PUBLISHED): ?>
                                                    <span class=" badge badge-light-success"> منتشر شده</span>
                                                    <?php break; ?>
                                                <?php case (\App\Enums\PostStatuses::DRAFTED): ?>
                                                    <span class="badge badge-light-warning"> پیش نویس</span>
                                                    <?php break; ?>
                                            <?php endswitch; ?>
                                        </td>
                                        <td class="text-center">
                                            <p><?php echo e(\Morilog\Jalali\Jalalian::forge($newsItem->created_at)->format('%A, %d %B %Y - H:i')); ?></p>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" data-bs-toggle="tooltip"
                                                   title="تغییر وضعیت (انتشار/پیش نویس) "
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 toggle_status_news"
                                                   data-id="<?php echo e($newsItem->id); ?>">
                                                    <i class="ki-duotone ki-switch fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="/admin/news/<?php echo e($newsItem->id); ?>" data-bs-toggle="tooltip"
                                                   title="ویرایش خبر"
                                                   class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1">
                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="حذف خبر"
                                                   class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete_news"
                                                   data-id="<?php echo e($newsItem->id); ?>">
                                                    <i class="ki-duotone ki-trash fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                        <?php echo e($news->links('pagination::bootstrap-5')); ?>


                    </div>
                </div>

            </div>
        </div>
        <!--end::Content container-->
    </div>
    <script>
        $(document).ready(function () {
            $('.delete_news').on('click', function () {
                let thisElement = $(this);
                Swal.fire(
                    {
                        title: 'حذف خبر',
                        type: 'warning',
                        text: 'آیا از حذف خبر مطمین هستید؟',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'لغو',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }).then(function (result) {
                    if (result.isConfirmed) {
                        Swal.showLoading();
                        $.ajax({
                            url: `/admin/news/${thisElement.data('id')}`,
                            type: 'DELETE',
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire(
                                    {
                                        type: 'success',
                                        text: 'خبر با موفقیت حذف شد!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                setTimeout(() => {
                                    window.location.reload();
                                }, 2000);
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status === 404) {
                                    Swal.fire(
                                        {
                                            title: 'خطا',
                                            type: 'error',
                                            text: 'خبر مورد نظر یافت نشد!',
                                            confirmButtonText: 'باشه'
                                        });
                                } else {
                                    Swal.fire(
                                        {
                                            title: 'خطا',
                                            type: 'error',
                                            text: xhr.responseJSON.error || 'خطای سرور ',
                                            confirmButtonText: 'باشه'
                                        });
                                }
                            }
                        });
                    }

                });
            });

            $('.toggle_status_news').on('click', function () {
                let news_id = $(this).attr('data-id');
                Swal.showLoading();
                $.ajax({
                        url: `/admin/news/${news_id}/toggle-status`,
                        type: 'GET',
                        contentType: 'application/json',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'وضعیت با موفقیت تغییر کرد!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        },
                        error: function (xhr, status, error) {
                            if (xhr.status === 422) {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text: xhr.responseJSON.errors.name || xhr.responseJSON.errors.cellphone || xhr.responseJSON.errors.email,
                                        confirmButtonText: 'باشه'
                                    });
                            } else {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text: xhr.responseJSON.error || 'خطای سرور ',
                                        confirmButtonText: 'باشه'
                                    });
                            }
                        }
                    }
                );
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/news/index.blade.php ENDPATH**/ ?>
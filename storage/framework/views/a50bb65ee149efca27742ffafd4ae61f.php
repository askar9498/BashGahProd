<?php use App\Enums\PostStatuses; ?>


<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('head-links'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('head-links'); ?>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .gallery img {
            max-width: 150px;
            height: auto;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
        }

        .remove-image {
            width: 20px;
            height: 20px;
            padding: 0 !important;
            background: #ff0202b8;
            margin-top: -9px;
            margin-right: -9px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    خبر ها</h1>
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
                    <li class="breadcrumb-item text-muted"> افزودن خبر</li>
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
            <!--begin::form-->
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
                  data-kt-redirect="apps/ecommerce/catalog/products.html">
                <!--begin::کناری column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::کارت header-->
                        <div class="card-header">
                            <!--begin::کارت title-->
                            <div class="card-title">
                                <h2>تصویر شاخص</h2>
                            </div>
                            <!--end::کارت title-->
                        </div>
                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>.image-input-placeholder {
                                    background-image: url(<?php echo e(asset($news->image->download_link??'assets/media/notify-banner.png')); ?>);
                                }
                            </style>
                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <!--begin::نمایش existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::نمایش existing avatar-->
                                <!--begin::Tags-->
                                <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="تعویض آواتار">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <!--begin::Inputs-->
                                    <input id="featured_image" type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Tags-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::توضیحات-->
                            <div class="text-muted fs-7">Set the post thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted
                            </div>
                            <!--end::توضیحات-->
                        </div>
                        <!--end::کارت body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::وضعیت-->
                    <div class="card card-flush py-4">
                        <!--begin::کارت header-->
                        <div class="card-header">
                            <!--begin::کارت title-->
                            <div class="card-title">
                                <h2>وضعیت</h2>
                            </div>
                            <!--end::کارت title-->
                            <!--begin::کارت toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                     id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::کارت toolbar-->
                        </div>
                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body pt-0">
                            <!--begin::انتخاب2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="انتخاب " id="kt_ecommerce_add_news_status_select"
                                    autocomplete="off">
                                <option></option>
                                <option
                                        value="<?php echo e(PostStatuses::PUBLISHED); ?>" <?php echo e(($news->status===PostStatuses::PUBLISHED?'selected':'')); ?>>
                                    منتشر شده
                                </option>
                                <option
                                        value="<?php echo e(PostStatuses::DRAFTED); ?>" <?php echo e(($news->status===PostStatuses::DRAFTED?'selected':'')); ?>>
                                    پیش نویس
                                </option>
                            </select>
                            <!--end::انتخاب2-->
                            <!--begin::توضیحات-->
                            <div class="text-muted fs-7">وضعیت خبر را تنظیم کنید.</div>
                            <!--end::توضیحات-->
                            <!--begin::تاریخpicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">انتخاب
                                    publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker"
                                       placeholder="انتخاب تاریخ & time"/>
                            </div>
                            <!--end::تاریخpicker-->
                        </div>
                        <!--end::کارت body-->
                    </div>
                    <!--end::وضعیت-->
                    <!--begin::وضعیت-->
                    <div class="card card-flush py-4">
                        <!--begin::کارت header-->
                        <div class="card-header">
                            <!--begin::کارت title-->
                            <div class="card-title">
                                <h2>نوع اطلاعیه</h2>
                            </div>
                            <!--end::کارت title-->
                            <!--begin::کارت toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                     id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::کارت toolbar-->
                        </div>
                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body pt-0">
                            <!--begin::انتخاب2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="انتخاب " id="kt_ecommerce_add_news_type_select"
                                    autocomplete="off">
                                <option></option>
                                <?php $__currentLoopData = \App\Enums\PostType::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type); ?>"><?php echo e(getPostTypeName($type)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <!--end::انتخاب2-->
                            <!--begin::توضیحات-->
                            <div class="text-muted fs-7">نوع محتوا را مشخص کنید.</div>
                            <!--end::توضیحات-->
                            <!--begin::تاریخpicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">انتخاب
                                    publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker"
                                       placeholder="انتخاب تاریخ & time"/>
                            </div>
                            <!--end::تاریخpicker-->
                        </div>
                        <!--end::کارت body-->
                    </div>
                    <!--end::وضعیت-->
                    <!--begin::دسته بندی & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::کارت header-->
                        <div class="card-header">
                            <!--begin::کارت title-->
                            <div class="card-title">
                                <h2> جزییات خبر</h2>
                            </div>
                            <!--end::کارت title-->
                        </div>
                        <!--end::کارت header-->
                        <!--begin::کارت body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Tags-->
                            <label class="form-label">دسته بندی ها</label>
                            <!--end::Tags-->
                            <!--begin::انتخاب2-->
                            <select class="form-select mb-2" data-control="select" data-placeholder="انتخاب "
                                    autocomplete="off"
                                    data-allow-clear="true" id="kt_ecommerce_add_news_category_select">
                                <option></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($category->id); ?>" <?php echo e(($news->category_id === $category->id?'selected':'')); ?>><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                            <!--end::انتخاب2-->
                            <!--begin::توضیحات-->
                            <div class="text-muted fs-7 mb-7">افزودن دسته بندی.</div>
                            <!--end::توضیحات-->
                            <!--end::Input group-->
                            <!--begin::Button-->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_create_category"
                               class="btn btn-light-primary btn-sm mb-10">
                                <i class="ki-duotone ki-plus fs-2"></i>ساختن دسته بندی جدید </a>
                            <!--end::Button-->
                            <!--begin::Input group-->

                        </div>
                        <!--end::کارت body-->
                    </div>
                    <!--end::دسته بندی & tags-->
                </div>
                <!--end::کناری column-->
                <!--begin::اصلی column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::عمومی options-->
                                <div class="card card-flush py-4">
                                    <!--begin::کارت header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>محتوای خبر</h2>
                                        </div>
                                    </div>
                                    <!--end::کارت header-->
                                    <!--begin::کارت body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Tags-->
                                            <label class="required form-label">عنوان </label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <input autocomplete="off" type="text" name="news_title"
                                                   id="kt_ecommerce_add_news_title_select" class="form-control mb-2"
                                                   placeholder="عنوان خبر" value="<?php echo e($news->title); ?>"/>
                                            <!--end::Input-->
                                            <!--begin::توضیحات-->
                                            <div class="text-muted fs-7"></div>
                                            <!--end::توضیحات-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Tags-->
                                            <label class="required form-label">توضیحات کوتاه
                                            </label>
                                            <!--end::Tags-->
                                            <!--begin::Input-->
                                            <textarea name="news_description" class="form-control mb-2"
                                                      id="kt_ecommerce_add_news_description_select"
                                                      placeholder=" توضیحات خبر"
                                                      autocomplete="off"><?php echo e($news->description); ?></textarea>
                                            <!--end::Input-->
                                            <!--begin::توضیحات-->
                                            <div class="text-muted fs-7"></div>
                                            <!--end::توضیحات-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div>
                                            <!--begin::Tags-->
                                            <label class="form-label">متن خبر</label>
                                            <!--end::Tags-->
                                            <!--begin::or-->
                                            <div id="kt_ecommerce_add_product_description"
                                                 name="kt_ecommerce_add_product_description"
                                                 class="min-h-200px mb-2 ">
                                                <textarea class="d-none"><?php echo e($news->body); ?></textarea>
                                            </div>
                                            <!--end::or-->
                                            <!--begin::توضیحات-->
                                            <div class="text-muted fs-7">برای دید بهتر، توضیحاتی را برای خبر تنظیم
                                                کنید.
                                            </div>
                                            <!--end::توضیحات-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::کارت header-->
                                </div>
                                <!--end::عمومی options-->
                                <!--begin::Media-->
                                <div class="card card-flush py-4">
                                    <!--begin::کارت header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>رسانه</h2>
                                        </div>
                                    </div>
                                    <!--end::کارت header-->
                                    <!--begin::کارت body-->
                                    <div class="card-body pt-0">
                                        <div class="fv-row mb-5">
                                            <div class="gallery" id="image-gallery">
                                                <?php $__currentLoopData = $news->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="image-container" data-id="<?php echo e($attachment->id); ?>">
                                                        <a target="_blank" class="cursor-pointer"
                                                           href="<?php echo e($attachment->download_link); ?>">
                                                            <img src="<?php echo e(asset('assets/media/svg/files/doc.svg')); ?>"
                                                                 alt="Image"
                                                                 class="img-thumbnail">
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-sm remove-image"
                                                           data-id="<?php echo e($attachment->id); ?>">x
                                                        </a>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-2">
                                            <!--begin::Dropzone-->
                                            <div class="dropzone" id="kt_ecommerce_add_news_media">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">فایل ها را اینجا رها
                                                            کنید یا برای آپلود کلیک کنید.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-500">اپلود فایل بیش از 10 تا</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::توضیحات-->
                                        <div class="text-muted fs-7">پیوست خبر را تنظیم کنید.</div>
                                        <!--begin::توضیحات-->
                                        <div class="text-muted fs-7">بارگذاری فایل</div>
                                        <div id="dropzone-error-messages" class="text-danger error-message"></div>
                                        <div id="dropzone-success-messages" class="text-success success-message"></div>
                                        <!--end::توضیحات-->
                                        <!--end::توضیحات-->
                                    </div>
                                    <!--end::کارت header-->
                                </div>
                                <!--end::Media-->

                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button id="kt_ecommerce_add_news_submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره تغییرات</span>
                            <span class="indicator-progress">لطفا صبر کنید...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::اصلی column-->
            </form>
            <!--end::form-->
        </div>
        <!--end::Content container-->
    </div>
    <!--begin::Modal body-->
    <div id="kt_modal_create_category" class="modal fade updateUserModal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>ایجاد دسته بندی</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Tags-->
                            <label class="fs-6 fw-semibold form-label mb-2">نام دسته بندی</label>
                            <!--end::Tags-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative">
                                <!--begin::Input-->
                                <input type="text" id="createCategoryName"
                                       class="form-control form-control-solid" autocomplete="off"
                                       placeholder="نام دسته بندی" name="name"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                            <button id="createCategoryButton" type="submit" class="btn btn-primary">
                                <span class="indicator-label">تایید</span>
                                <span class="indicator-progress">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal body-->
    <script>
        let attachments = [];

        $(document).ready(function () {
            let featured_image_id = <?php echo e($news->image->id??0); ?>;
            $("#featured_image").change(function (e) {
                let formData = new FormData();
                let file = $("#featured_image")[0].files[0];
                formData.append('file', file);
                formData.append('directory', 'news');
                formData.append('_token', "<?php echo e(csrf_token()); ?>");
                Swal.showLoading();
                $.ajax({
                    url: '/files',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        Swal.fire(
                            {
                                type: 'success',
                                text: 'تصویر با موفقیت اضافه شد!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        featured_image_id = response['file'][0]['id'];
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            Swal.fire(
                                {
                                    title: 'خطا',
                                    type: 'error',
                                    text: xhr.responseJSON.errors.file[0],
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
            });

            $("#kt_ecommerce_add_news_submit").on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);
                showProgressButton(thisElement);
                let title = $('#kt_ecommerce_add_news_title_select').val();
                let description = $('#kt_ecommerce_add_news_description_select').val();
                let body = $('.ql-editor').html();
                let category_id = $('#kt_ecommerce_add_news_category_select').val();
                let status = $('#kt_ecommerce_add_news_status_select').val();
                let type = $('#kt_ecommerce_add_news_type_select').val();
                $.ajax({
                    url: '/admin/news/' + <?php echo e($news->id); ?>,
                    method: 'PUT',
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "title": title,
                        "description": description,
                        "body": body,
                        "category_id": category_id,
                        "status": status,
                        "type": type,
                        "featured_image_id": (featured_image_id ? featured_image_id : ''),
                        "attachments": attachments
                    },
                    success: function (response) {
                        hideProgressButton(thisElement);
                        Swal.fire(
                            {
                                title: 'ویرایش خبر',
                                type: 'success',
                                text: 'با موفقیت ویرایش شد!',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    },
                    error: function (xhr) {
                        hideProgressButton(thisElement);
                        if (xhr.status === 422) {
                            Swal.fire(
                                {
                                    title: 'خطا',
                                    type: 'error',
                                    text: xhr.responseJSON.errors.error || xhr.responseJSON.errors.title ||
                                        xhr.responseJSON.errors.description || xhr.responseJSON.errors.body ||
                                        xhr.responseJSON.errors.category_id ||
                                        xhr.responseJSON.errors.featured_image_id || xhr.responseJSON.errors.status,
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

            });

            $('#createCategoryButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);
                let cat_name = $("#createCategoryName");

                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/categories`,
                        type: 'POST',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "title": cat_name.val()
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'دسته بندی با موفقیت اضافه شد!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            hideProgressButton(thisElement);
                            $('#kt_modal_create_category').modal('toggle');
                            $("#kt_ecommerce_add_news_category_select").append(`<option value="${response['category']['id']}">${response['category']['title']}</option>`);
                        },
                        error: function (xhr, status, error) {
                            if (xhr.status === 422) {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text: xhr.responseJSON.errors.title,
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
                            hideProgressButton(thisElement);
                        }
                    }
                );
            });
            $('.remove-image').on('click', function (e) {
                e.preventDefault();
                let image_id = $(this).attr('data-id');

                let thisElement = $(this);
                Swal.fire(
                    {
                        title: 'حذف فایل از پیوست ',
                        type: 'warning',
                        text: 'در صورت تایید فایل از پیوست ها پاک خواهد شد؟',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'لغو',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }).then(function (result) {
                    if (result.isConfirmed) {
                        Swal.showLoading();
                        $.ajax({
                            url: `/admin/files/${image_id}`,
                            type: 'DELETE',
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire(
                                    {
                                        type: 'success',
                                        text: 'تصویر با موفقیت حذف شد!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                $('#image-gallery').find("[data-id='" + image_id + "']").remove();
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status === 404) {
                                    Swal.fire(
                                        {
                                            title: 'خطا',
                                            type: 'error',
                                            text: 'تصویر مورد نظر یافت نشد!',
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
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Dropzone
            new Dropzone("#kt_ecommerce_add_news_media", {
                url: "/files",
                maxFiles: 10,
                dictDefaultMessage: "فایل ها را اینجا رها کنید یا برای آپلود کلیک کنید.",
                dictMaxFilesExceeded: ".",
                addRemoveLinks: true,
                acceptedFiles: ".png,.jpg,jpeg,svg",
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                init: function () {
                    this.on("addedfile", function (file) {
                        $("#dropzone-error-messages").text('');
                        $("#dropzone-success-messages").text('');
                    });

                    this.on("success", function (file, response) {
                        document.getElementById('dropzone-error-messages').innerHTML = '';
                        document.getElementById('dropzone-success-messages').innerHTML = 'باموفقیت بارگذاری شد !';
                        attachments.push(response['file'][0]['id']);
                        file.imageId = response['file'][0]['id'];
                        console.log(attachments);
                    });

                    this.on('removedfile', function (file) {
                        var imageId = file.imageId;
                        var index = attachments.indexOf(imageId);
                        if (index !== -1) {
                            attachments.splice(index, 1);
                        }

                        // Remove the file preview element if it exists
                        var previewElement = file.previewElement;
                        if (previewElement && previewElement.parentNode) {
                            previewElement.parentNode.removeChild(previewElement);
                        }
                        console.log(attachments);
                    });

                    this.on('sending', function (data, xhr, formData) {
                        formData.append('directory', 'news');
                    });

                    this.on("error", function (file, errorMessage) {
                        document.getElementById('dropzone-success-messages').innerHTML = '';
                        var errorMessagesContainer = document.getElementById('dropzone-error-messages');
                        var errorElement = document.createElement('div');
                        errorElement.innerText = errorMessage.message;
                        errorMessagesContainer.appendChild(errorElement);
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/custom/apps/ecommerce/catalog/edit-product.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/image-resize.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/news/show.blade.php ENDPATH**/ ?>
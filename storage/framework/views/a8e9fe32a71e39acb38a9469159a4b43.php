<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('main'); ?>
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    خبر ها</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"> افزودن خبر</li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
                  data-kt-redirect="apps/ecommerce/catalog/products.html">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>تصویر شاخص</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <style>.image-input-placeholder {
                                    background-image: url(<?php echo e(asset('dashboard/media/svg/files/blank-image.svg')); ?>);
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url(<?php echo e(asset('dashboard/media/svg/files/blank-image.svg')); ?>);
                                }
                            </style>
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="تعویض آواتار">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input id="featured_image" type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
                                    <input type="hidden" name="avatar_remove"/>
                                </label>
                            </div>
                            <div class="text-muted fs-7">Set the post thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>وضعیت</h2>
                            </div>
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                     id="kt_ecommerce_add_product_status"></div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="انتخاب " id="kt_ecommerce_add_news_status_select"
                                    autocomplete="off">
                                <option></option>
                                <option value="<?php echo e(\App\Enums\PostStatuses::PUBLISHED); ?>" selected="selected">منتشر شده
                                </option>
                                <option value="<?php echo e(\App\Enums\PostStatuses::DRAFTED); ?>">پیش نویس</option>
                            </select>
                            <div class="text-muted fs-7">وضعیت خبر را تنظیم کنید.</div>
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">انتخاب
                                    publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker"
                                       placeholder="انتخاب تاریخ & time"/>
                            </div>
                        </div>
                    </div>
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

                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2> جزییات خبر</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <label class="form-label">دسته بندی ها</label>
                            <select class="form-select mb-2" data-control="select" data-placeholder="انتخاب "
                                    autocomplete="off"
                                    data-allow-clear="true" id="kt_ecommerce_add_news_category_select">
                                <option></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </select>
                            <div class="text-muted fs-7 mb-7">افزودن دسته بندی.</div>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_create_category"
                               class="btn btn-light-primary btn-sm mb-10">
                                <i class="ki-duotone ki-plus fs-2"></i>ساختن دسته بندی جدید </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>محتوای خبر</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">عنوان </label>
                                            <input autocomplete="off" type="text" name="news_title"
                                                   id="kt_ecommerce_add_news_title_select" class="form-control mb-2"
                                                   placeholder="عنوان خبر" value=""/>
                                            <div class="text-muted fs-7"></div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">توضیحات کوتاه
                                            </label>
                                            <textarea name="news_description" class="form-control mb-2"
                                                      id="kt_ecommerce_add_news_description_select"
                                                      placeholder=" توضیحات خبر" autocomplete="off"></textarea>
                                            <div class="text-muted fs-7"></div>
                                        </div>
                                        <div>
                                            <label class="form-label">متن خبر</label>
                                            <div id="kt_ecommerce_add_product_description"
                                                 name="kt_ecommerce_add_product_description"
                                                 class="min-h-200px mb-2"></div>
                                            <div class="text-muted fs-7">برای دید بهتر، توضیحاتی را برای خبر تنظیم
                                                کنید.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>رسانه</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="fv-row mb-2">
                                            <div class="dropzone" id="kt_ecommerce_add_news_media">
                                                <div class="dz-message needsclick">
                                                    <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">فایل ها را اینجا رها
                                                            کنید یا برای آپلود کلیک کنید.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-500">اپلود فایل بیش از 10 تا</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-muted fs-7">پیوست خبر را تنظیم کنید.</div>
                                        <div class="text-muted fs-7">بارگذاری فایل</div>
                                        <div id="dropzone-error-messages" class="text-danger error-message"></div>
                                        <div id="dropzone-success-messages" class="text-success success-message"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button id="kt_ecommerce_add_news_submit" class="btn btn-primary">
                            <span class="indicator-label">ذخیره تغییرات</span>
                            <span class="indicator-progress">لطفا صبر کنید...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="kt_modal_create_category" class="modal fade updateUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ایجاد دسته بندی</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold form-label mb-2">نام دسته بندی</label>
                            <div class="position-relative">
                                <input type="text" id="createCategoryName"
                                       class="form-control form-control-solid" autocomplete="off"
                                       placeholder="نام دسته بندی" name="name"/>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لغو</button>
                            <button id="createCategoryButton" type="submit" class="btn btn-primary">
                                <span class="indicator-label">تایید</span>
                                <span class="indicator-progress">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let attachments = [];

        $(document).ready(function () {
            let featured_image_id = 0;
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

                if (featured_image_id !== 0 || status !== '' || title !== '' || description !== '' || body !== '' || category_id !== '') {
                    $.ajax({
                        url: '/admin/news',
                        method: 'POST',
                        data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                            "title": title,
                            "description": description,
                            "body": body,
                            "category_id": category_id,
                            "status": status,
                            "type": type,
                            "featured_image_id": featured_image_id,
                            "attachments": attachments
                        },
                        success: function (response) {
                            hideProgressButton(thisElement);

                            setTimeout(function () {
                                window.location = '/admin/news/' + response['news']['id'];
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
                } else {
                    Swal.fire(
                        {
                            title: 'هشدار',
                            type: 'warning',
                            text: 'تمام فیلد ها پر کنید!',
                            confirmButtonText: 'باشه'
                        });
                }
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
    <script src="<?php echo e(asset('assets/js/custom/apps/ecommerce/catalog/save-product.js')); ?>"></script>
    <script src="https://unpkg.com/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/news/create.blade.php ENDPATH**/ ?>
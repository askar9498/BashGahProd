<?php use Morilog\Jalali\Jalalian; ?>


<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('main'); ?>
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    لیست تعهدات بیمه عمر و سرمایه گذاری</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"> بیمه عمر و سرمایه گذاری</li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1"> لیست تعهدات بیمه عمر و سرمایه گذاری</span>
                            <span class="text-muted mt-1 fw-semibold fs-7"></span>
                        </h3>
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                             data-bs-trigger="hover" data-bs-original-title="Click to add a Category"
                             data-kt-initialized="1">
                            <a href="#" class="btn btn-sm btn-light btn-primary" data-bs-toggle="modal"
                               data-bs-target="#createCategoryModal">
                                <i class="ki-duotone ki-plus fs-2"></i>افزودن</a>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                <tr class="border-0">
                                    <th class="p-3 min-w-70px">ردیف</th>
                                    <th class="p-3 min-w-100px ">مبلغ</th>
                                    <th class="p-3 min-w-100px ">توضیحات</th>
                                    <th class="p-3 min-w-100px ">شرکت بیمه گر</th>
                                    <th class="p-3 min-w-100px ">حق بیمه</th>
                                    <th class="p-3 min-w-100px ">سال بیمه ای</th>
                                    <th class="p-3 min-w-100px ">عملیات</th>
                                </tr>
                                </thead>
                                <tbody class="transaction_table" id="transaction_table">
                                <?php $__currentLoopData = $life_insurance_obligations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$life_insurance_obligation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-table">
                                            <?php echo e($life_insurance_obligations->firstItem()+$key); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e(number_format($life_insurance_obligation->amount)); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($life_insurance_obligation->description); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($life_insurance_obligation->insurance_company); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e(number_format($life_insurance_obligation->insurance_premium)); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($life_insurance_obligation->insurance_year); ?>

                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" data-bs-toggle="tooltip" title="ویرایش تعهد"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit_category"
                                                   data-id="<?php echo e($life_insurance_obligation->id); ?>"
                                                   data-amount="<?php echo e($life_insurance_obligation->amount); ?>"
                                                   data-description="<?php echo e($life_insurance_obligation->description); ?>"
                                                   data-insurance_year="<?php echo e($life_insurance_obligation->insurance_year); ?>"
                                                   data-insurance_premium="<?php echo e($life_insurance_obligation->insurance_premium); ?>"
                                                   data-insurance_company="<?php echo e($life_insurance_obligation->insurance_company); ?>"
                                                >
                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="حذف تعهد"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete_category"
                                                   data-id="<?php echo e($life_insurance_obligation->id); ?>"

                                                >
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
                        <?php echo e($life_insurance_obligations->appends($_GET)->links('pagination::bootstrap-5')); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="updateCategoryModal" class="modal fade updateCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ویرایش تعهد</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div class="row gx-10 mb-5">
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">مبلغ </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="مبلغ" name="amountEdit"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 ">
                            <label class="fs-6 fw-semibold form-label mb-2">توضیخات </label>
                            <div class="position-relative">
                                <textarea autocomplete="off" class="form-control form-control-solid"
                                          name="descriptionEdit"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <label class="fs-6 fw-semibold form-label mb-2">شرکت بیمه گر </label>
                            <div class="position-relative">
                                <input type="text" autocomplete="off" class="form-control form-control-solid"
                                       name="insuranceCompanyEdit"/>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <label class="fs-6 fw-semibold form-label mb-2">حق بیمه </label>
                            <div class="position-relative">
                                <input type="text" autocomplete="off" class="form-control form-control-solid"
                                       name="insurancePremiumEdit"/>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <label class="fs-6 fw-semibold form-label mb-2">سال بیمه ای </label>
                            <div class="position-relative">
                                <input type="text" autocomplete="off" class="form-control form-control-solid"
                                       name="insuranceYearEdit"/>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-danger me-3"
                                    data-bs-dismiss="modal">لغو
                            </button>
                            <button id="updateCategoryButton" type="submit" class="btn btn-primary">
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

    <div id="createCategoryModal" class="modal fade CreateCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ایجاد تعهد</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div class="row gx-10 mb-5">
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2"> مبلغ </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="مبلغ" name="amount"/>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <label class="fs-6 fw-semibold form-label mb-2"> توضیحات </label>
                                <div class="position-relative">
                                    <textarea autocomplete="off" type="text" class="form-control form-control-solid"
                                              placeholder="توضیحات" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">شرکت بیمه گر </label>
                                <div class="position-relative">
                                    <input type="text" autocomplete="off" class="form-control form-control-solid"
                                           name="insuranceCompany"/>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">حق بیمه </label>
                                <div class="position-relative">
                                    <input type="text" autocomplete="off" class="form-control form-control-solid"
                                           name="insurancePremium"/>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">سال بیمه ای </label>
                                <div class="position-relative">
                                    <input type="text" autocomplete="off" class="form-control form-control-solid"
                                           name="insuranceYear"/>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-danger me-3"
                                    data-bs-dismiss="modal">لغو
                            </button>
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
        $(document).ready(function () {

            $('.edit_category').on('click', function () {
                let id = $(this).attr('data-id');
                let amount = $(this).attr('data-amount');
                let description = $(this).attr('data-description');
                let insurance_year = $(this).attr('data-insurance_year');
                let insurance_premium = $(this).attr('data-insurance_premium');
                let insurance_company = $(this).attr('data-insurance_company');

                $('#updateCategoryModal').modal('show');
                $(".updateCategoryModal #updateCategoryButton").attr('data-id', id);

                $('input[name="amountEdit"]').val(amount);
                $('textarea[name="descriptionEdit"]').val(description);
                $('input[name="insuranceYearEdit"]').val(insurance_year);
                $('input[name="insurancePremiumEdit"]').val(insurance_premium);
                $('input[name="insuranceCompanyEdit"]').val(insurance_company);
            });

            $('#updateCategoryButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);
                let amount = $('input[name="amountEdit"]').val();
                let description = $('textarea[name="descriptionEdit"]').val();
                let insurance_year = $('input[name="insuranceYearEdit"]').val();
                let insurance_premium = $('input[name="insurancePremiumEdit"]').val();
                let insurance_company = $('input[name="insuranceCompanyEdit"]').val();


                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/life-insurances/obligations/${thisElement.data('id')}`,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "amount": amount,
                            "description": description,
                            "insurance_year": insurance_year,
                            "insurance_premium": insurance_premium,
                            "insurance_company": insurance_company,
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'دسته بندی با موفقیت تغییر کرد!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            hideProgressButton();

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000)
                        },
                        error: function (xhr, status, error) {
                            if (xhr.status === 422) {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text:
                                            xhr.responseJSON.errors.amount ||
                                            xhr.responseJSON.errors.description ||
                                            xhr.responseJSON.errors.insurance_year ||
                                            xhr.responseJSON.errors.insurance_premium ||
                                            xhr.responseJSON.errors.insurance_company
                                        ,
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

            $('#createCategoryButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);

                let amount = $('input[name="amount"]').val();
                let description = $('textarea[name="description"]').val();
                let insurance_year = $('input[name="insuranceYear"]').val();
                let insurance_premium = $('input[name="insurancePremium"]').val();
                let insurance_company = $('input[name="insuranceCompany"]').val();

                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/life-insurances/obligations`,
                        type: 'POST',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "amount": amount,
                            "description": description,
                            "insurance_year": insurance_year,
                            "insurance_premium": insurance_premium,
                            "insurance_company": insurance_company,
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'تعهد با موفقیت اضافه شد!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            hideProgressButton();

                            setTimeout(() => {
                                window.location.reload();
                            }, 2000)
                        },
                        error: function (xhr, status, error) {
                            if (xhr.status === 422) {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text: xhr.responseJSON.errors.amount ||
                                            xhr.responseJSON.errors.description ||
                                            xhr.responseJSON.errors.insurance_year ||
                                            xhr.responseJSON.errors.insurance_premium ||
                                            xhr.responseJSON.errors.insurance_company
                                        ,
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

            $('.delete_category').on('click', function () {
                let thisElement = $(this);
                Swal.fire(
                    {
                        title: 'حذف تعهد',
                        type: 'warning',
                        text: 'آیا از حذف تعهد مطمین هستید؟',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'لغو',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }).then(function (result) {
                    console.log(result.isConfirmed)
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/life-insurances/obligations/${thisElement.data('id')}`,
                            type: 'DELETE',
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire(
                                    {
                                        type: 'success',
                                        text: 'تعهد با موفقیت حذف شد!',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                hideProgressButton();

                                setTimeout(() => {
                                    window.location.reload();
                                }, 2000)
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status === 404) {
                                    Swal.fire(
                                        {
                                            title: 'خطا',
                                            type: 'error',
                                            text: 'تعهد مورد نظر یافت نشد!',
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
                        });
                    }

                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/life-insurances/obligations.blade.php ENDPATH**/ ?>
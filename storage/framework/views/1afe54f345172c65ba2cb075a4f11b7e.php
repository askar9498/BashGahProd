<?php use Morilog\Jalali\Jalalian; ?>


<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('main'); ?>
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    لیست پرداخت های بیمه تکمیلی درمان</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">بیمه تکمیلی درمان</li>
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
                            <span class="card-label fw-bold fs-3 mb-1"> لیست پرداخت ها</span>
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
                                    <th class="p-3 min-w-100px ">نام دریافت کننده</th>
                                    <th class="p-3 min-w-100px ">نام فرد تحت تکفل</th>
                                    <th class="p-3 min-w-100px ">مبلغ</th>
                                    <th class="p-3 min-w-100px ">بیماری</th>
                                    <th class="p-3 min-w-100px ">نوع بیماری</th>
                                    <th class="p-3 min-w-100px ">تاریخ بیماری</th>
                                    <th class="p-3 min-w-100px ">تاریخ حواله</th>
                                    <th class="p-3 min-w-100px ">عملیات</th>
                                </tr>
                                </thead>
                                <tbody class="transaction_table" id="transaction_table">
                                <?php $__currentLoopData = $supplementary_insurance_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$supplementary_insurance_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-table">
                                            <?php echo e($supplementary_insurance_payments->firstItem()+$key); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($supplementary_insurance_payment->user->first_name); ?>

                                            - <?php echo e($supplementary_insurance_payment->user->last_name); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($supplementary_insurance_payment->dependent->first_name); ?>

                                            - <?php echo e($supplementary_insurance_payment->dependent->last_name); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e(number_format($supplementary_insurance_payment->amount)); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($supplementary_insurance_payment->illness->name); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($supplementary_insurance_payment->illnessType->name); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e(Jalalian::forge($supplementary_insurance_payment->illness_date)->format('Y/m/d')); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e(Jalalian::forge($supplementary_insurance_payment->remittance_date)->format('Y/m/d')); ?>

                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <a href="#" data-bs-toggle="tooltip" title="حذف پرداختی"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete_category"
                                                   data-id="<?php echo e($supplementary_insurance_payment->id); ?>">
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
                        <?php echo e($supplementary_insurance_payments->appends($_GET)->links('pagination::bootstrap-5')); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="updateCategoryModal" class="modal fade updateCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ویرایش پرداختی</h2>
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
                                <label class="fs-6 fw-semibold form-label mb-2">عنوان </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="عنوان پرداختی " name="categoryTitleEdit"/>
                                </div>
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
                    <h2>ایجاد پرداختی</h2>
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
                                <label class="fs-6 fw-semibold form-label mb-2">دریافت کننده </label>
                                <div class="position-relative">
                                    <select autocomplete="off" id="userId" name="userId" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب دریافت کننده"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب دریافت کننده</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?>

                                                - <?php echo e($user->last_name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">فرد تحت تکفل </label>
                                <div class="position-relative">
                                    <select autocomplete="off" id="dependentSelect" name="dependentId" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب فرد تحت تکفل"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">مرکز درمانی </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="مرکز درمانی" name="medicalCenter"/>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">مبلغ </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="number" class="form-control form-control-solid"
                                           placeholder="مبلغ" name="amount"/>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">دسته بندی</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="type" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب دسته بندی"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value="">دسته بندی</option>
                                        <?php $__currentLoopData = \App\Enums\SupplementaryInsurancePaymentType::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($type); ?>"><?php echo e(getSupplementaryInsurancePaymentTypeName($type)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">بیماری</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="illnessId" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب دریافت کننده"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب بیماری</option>
                                        <?php $__currentLoopData = $illnesses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $illness): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($illness->id); ?>"><?php echo e($illness->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">دسته بندی بیماری </label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="illnessTypeId" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب دریافت کننده"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب دسته بندی بیماری</option>
                                        <?php $__currentLoopData = $illness_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $illness_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($illness_type->id); ?>"><?php echo e($illness_type->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ بیماری </label>
                                <div class="position-relative">
                                    <input autocomplete="off" data-jdp class="form-control form-control-solid"
                                           name="illnessDate"/>
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ حواله </label>
                                <div class="position-relative">
                                    <input autocomplete="off" data-jdp class="form-control form-control-solid"
                                           name="remittanceDate"/>
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
                let title = $(this).attr('data-title');


                $('#updateCategoryModal').modal('show');
                $(".updateCategoryModal #updateCategoryButton").attr('data-id', id);

                $('input[name="categoryTitleEdit"]').val(title);

            });

            $('#updateCategoryButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);
                let title = $('input[name="categoryTitleEdit"]').val();


                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/categories/${thisElement.data('id')}`,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "title": title,
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'پرداختی با موفقیت تغییر کرد!',
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

            $('#createCategoryButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);

                let user_id = $('select[name="userId"]').val();
                let dependent_id = $('select[name="dependentId"]').val();
                let illnessType_id = $('select[name="illnessTypeId"]').val();
                let illness_id = $('select[name="illnessId"]').val();
                let amount = $('input[name="amount"]').val();
                let illness_date = $('input[name="illnessDate"]').val();
                let remittance_date = $('input[name="remittanceDate"]').val();
                let type = $('select[name="type"]').val();
                let medical_center = $('input[name="medicalCenter"]').val();

                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/supplementary-insurances/payments`,
                        type: 'POST',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "user_id": user_id,
                            "dependent_id": dependent_id,
                            "illness_type_id": illnessType_id,
                            "illness_id": illness_id,
                            "amount": amount,
                            "illness_date": illness_date,
                            "remittance_date": remittance_date,
                            "type": type,
                            "medical_center": medical_center
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'پرداختی با موفقیت اضافه شد!',
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
                                        text: xhr.responseJSON.errors.user_id || xhr.responseJSON.errors.dependent_id ||
                                            xhr.responseJSON.errors.illness_type_id || xhr.responseJSON.errors.illness_id ||
                                            xhr.responseJSON.errors.amount || xhr.responseJSON.errors.illness_date ||
                                            xhr.responseJSON.errors.remittance_date || xhr.responseJSON.errors.medical_center ||
                                            xhr.responseJSON.errors.type,
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
                        title: 'حذف پرداختی',
                        type: 'warning',
                        text: 'آیا از حذف پرداختی مطمین هستید؟',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'لغو',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }).then(function (result) {
                    console.log(result.isConfirmed)
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/supplementary-insurances/payments/${thisElement.data('id')}`,
                            type: 'DELETE',
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire(
                                    {
                                        type: 'success',
                                        text: 'پرداختی با موفقیت حذف شد!',
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
                                            text: 'پرداختی مورد نظر یافت نشد!',
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

            $('#userId').on('change', function () {
                $("#dependentSelect").find('option')
                    .remove()
                    .end();

                $.ajax({
                    url: `/admin/dependents/get-by-supervisor?supervisor_id=${$(this).val()}`,
                    type: 'GET',
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (response) {
                        response.dependents.forEach(e => {
                            $("#dependentSelect").append(`<option value="${e['id']}">${e['first_name']}-${e['last_name']}</option>`);
                        })
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            {
                                title: 'خطا',
                                type: 'error',
                                text: 'خطا در دریافت افراد تحت تکفل',
                                confirmButtonText: 'باشه'
                            });
                    }
                });

            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/supplementary-insurances/payments.blade.php ENDPATH**/ ?>
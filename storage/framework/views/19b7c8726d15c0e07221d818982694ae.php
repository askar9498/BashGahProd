<?php use Morilog\Jalali\Jalalian; ?>


<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('main'); ?>
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    کاربر ها</h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"> لیست کاربران</li>
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
                            <span class="card-label fw-bold fs-3 mb-1"> لیست کاربران</span>
                            <span class="text-muted mt-1 fw-semibold fs-7"></span>
                        </h3>
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                             data-bs-trigger="hover" data-bs-original-title="Click to add a user"
                             data-kt-initialized="1">
                            <a href="/admin/users"
                               class="btn btn-sm btn-outline btn-outline-primary me-3 ">
                                <i class="ki-duotone ki-arrows-circle fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </a>
                            <button type="button"
                                    class="btn btn-sm btn-outline btn-outline-primary me-3 "
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-filter-search fs-6 ">
                                    <span class="path1"></span>
                                </i>
                                فیلتر
                            </button>
                            <div class="shadow-lg menu menu-sub menu-sub-dropdown w-400px w-md-450px  "
                                 data-kt-menu="true"
                                 id="kt_menu_64b776349d4d2" style=""
                                 data-select2-id="select2-data-kt_menu_64b776349d4d2">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">فیلتر</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <form action="/admin/users" method="GET" class="px-7 py-5"
                                      data-select2-id="select2-data-124-c2dr">
                                    <div class="mb-10" data-select2-id="select2-data-123-kno3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">نام :</label>
                                                <input class="form-control "
                                                       name="filters[name][like]"/>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">شماره تلفن :</label>
                                                <input class="form-control " autocomplete="off"
                                                       name="filters[cellphone][like]"/>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-10" data-select2-id="select2-data-123-kno3">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">ایمیل :</label>
                                                <input class="form-control " autocomplete="off"
                                                       name="filters[email][like]"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">نقش :</label>
                                                <select autocomplete="off" name="filters[is_admin]" aria-label=""
                                                        data-control="select2"
                                                        data-placeholder="انتخاب یک نقش"
                                                        class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                                    <option value="">انتخاب نقش</option>
                                                    <option value="0">کاربر</option>
                                                    <option value="1">مدیر</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-10">
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-sm btn-primary"
                                                data-kt-menu-dismiss="true">تایید
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <a href="#" class="btn btn-sm btn-light btn-primary" data-bs-toggle="modal"
                               data-bs-target="#kt_modal_create_user">
                                <i class="ki-duotone ki-plus fs-2"></i>کاربر جدید</a>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                <tr class="border-0">
                                    <th class="p-3 min-w-70px">ردیف</th>
                                    <th class="p-3 min-w-100px ">نام و نام‌خانوادگی</th>
                                    <th class="p-3 min-w-100px ">شماره پرسنلی</th>
                                    <th class="p-3 min-w-100px ">شماره تلفن</th>
                                    <th class="p-3 min-w-100px ">ایمیل</th>
                                    <th class="p-3 min-w-100px ">نقش</th>
                                    <th class="p-3 min-w-100px ">عملیات</th>
                                </tr>
                                </thead>
                                <tbody class="transaction_table" id="transaction_table">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-table">
                                            <?php echo e($key+$users->firstItem()); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($user->first_name); ?> - <?php echo e($user->last_name); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($user->employee_number); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($user->cellphone); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($user->email); ?>

                                        </td>
                                        <td>
                                            <?php if($user->is_admin): ?>
                                                <span class="badge badge-light-info">
                                                    مدیر
                                                    (<?php echo e($user->roles->first()->name??'نامشخص'); ?>)</span>
                                            <?php else: ?>
                                                <span class="badge badge-light-warning"> کاربر</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" data-bs-toggle="tooltip" title="تغییر وضعیت (فعال/غیرفعال) "
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 toggle_status_user"
                                                   data-id="<?php echo e($user->id); ?> ">
                                                    <i class="ki-duotone ki-switch fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="ویرایش کاربر"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit_user"
                                                   data-id="<?php echo e($user->id); ?>"
                                                   data-first_name="<?php echo e($user->first_name); ?>"
                                                   data-last_name="<?php echo e($user->last_name); ?>"
                                                   data-cellphone="<?php echo e($user->cellphone); ?>"
                                                   data-email="<?php echo e($user->email); ?>"
                                                   data-isAdmin="<?php echo e($user->is_admin); ?>"
                                                   data-roleId="<?php echo e($user->roles->first()->id??0); ?>"
                                                   data-employee_number="<?php echo e($user->employee_number); ?>"
                                                   data-national_id="<?php echo e($user->national_id); ?>"
                                                   data-start_date="<?php echo e(Jalalian::forge($user->start_date)->format('Y/m/d')); ?>"
                                                   data-end_date="<?php echo e(Jalalian::forge($user->end_date)->format('Y/m/d')); ?>"
                                                   data-birth_date="<?php echo e(Jalalian::forge($user->birth_date)->format('Y/m/d')); ?>"
                                                   data-last_post="<?php echo e($user->last_post); ?>"
                                                   data-club_membership_date="<?php echo e(Jalalian::forge($user->club_membership_date)->format('Y/m/d')); ?>"
                                                   data-club_validity_date="<?php echo e(Jalalian::forge($user->club_validity_date)->format('Y/m/d')); ?>"
                                                   data-insurance_number="<?php echo e($user->insurance_number); ?>"
                                                   data-birth_certificate_number="<?php echo e($user->birth_certificate_number); ?>">

                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="حذف کاربر"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete_user"
                                                   data-id="<?php echo e($user->id); ?>">
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
                        <?php echo e($users->appends($_GET)->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="updateUserModal" class="modal fade updateUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ویرایش کاربر</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div id="initialUserInformationEdit" class="row gx-10 mb-5 ">
                            <h3>اطلاعات اولیه</h3>
                            <hr/>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نام </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="نام کاربر" name="userFirstNameEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نام خانوادگی</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="نام خانوادگی کاربر" name="userLastNameEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شماره تلفن </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           style="direction: ltr;text-align: left"
                                           placeholder="09---------" name="userCellphoneEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2"> ایمیل</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="email" class="form-control form-control-solid"
                                           placeholder="ایمیل " name="userEmailEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">کد پرسنلی</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="کد پرسنلی " name="userEmployeeNumberEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نقش</label>
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input h-20px w-20px border border-primary"
                                           type="checkbox" value="" autocomplete="off" name="isAdminUserEdit">
                                    <span class="form-check-label fw-semibold ">مدیر</span>
                                </label>
                            </div>
                            <div class="col-lg-6 mt-7 d-none" id="roleEditSection">
                                <label class="fs-6 fw-semibold form-label mb-2"></label>
                                <div class="position-relative">
                                    <div class="col-lg-12 fv-row">
                                        <select autocomplete="off" name="userRoleEdit" aria-label=""
                                                data-control="select2"
                                                data-placeholder="انتخاب نقش"
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">کلمه عبور</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="password" class="form-control form-control-solid"
                                           placeholder="کلمه عبور " name="userPasswordEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تکرار کلمه عبور</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="password" class="form-control form-control-solid"
                                           placeholder="تکرار کلمه عبور" name="userPasswordConfirmEdit"/>
                                </div>
                            </div>
                        </div>
                        <div id="completeUserInformationEdit" class="row gx-10 mb-5 d-none">
                            <h3>اطلاعات تکمیلی</h3>
                            <hr/>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">کد ملی </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="کد ملی" name="userNationalIdEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شماره شناسنامه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="شماره شناسنامه" name="userBirthCertificateNumberEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">آخرین سمت</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="آخرین سمت" name="userLastPostEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شماره بیمه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="password" class="form-control form-control-solid"
                                           placeholder="شماره بیمه" name="userInsuranceNumberEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ تولد </label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp name="userBirthDateEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7"></div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ شروع به کار</label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp name="userStartDateEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ بازنشستگی </label>
                                <input class="form-control" data-jdp autocomplete="off" name="userEndDateEdit"/>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ شروع عضویت در باشگاه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp
                                           name="userClubMembershipDateEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ اعتبار در باشگاه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp
                                           name="userClubValidityDateEdit"/>
                                </div>
                            </div>
                        </div>
                        <div id="initialUserInformationButtonsEdit" class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-danger me-3"
                                    data-bs-dismiss="modal">لغو
                            </button>
                            <button id="nextCompleteUserButtonEdit" type="submit" class="btn btn-primary">
                                <span class="indicator-label">اطلاعات تکمیلی</span>
                                <span class="indicator-progress">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                        <div id="completeUserInformationButtonsEdit" class=" text-center pt-15 d-none">
                            <button id="previousButtonEdit" class="btn btn-danger me-3">بازگشت
                            </button>
                            <button id="updateUserButton" type="submit" class="btn btn-primary">
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

    <div id="kt_modal_create_user" class="modal fade updateUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ایجاد کاربر</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div id="initialUserInformation" class="row gx-10 mb-5 ">
                            <h3>اطلاعات اولیه</h3>
                            <hr/>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نام </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="نام کاربر" name="userFirstName"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نام خانوادگی</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="نام خانوادگی کاربر" name="userLastName"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شماره تلفن </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           style="direction: ltr;text-align: left"
                                           placeholder="09---------" name="userCellphone"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2"> ایمیل</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="email" class="form-control form-control-solid"
                                           placeholder="ایمیل " name="userEmail"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">کد پرسنلی</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="کد پرسنلی " name="userEmployeeNumber"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نقش</label>
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input h-20px w-20px border border-primary"
                                           type="checkbox" value="" autocomplete="off" name="isAdminUser">
                                    <span class="form-check-label fw-semibold ">مدیر</span>
                                </label>
                            </div>
                            <div class="col-lg-6 mt-7 d-none" id="roleCreateSection">
                                <label class="fs-6 fw-semibold form-label mb-2"></label>
                                <div class="position-relative">
                                    <div class="col-lg-12 fv-row">
                                        <select autocomplete="off" name="userRole" aria-label="" data-control="select2"
                                                data-placeholder="انتخاب نقش"
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">کلمه عبور</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="password" class="form-control form-control-solid"
                                           placeholder="کلمه عبور " name="userPassword"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تکرار کلمه عبور</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="password" class="form-control form-control-solid"
                                           placeholder="تکرار کلمه عبور" name="userPasswordConfirm"/>
                                </div>
                            </div>
                        </div>
                        <div id="completeUserInformation" class="row gx-10 mb-5 d-none">
                            <h3>اطلاعات تکمیلی</h3>
                            <hr/>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">کد ملی </label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="کد ملی" name="userNationalId"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شماره شناسنامه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="شماره شناسنامه" name="userBirthCertificateNumber"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">آخرین سمت</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="آخرین سمت" name="userLastPost"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شماره بیمه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="password" class="form-control form-control-solid"
                                           placeholder="شماره بیمه" name="userInsuranceNumber"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ تولد </label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp name="userBirthDate"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7"></div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ شروع به کار</label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp name="userStartDate"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ بازنشستگی </label>
                                <input class="form-control" data-jdp autocomplete="off" name="userEndDate"/>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ شروع عضویت در باشگاه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp
                                           name="userClubMembershipDate"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ اعتبار در باشگاه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp
                                           name="userClubValidityDate"/>
                                </div>
                            </div>
                        </div>

                        <div id="initialUserInformationButtons" class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-danger me-3"
                                    data-bs-dismiss="modal">لغو
                            </button>
                            <button id="nextCompleteUserButton" type="submit" class="btn btn-primary">
                                <span class="indicator-label">اطلاعات تکمیلی</span>
                                <span class="indicator-progress">لطفا صبر کنید...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>

                        <div id="completeUserInformationButtons" class=" text-center pt-15 d-none">
                            <button id="previousButton" class="btn btn-danger me-3">بازگشت
                            </button>
                            <button id="createUserButton" type="submit" class="btn btn-primary">
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
            $('.toggle_status_user').on('click', function () {

                $.ajax({
                        url: `/admin/users/${$(this).attr('data-id')}/toggle_status`,
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
                            }, 2000)
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

            $('.edit_user').on('click', function () {
                let id = $(this).attr('data-id');
                let first_name = $(this).attr('data-first_name');
                let last_name = $(this).attr('data-last_name');
                let cellphone = $(this).attr('data-cellphone');
                let email = $(this).attr('data-email');
                let role_id = $(this).attr('data-roleId');
                let is_admin = $(this).attr('data-isAdmin');

                let employee_number = $(this).attr('data-employee_number');
                let national_id = $(this).attr('data-national_id');
                let start_date = $(this).attr('data-start_date');
                let end_date = $(this).attr('data-end_date');
                let birth_date = $(this).attr('data-birth_date');
                let last_post = $(this).attr('data-last_post');
                let club_membership_date = $(this).attr('data-club_membership_date');
                let club_validity_date = $(this).attr('data-club_validity_date');
                let insurance_number = $(this).attr('data-insurance_number');
                let birth_certificate_number = $(this).attr('data-birth_certificate_number');

                $('#updateUserModal').modal('show');
                $(".updateUserModal #updateUserButton").attr('data-id', id);

                $('input[name="userFirstNameEdit"]').val(first_name);
                $('input[name="userLastNameEdit"]').val(last_name);
                $('input[name="userCellphoneEdit"]').val(cellphone);
                $('input[name="userEmailEdit"]').val(email);
                $('input[name="userEmployeeNumberEdit"]').val(employee_number);
                $('input[name="userNationalIdEdit"]').val(national_id);
                $('input[name="userStartDateEdit"]').val(start_date);
                $('input[name="userEndDateEdit"]').val(end_date);
                $('input[name="userBirthDateEdit"]').val(birth_date);
                $('input[name="userLastPostEdit"]').val(last_post);
                $('input[name="userClubMembershipDateEdit"]').val(club_membership_date);
                $('input[name="userClubValidityDateEdit"]').val(club_validity_date);
                $('input[name="userInsuranceNumberEdit"]').val(insurance_number);
                $('input[name="userBirthCertificateNumberEdit"]').val(birth_certificate_number);

                if (is_admin === '1') {
                    $('input[name="isAdminUserEdit"]').attr('checked', 'checked');
                    $('select[name="userRoleEdit"]').val(role_id).change();
                    $('#roleEditSection').removeClass('d-none');
                } else {
                    $('input[name="isAdminUserEdit"]').removeAttr('checked');
                    $('select[name="userRoleEdit"]').val('').change();
                    $('#roleEditSection').addClass('d-none');
                }
            });

            $('#updateUserButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);
                let first_name = $('input[name="userFirstNameEdit"]').val();
                let last_name = $('input[name="userLastNameEdit"]').val();
                let cellphone = $('input[name="userCellphoneEdit"]').val();
                let email = $('input[name="userEmailEdit"]').val();
                let role = $('select[name="userRoleEdit"]').val();
                let is_admin = ($('input[name="isAdminUserEdit"]').is(':checked') ? 1 : 0);
                let password = $('input[name="userPasswordEdit"]').val();
                let confirm_password = $('input[name="userPasswordConfirmEdit"]').val();

                let employee_number = $('input[name="userEmployeeNumberEdit"]').val();
                let national_id = $('input[name="userNationalIdEdit"]').val();
                let start_date = $('input[name="userStartDateEdit"]').val();
                let end_date = $('input[name="userEndDateEdit"]').val();
                let birth_date = $('input[name="userBirthDateEdit"]').val();
                let last_post = $('input[name="userLastPostEdit"]').val();
                let club_membership_date = $('input[name="userClubMembershipDateEdit"]').val();
                let club_validity_date = $('input[name="userClubValidityDateEdit"]').val();
                let insurance_number = $('input[name="userInsuranceNumberEdit"]').val();
                let birth_certificate_number = $('input[name="userBirthCertificateNumberEdit"]').val();
                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/users/${thisElement.data('id')}`,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "first_name": first_name,
                            "last_name": last_name,
                            "cellphone": cellphone,
                            "email": email,
                            "is_admin": is_admin,
                            "role_id": role,
                            "password": password,
                            "password_confirmation": confirm_password,
                            "employee_number": employee_number,
                            "national_id": national_id,
                            "start_date": start_date,
                            "end_date": end_date,
                            "birth_date": birth_date,
                            "last_post": last_post,
                            "club_membership_date": club_membership_date,
                            "club_validity_date": club_validity_date,
                            "insurance_number": insurance_number,
                            "birth_certificate_number": birth_certificate_number
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'کاربر با موفقیت تغییر کرد!',
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
                                        text: xhr.responseJSON.errors.name || xhr.responseJSON.errors.cellphone ||
                                            xhr.responseJSON.errors.email || xhr.responseJSON.errors.is_admin
                                            || xhr.responseJSON.errors.role_id ||
                                            xhr.responseJSON.errors.password,
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

            $('#createUserButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);

                let first_name = $('input[name="userFirstName"]').val();
                let last_name = $('input[name="userLastName"]').val();
                let cellphone = $('input[name="userCellphone"]').val();
                let email = $('input[name="userEmail"]').val();
                let role = $('select[name="userRole"]').val();
                let is_admin = ($('input[name="isAdminUser"]').is(':checked') ? 1 : 0);
                let password = $('input[name="userPassword"]').val();
                let confirm_password = $('input[name="userPasswordConfirm"]').val();

                let employee_number = $('input[name="userEmployeeNumber"]').val();
                let national_id = $('input[name="userNationalId"]').val();
                let start_date = $('input[name="userStartDate"]').val();
                let end_date = $('input[name="userEndDate"]').val();
                let birth_date = $('input[name="userBirthDate"]').val();
                let last_post = $('input[name="userLastPost"]').val();
                let club_membership_date = $('input[name="userClubMembershipDate"]').val();
                let club_validity_date = $('input[name="userClubValidityDate"]').val();
                let insurance_number = $('input[name="userInsuranceNumber"]').val();
                let birth_certificate_number = $('input[name="userBirthCertificateNumber"]').val();

                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/users`,
                        type: 'POST',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "first_name": first_name,
                            "last_name": last_name,
                            "cellphone": cellphone,
                            "email": email,
                            "is_admin": is_admin,
                            "role_id": role,
                            "password": password,
                            "password_confirmation": confirm_password,
                            "employee_number": employee_number,
                            "national_id": national_id,
                            "start_date": start_date,
                            "end_date": end_date,
                            "birth_date": birth_date,
                            "last_post": last_post,
                            "club_membership_date": club_membership_date,
                            "club_validity_date": club_validity_date,
                            "insurance_number": insurance_number,
                            "birth_certificate_number": birth_certificate_number
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'کاربر با موفقیت اضافه شد!',
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
                                        text: xhr.responseJSON.errors.first_name || xhr.responseJSON.errors.last_name ||
                                            xhr.responseJSON.errors.cellphone ||
                                            xhr.responseJSON.errors.email || xhr.responseJSON.errors.is_admin ||
                                            xhr.responseJSON.errors.role_id || xhr.responseJSON.errors.personal_id ||
                                            xhr.responseJSON.errors.password || xhr.responseJSON.errors.employee_number ||
                                            xhr.responseJSON.errors.national_id || xhr.responseJSON.errors.start_date ||
                                            xhr.responseJSON.errors.end_date || xhr.responseJSON.errors.birth_date ||
                                            xhr.responseJSON.errors.last_post || xhr.responseJSON.errors.club_membership_date ||
                                            xhr.responseJSON.errors.club_validity_date || xhr.responseJSON.errors.insurance_number ||
                                            xhr.responseJSON.errors.birth_certificate_number,
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

            $('.delete_user').on('click', function () {
                let thisElement = $(this);
                Swal.fire(
                    {
                        title: 'حذف کاربر',
                        type: 'warning',
                        text: 'آیا از حذف کاربر مطمین هستید؟',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'لغو',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }).then(function (result) {
                    console.log(result.isConfirmed)
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/users/${thisElement.data('id')}`,
                            type: 'DELETE',
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire(
                                    {
                                        type: 'success',
                                        text: 'کاربر با موفقیت حذف شد!',
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
                                            text: 'کاربر مورد نظر یافت نشد!',
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

            $('input[name="isAdminUserEdit"]').on('change', function () {
                if (($(this).is(':checked'))) {
                    $('#roleEditSection').removeClass('d-none');
                } else {
                    $('#roleEditSection').addClass('d-none');
                }
            });

            $('input[name="isAdminUser"]').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#roleCreateSection').removeClass('d-none');
                } else {
                    $('#roleCreateSection').addClass('d-none');
                }
            });

            $("#nextCompleteUserButton").on('click', function (e) {
                e.preventDefault();
                $("#initialUserInformation").addClass('d-none');
                $("#completeUserInformation").removeClass('d-none');
                $("#initialUserInformationButtons").addClass('d-none');
                $("#completeUserInformationButtons").removeClass('d-none');
            });

            $("#previousButton").on('click', function (e) {
                e.preventDefault();
                $("#initialUserInformation").removeClass('d-none');
                $("#completeUserInformation").addClass('d-none');
                $("#initialUserInformationButtons").removeClass('d-none');
                $("#completeUserInformationButtons").addClass('d-none');
            });

            $("#nextCompleteUserButtonEdit").on('click', function (e) {
                e.preventDefault();
                $("#initialUserInformationEdit").addClass('d-none');
                $("#completeUserInformationEdit").removeClass('d-none');
                $("#initialUserInformationButtonsEdit").addClass('d-none');
                $("#completeUserInformationButtonsEdit").removeClass('d-none');
            });

            $("#previousButtonEdit").on('click', function (e) {
                e.preventDefault();
                $("#initialUserInformationEdit").removeClass('d-none');
                $("#completeUserInformationEdit").addClass('d-none');
                $("#initialUserInformationButtonsEdit").removeClass('d-none');
                $("#completeUserInformationButtonsEdit").addClass('d-none');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/users.blade.php ENDPATH**/ ?>
<?php use Morilog\Jalali\Jalalian; ?>


<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('main'); ?>
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    افراد تحت تکفل
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="#" class="text-muted text-hover-primary">خانه</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">کاربران</li>
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
                            <span class="card-label fw-bold fs-3 mb-1"> لیست افراد تحت تکفل</span>
                            <span class="text-muted mt-1 fw-semibold fs-7"></span>
                        </h3>
                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                             data-bs-trigger="hover" data-bs-original-title="Click to add a user"
                             data-kt-initialized="1">
                            <a href="/admin/dependents"
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
                                <form action="/admin/dependents" method="GET" class="px-7 py-5"
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
                                    <div class="mb-10">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">نسبت :</label>
                                                <select autocomplete="off" name="filters[is_admin]" aria-label=""
                                                        data-control="select2"
                                                        data-placeholder="انتخاب نسبت"
                                                        class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                                    <option value="">انتخاب نسبت</option>
                                                    <?php $__currentLoopData = \App\Enums\RelationshipTypes::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($relation); ?>"><?php echo e(getRelationshipName($relation)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">جنسیت :</label>
                                                <select autocomplete="off" name="filters[is_admin]" aria-label=""
                                                        data-control="select2"
                                                        data-placeholder="انتخاب جنسیت"
                                                        class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                                    <option value="">انتخاب جنسیت</option>
                                                    <?php $__currentLoopData = \App\Enums\GenderTypes::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($gender); ?>"><?php echo e(getGenderName($gender)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <i class="ki-duotone ki-plus fs-2"></i>فرد تحت تکفل جدید</a>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <thead>
                                <tr class="border-0">
                                    <th class="p-3 min-w-70px">ردیف</th>
                                    <th class="p-3 min-w-100px ">نام و نام‌خانوادگی</th>
                                    <th class="p-3 min-w-100px ">کد ملی</th>
                                    <th class="p-3 min-w-100px ">شماره تلفن</th>
                                    <th class="p-3 min-w-100px ">سرپرست</th>
                                    <th class="p-3 min-w-100px ">عملیات</th>
                                </tr>
                                </thead>
                                <tbody class="transaction_table" id="transaction_table">
                                <?php $__currentLoopData = $dependents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $dependent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-table">
                                            <?php echo e($key+$dependents->firstItem()); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($dependent->first_name); ?> - <?php echo e($dependent->last_name); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($dependent->national_id); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($dependent->cellphone); ?>

                                        </td>
                                        <td class="text-table">
                                            <?php echo e($dependent->supervisor->first_name); ?>

                                            -<?php echo e($dependent->supervisor->last_name); ?>

                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center flex-shrink-0">
                                                <a href="#" data-bs-toggle="tooltip" title="ویرایش کاربر"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit_user"
                                                   data-id="<?php echo e($dependent->id); ?>"
                                                   data-first_name="<?php echo e($dependent->first_name); ?>"
                                                   data-supervisor="<?php echo e($dependent->supervisor_id); ?>"
                                                   data-last_name="<?php echo e($dependent->last_name); ?>"
                                                   data-cellphone="<?php echo e($dependent->cellphone); ?>"
                                                   data-national_id="<?php echo e($dependent->national_id); ?>"
                                                   data-birth_date="<?php echo e(Jalalian::forge($dependent->birth_date)->format('Y/m/d')); ?>"
                                                   data-last_post="<?php echo e($dependent->last_post); ?>"
                                                   data-insurance_code="<?php echo e($dependent->insured_code); ?>"
                                                   data-birth_certificate_number="<?php echo e($dependent->birth_certificate_number); ?>"
                                                   data-is_supplementary_insuranced="<?php echo e($dependent->is_supplementary_insuranced); ?>"
                                                   data-relationship="<?php echo e($dependent->relationship); ?>"
                                                   data-gender="<?php echo e($dependent->gender); ?>"
                                                   data-father_name="<?php echo e($dependent->father_name); ?>"
                                                   data-birth_city_id="<?php echo e($dependent->birth_city_id); ?>"
                                                >

                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="حذف کاربر"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete_user"
                                                   data-id="<?php echo e($dependent->id); ?>">
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
                        <?php echo e($dependents->appends($_GET)->links('pagination::bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="updateUserModal" class="modal fade updateUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>ویرایش فرد تحت تکفل</h2>
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
                                <label class="fs-6 fw-semibold form-label mb-2">نام پدر</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="نام پدر" name="userFatherNameEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">سرپرست </label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userSupervisorEdit" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب سرپرست"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب سرپرست</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?>

                                                - <?php echo e($user->last_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نسبت</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userRelationshipEdit" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب نسبت"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب نسبت</option>
                                        <?php $__currentLoopData = \App\Enums\RelationshipTypes::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($relation); ?>"><?php echo e(getRelationshipName($relation)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">جنسیت</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userGenderEdit" aria-label=""
                                            data-control="select2" data-placeholder="انتخاب جنسیت"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب جنسیت</option>
                                        <?php $__currentLoopData = \App\Enums\GenderTypes::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($gender); ?>"><?php echo e(getGenderName($gender)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
                                <label class="fs-6 fw-semibold form-label mb-2">شماره بیمه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="شماره بیمه" name="userInsuranceNumberEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ تولد </label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp name="userBirthDateEdit"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">استان</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="" aria-label="" id="ProvinceIdEdit"
                                            data-control="select2" data-placeholder="انتخاب استان"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب استان</option>
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شهر</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userBirthCityIdEdit" aria-label=""
                                            data-control="select2" data-placeholder="انتخاب شهر"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب شهر</option>
                                    </select>
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
                    <h2>ایجاد فرد تحت تکفل</h2>
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
                                           placeholder="نام خانوادگی " name="userLastName"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نام پدر</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="نام پدر " name="userFatherName"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">سرپرست </label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userSupervisor" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب سرپرست"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب سرپرست</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->first_name); ?>

                                                - <?php echo e($user->last_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">نسبت</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userRelationship" aria-label=""
                                            data-control="select2"
                                            data-placeholder="انتخاب نسبت"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب نسبت</option>
                                        <?php $__currentLoopData = \App\Enums\RelationshipTypes::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($relation); ?>"><?php echo e(getRelationshipName($relation)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">جنسیت</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userGender" aria-label=""
                                            data-control="select2" data-placeholder="انتخاب جنسیت"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب جنسیت</option>
                                        <?php $__currentLoopData = \App\Enums\GenderTypes::values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($gender); ?>"><?php echo e(getGenderName($gender)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
                                <label class="fs-6 fw-semibold form-label mb-2">شماره بیمه</label>
                                <div class="position-relative">
                                    <input autocomplete="off" type="text" class="form-control form-control-solid"
                                           placeholder="شماره بیمه" name="userInsuranceNumber"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">تاریخ تولد </label>
                                <div class="position-relative">
                                    <input autocomplete="off" class="form-control" data-jdp name="userBirthDate"/>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">استان</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="" aria-label="" id="ProvinceId"
                                            data-control="select2" data-placeholder="انتخاب استان"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب استان</option>
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-7">
                                <label class="fs-6 fw-semibold form-label mb-2">شهر</label>
                                <div class="position-relative">
                                    <select autocomplete="off" name="userBirthCityId" aria-label=""
                                            data-control="select2" data-placeholder="انتخاب شهر"
                                            class="btn btn-outline btn-outline form-select form-select-solid form-select-lg fw-semibold">
                                        <option selected value=""> انتخاب شهر</option>
                                    </select>
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
            $('.edit_user').on('click', function () {
                let id = $(this).attr('data-id');
                let relationship = $(this).attr('data-relationship');
                let gender = $(this).attr('data-gender');
                let father_name = $(this).attr('data-father_name');
                let birth_city_id = $(this).attr('data-birth_city_id');
                let first_name = $(this).attr('data-first_name');
                let birth_date = $(this).attr('data-birth_date');
                let last_name = $(this).attr('data-last_name');
                let cellphone = $(this).attr('data-cellphone');
                let supervisor = $(this).attr('data-supervisor');
                let national_id = $(this).attr('data-national_id');
                let insurance_code = $(this).attr('data-insurance_code');
                let birth_certificate_number = $(this).attr('data-birth_certificate_number');
                $('#updateUserModal').modal('show');
                $(".updateUserModal #updateUserButton").attr('data-id', id);
                $('input[name="userFirstNameEdit"]').val(first_name);
                $('input[name="userLastNameEdit"]').val(last_name);
                $('select[name="userSupervisorEdit"]').val(supervisor).change();
                $('input[name="userCellphoneEdit"]').val(cellphone);
                $('input[name="userNationalIdEdit"]').val(national_id);
                $('input[name="userInsuranceNumberEdit"]').val(insurance_code);
                $('input[name="userBirthCertificateNumberEdit"]').val(birth_certificate_number);
                $('select[name="userRelationshipEdit"]').val(relationship).change();
                $('select[name="userGenderEdit"]').val(gender).change();
                $('input[name="userFatherNameEdit"]').val(father_name);
                $('select[name="userBirthCityIdEdit"]').val(birth_city_id).change();
                $('input[name="userBirthDateEdit"]').val(birth_date);
            });

            $('#updateUserButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);
                let first_name = $('input[name="userFirstNameEdit"]').val();
                let last_name = $('input[name="userLastNameEdit"]').val();
                let cellphone = $('input[name="userCellphoneEdit"]').val();
                let supervisor = $('select[name="userSupervisorEdit"]').val();
                let national_id = $('input[name="userNationalIdEdit"]').val();
                let birth_date = $('input[name="userBirthDateEdit"]').val();
                let insurance_number = $('input[name="userInsuranceNumberEdit"]').val();
                let birth_certificate_number = $('input[name="userBirthCertificateNumberEdit"]').val();
                let relationship = $('select[name="userRelationshipEdit"]').val();
                let gender = $('select[name="userGenderEdit"]').val();
                let birth_city_id = $('select[name="userBirthCityIdEdit"]').val();
                let father_name = $('input[name="userFatherNameEdit"]').val();

                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/dependents/${thisElement.data('id')}`,
                        type: 'PUT',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "first_name": first_name,
                            "last_name": last_name,
                            "cellphone": cellphone,
                            "national_id": national_id,
                            "birth_date": birth_date,
                            "insured_code": insurance_number,
                            "supervisor_id": supervisor,
                            "birth_certificate_number": birth_certificate_number,
                            "relationship": relationship,
                            "gender": gender,
                            "birth_city_id": birth_city_id,
                            "father_name": father_name
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'فرد تحت تکفل با موفقیت تغییر کرد!',
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
                                        text: xhr.responseJSON.errors.first_name ||
                                            xhr.responseJSON.errors.national_id||xhr.responseJSON.errors.cellphone||
                                            xhr.responseJSON.errors.birth_date||
                                            xhr.responseJSON.errors.relationship||xhr.responseJSON.errors.birth_certificate_number||
                                            xhr.responseJSON.errors.insured_code||xhr.responseJSON.errors.gender||
                                            xhr.responseJSON.errors.supervisor_id||xhr.responseJSON.errors.birth_city_id||
                                            xhr.responseJSON.errors.father_name
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

            $('#createUserButton').on('click', function (e) {
                e.preventDefault();
                let thisElement = $(this);

                let first_name = $('input[name="userFirstName"]').val();
                let last_name = $('input[name="userLastName"]').val();
                let cellphone = $('input[name="userCellphone"]').val();
                let supervisor = $('select[name="userSupervisor"]').val();
                let national_id = $('input[name="userNationalId"]').val();
                let birth_date = $('input[name="userBirthDate"]').val();
                let insurance_number = $('input[name="userInsuranceNumber"]').val();
                let birth_certificate_number = $('input[name="userBirthCertificateNumber"]').val();
                let relationship = $('select[name="userRelationship"]').val();
                let gender = $('select[name="userGender"]').val();
                let birth_city_id = $('select[name="userBirthCityId"]').val();
                let father_name = $('input[name="userFatherName"]').val();

                showProgressButton(thisElement);
                $.ajax({
                        url: `/admin/dependents`,
                        type: 'POST',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "first_name": first_name,
                            "last_name": last_name,
                            "cellphone": cellphone,
                            "national_id": national_id,
                            "birth_date": birth_date,
                            "insured_code": insurance_number,
                            "supervisor_id": supervisor,
                            "birth_certificate_number": birth_certificate_number,
                            "relationship": relationship,
                            "gender": gender,
                            "birth_city_id": birth_city_id,
                            "father_name": father_name
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'فرد تخت تکفل با موفقیت اضافه شد!',
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
                                        text:xhr.responseJSON.errors.first_name ||
                                            xhr.responseJSON.errors.national_id||xhr.responseJSON.errors.cellphone||
                                            xhr.responseJSON.errors.birth_date||
                                            xhr.responseJSON.errors.relationship||xhr.responseJSON.errors.birth_certificate_number||
                                            xhr.responseJSON.errors.insured_code||xhr.responseJSON.errors.gender||
                                            xhr.responseJSON.errors.supervisor_id||xhr.responseJSON.errors.birth_city_id||
                                            xhr.responseJSON.errors.father_name,
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
                        title: 'حذف فرد تحت تکفل',
                        type: 'warning',
                        text: 'آیا از حذف فرد تحت تکفل مطمین هستید؟',
                        confirmButtonText: 'تایید',
                        cancelButtonText: 'لغو',
                        showCancelButton: true,
                        closeOnConfirm: false,
                        closeOnCancel: true
                    }).then(function (result) {
                    console.log(result.isConfirmed)
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/dependents/${thisElement.data('id')}`,
                            type: 'DELETE',
                            dataType: 'JSON',
                            headers: {
                                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (response) {
                                Swal.fire(
                                    {
                                        type: 'success',
                                        text: 'با موفقیت حذف شد!',
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
                                            text: 'فرد مورد نظر یافت نشد!',
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

            $("#ProvinceId").on('change',function () {
                let province_id = $(this).val();
                $('select[name="userBirthCityId"]').find('option')
                    .remove()
                    .end();
                $.ajax({
                    url: `/admin/provinces/${province_id}`,
                    type: 'get',
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data) {
                        let userBirthCity = $('select[name="userBirthCityId"]');
                        data.cities.forEach(e => {
                            userBirthCity.append(`<option value="${e['id']}">${e['name']}</option>`);
                        })
                    },
                    error: function (xhr) {
                        Swal.fire(
                            {
                                title: 'خطا',
                                type: 'error',
                                text: 'خطا در شهر ها',
                                confirmButtonText: 'باشه'
                            });
                    }
                })
            });

            $("#ProvinceIdEdit").on('change',function () {
                let province_id = $(this).val();
                $('select[name="userBirthCityIdEdit"]').find('option')
                    .remove()
                    .end();

                $.ajax({
                    url: `/admin/provinces/${province_id}`,
                    type: 'get',
                    dataType: 'JSON',
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                    },
                    success: function (data) {
                        let userBirthCity = $('select[name="userBirthCityIdEdit"]');
                        data.cities.forEach(e => {
                            userBirthCity.append(`<option value="${e['id']}">${e['name']}</option>`);
                        })
                    },
                    error: function (xhr) {
                        Swal.fire(
                            {
                                title: 'خطا',
                                type: 'error',
                                text: 'خطا در شهر ها',
                                confirmButtonText: 'باشه'
                            });
                    }
                })
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('panels.admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/admin/dependents/index.blade.php ENDPATH**/ ?>
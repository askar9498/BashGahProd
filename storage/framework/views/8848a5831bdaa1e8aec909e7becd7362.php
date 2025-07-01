<?php
$current_url_paths = explode('/', url()->current());
?>
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6 w-100" id="kt_app_sidebar_logo">
        <a href="#" class="p-5">
            <img alt="Logo" src="<?php echo e(asset('assets/media/logo-dark.png')); ?>"
                 class="w-100 app-sidebar-logo-default"/>
            <img alt="Logo" src="<?php echo e(asset('assets/media/logo-dark.png')); ?>"
                 class="w-50 app-sidebar-logo-minimize"/>
        </a>
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                 data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                 data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                     data-kt-menu="true" data-kt-menu-expand="false">
                    <?php if(Auth::user()->can('dashboard.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
								<span><i class="fa-solid fa-gauge fa-fw fs-3"></i></span>
							</span>
                            <span class="menu-title">داشبورد</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('dashboard',$current_url_paths)?'show':''); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.index')): ?>
                                    <div class="menu-item">
                                        <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='dashboard'?'active':''); ?>"
                                           href="/admin/dashboard">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                            <span class="menu-title">خانه</span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('user.index') || Auth::user()->can('role.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                            <div class="menu-link">
                                <span class="menu-icon">
								<i class="fa-solid fa-users fs-3"></i>
							</span>
                                <span class="menu-title">کاربران</span>
                                <span class="menu-arrow"></span>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('users',$current_url_paths)||in_array('roles',$current_url_paths)?'show':''); ?>">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.index')): ?>
                                    <div class="menu-item">
                                        <a class="menu-link <?php echo e(in_array('users',$current_url_paths)?'active':''); ?>"
                                           href="/admin/users">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                            <span class="menu-title">لیست کاربران</span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.index')): ?>
                                    <div class="menu-item">
                                        <a class="menu-link <?php echo e(in_array('roles',$current_url_paths)?'active':''); ?>"
                                           href="/admin/roles">
                                         <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                            <span class="menu-title">لیست نقش ها</span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dependent.index')): ?>
                                    <div class="menu-item">
                                        <a class="menu-link <?php echo e(in_array('dependents',$current_url_paths)?'active':''); ?>"
                                           href="/admin/dependents">
                                         <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                            <span class="menu-title">افراد تحت تکفل</span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('news.index') || Auth::user()->can('category.index')): ?>
                            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                                <div class="menu-link">
                            <span class="menu-icon">
								<i class="fa-solid fa-blog fs-3"></i>
							</span>
                                    <span class="menu-title">اطلاعیه و اخبار</span>
                                    <span class="menu-arrow"></span>
                                </div>
                                <div class="menu-sub menu-sub-accordion <?php echo e(in_array('news',$current_url_paths)||in_array('categories',$current_url_paths)?'show':''); ?>">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('news.index')): ?>
                                        <div class="menu-item">
                                            <a class="menu-link <?php echo e(in_array('news',$current_url_paths)?'active':''); ?>"
                                               href="/admin/news">
                                   <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                                <span class="menu-title">لیست اطلاعیه ها</span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.index')): ?>
                                        <div class="menu-item">
                                            <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='categories'?'active':''); ?>"
                                               href="/admin/categories">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                                <span class="menu-title">لیست دسته بندی ها</span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php if(Auth::user()->can('welfare-card.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
								<i class="fa-regular fa-credit-card fs-3"></i>
							</span>
                            <span class="menu-title">کارت رفاهی</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('welfare-card',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='welfare-card'?'active':''); ?>"
                                       href="/admin/welfare-cards/payments">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">پرداخت ها</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('life-insurance.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-house-crack fs-3"></i>
							</span>
                            <span class="menu-title">بیمه عمر و سرمایه گذاری</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('life-insurance',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='life-insurance'?'active':''); ?>"
                                       href="/admin/life-insurances/obligations">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">لیست تعهدات</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('life-insurance',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='life-insurance'?'active':''); ?>"
                                       href="/admin/life-insurances/payments">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">پرداخت ها</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('life-insurance',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='life-insurance'?'active':''); ?>"
                                       href="/admin/life-insurances/validities">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">اعتبار</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('life-accident-insurance.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
							<i class="fa-solid fa-car-burst fs-3"></i>
							</span>
                            <span class="menu-title">بیمه عمر و حوادث</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('life-accident-insurances',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='life-accident-insurance'?'active':''); ?>"
                                       href="/admin/life-accident-insurances/obligations">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">لیست تعهدات</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('life-accident-insurances',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='life-accident-insurance'?'active':''); ?>"
                                       href="/admin/life-accident-insurances/payments">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">پرداخت ها</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('life-accident-insurances',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='life-accident-insurance'?'active':''); ?>"
                                       href="/admin/life-accident-insurances/validities">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">اعتبار</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('supplementary-insurance.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-hand-holding-heart fs-3"></i>
							</span>
                            <span class="menu-title">بیمه تکمیلی درمان</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('supplementary-insurances',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='supplementary-insurances'?'active':''); ?>"
                                       href="/admin/supplementary-insurances/obligations">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">لیست تعهدات</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('supplementary-insurances',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='supplementary-insurances'?'active':''); ?>"
                                       href="/admin/supplementary-insurances/payments">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">پرداخت ها</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('supplementary-insurances',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='supplementary-insurances'?'active':''); ?>"
                                       href="/admin/supplementary-insurances/validities">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">اعتبار</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('advisory-services.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-brain fs-3"></i>
							</span>
                            <span class="menu-title">خدمات مشاوره ای</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('advisory-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='contracts'?'active':''); ?>"
                                       href="/admin/advisory-services/contracts">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">قرارداد ها</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('advisory-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='subjects'?'active':''); ?>"
                                       href="/admin/advisory-services/subjects">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">موضوعات</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('advisory-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='requests'?'active':''); ?>"
                                       href="/admin/advisory-services/requests">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">درخواست ها</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('educational-services.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon"><i class="fa-solid fa-user-graduate fs-3"></i>
							</span>
                            <span class="menu-title">خدمات آموزشی</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('educational-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='courses'?'active':''); ?>"
                                       href="/admin/educational-services/courses">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title"> دوره ها</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('educational-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='subjects'?'active':''); ?>"
                                       href="/admin/educational-services/subjects">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title"> موضوعات</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('educational-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='requests'?'active':''); ?>"
                                       href="/admin/educational-services/requests">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">درخواست ها</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('travel-facilities.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon"><i class="fa-solid fa-plane fs-3"></i>
							</span>
                            <span class="menu-title">تسهیلات سفر</span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('travel-facilities',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='uses'?'active':''); ?>"
                                       href="/admin/travel-facilities/uses">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">گزارش های استفاده از تسهیلات </span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('travel-facilities',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='requests'?'active':''); ?>"
                                       href="/admin/travel-facilities/requests">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">درخواست ها</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(Auth::user()->can('psychological-services.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
                        <span class="menu-link">
							<span class="menu-icon">
								<i class="fa-solid fa-people-group fs-3"></i>
							</span>
                            <span class="menu-title">خدمات روانشناختی </span>
                            <span class="menu-arrow"></span>
						</span>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('psychological-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='uses'?'active':''); ?>"
                                       href="/admin/psychological-services/uses">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">گزارش های استفاده از خدمات</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('psychological-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='centers'?'active':''); ?>"
                                       href="/admin/psychological-services/centers">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">لیست مراکز روانشناختی</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-sub menu-sub-accordion <?php echo e(in_array('psychological-services',$current_url_paths)?'show':''); ?>">
                                <div class="menu-item">
                                    <a class="menu-link <?php echo e($current_url_paths[count($current_url_paths)-1]=='requests'?'active':''); ?>"
                                       href="/admin/psychological-services/requests">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                        <span class="menu-title">درخواست ها</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
























                    <?php if(Auth::user()->can('menu.index') || Auth::user()->can('category.index')): ?>






















                    <?php endif; ?>
                    <?php if(Auth::user()->can('configuration.index') || Auth::user()->can('notification_configuration.index')): ?>





























                    <?php endif; ?>
                    <?php if(Auth::user()->can('ticket.index')): ?>
                        <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                            <div class="menu-link">
                            <span class="menu-icon">
								<i class="fa-solid fa-comments fs-3"></i>
							</span>
                                <span class="menu-title">پیام رسانی</span>
                                <span class="menu-arrow"></span>
                            </div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ticket.index')): ?>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link <?php echo e(in_array('configurations',$current_url_paths)?'active':''); ?>"
                                           href="#">
                                   <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                            <span class="menu-title">لیست تیکت ها</span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact-us.index.index')): ?>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link <?php echo e(in_array('contact-us',$current_url_paths)?'active':''); ?>"
                                           href="/admin/contact-us">
                                   <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                            <span class="menu-title">لیست پیام های فرم تماس با ما</span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="https://rc.aryasasol.com/"
           class="btn text-nowrap"
           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
           title="" target="_blank">
            <img style="width:100%" src="<?php echo e(asset('assets/media/logo-dark.png')); ?>" alt=""/>
        </a>
    </div>
</div>
<?php /**PATH /app/resources/views/panels/admin/__sidebar.blade.php ENDPATH**/ ?>
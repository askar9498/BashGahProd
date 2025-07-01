<?php $__env->startSection('title','صفحه ورود'); ?>
<?php $__env->startSection('head-links'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('head-links'); ?>
    <script src="https://www.google.com/recaptcha/api.js?render=6LdhAgQqAAAAADNEV3QhCbeoJA7Ml2y8SK58bMDP"></script>
    <style>
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20 m-0 m-auto text-center">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-5 shadow-lg">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="#"
                              action="#">
                            <?php echo csrf_field(); ?>
                            <div class="text-center">
                                <a href="#" class="mb-7">
                                    <img alt="باشگاه بازنشستگان شرکت پلیمر آریاساسول" style="width:100%" src="<?php echo e(asset('assets/media/logo.png')); ?>"/>
                                </a>
                            </div>
                            <div class="separator separator-content my-20">
                                <h1 class="text-dark fw-bolder mb-3 text-gray-600"> ورود</h1>
                            </div>
                            <div class="fv-row mb-8">
                                <input id="email" type="text" placeholder="ایمیل"
                                       name="email" autocomplete="off" class="form-control bg-transparent"/>
                            </div>
                            <div class="fv-row mb-8">
                                <input id="password" type="password" placeholder="کلمه عبور"
                                       name="password" autocomplete="off" class="form-control bg-transparent"/>
                            </div>
                            <?php echo GoogleReCaptchaV3::renderField('otp_form_id','otp_action'); ?>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_request" class="btn btn-primary">
                                    <span class="indicator-label">ورود </span>
                                    <span class="indicator-progress">در حال بررسی ...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <p id="request_errors" class="text-danger"></p>
                        </form>
                    </div>
                    <div class="d-flex flex-stack px-lg-10">
                        <div class="d-flex fw-semibold text-primary fs-base gap-5">
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(document).ready(function () {
            $("#kt_sign_in_request").click(function (e) {
                e.preventDefault();
                showProgressButton($(this));
                const this_button = $(this);

                if ($("#cellphone").val() !== '') {
                    $("#request_errors").html('');
                    const data = {
                        email: $('#email').val(),
                        password: $('#password').val(),
                        _token: `<?php echo e(csrf_token()); ?>`,
                        // 'g-recaptcha-response': getReCaptchaV3Response('otp_form_id')
                    }

                    $.ajax({
                        url: '/auth/login',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        success: function (response) {
                            hideProgressButton(this_button);
                            refreshReCaptchaV3('otp_form_id', 'otp_action');
                            $("#request_errors").html('');
                            if (response.is_admin) {
                                window.location = '/admin/dashboard';
                            } else {
                                window.location = '/documents';
                            }
                        },
                        error: function (xhr) {
                            hideProgressButton(this_button);
                            refreshReCaptchaV3('otp_form_id', 'otp_action');

                            $("#request_errors").html(xhr.responseJSON.message);
                            if (xhr.responseJSON.errors) {
                                $("#request_errors").html(xhr.responseJSON.errors.email[0] || xhr.responseJSON.errors.password[0]);
                            }
                        }
                    });
                } else {
                    $("#request_errors").html('نام کاربری و رمز عبور را وارد کنید!');
                }
            });

            $('#password').keypress(function (e) {
                let key = e.which;
                if (key == 13)  // the enter key code
                {
                    $('#kt_sign_in_request').click();
                    return false;
                }
            });
        });
    </script>
    <?php echo GoogleReCaptchaV3::init(); ?>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('panels._html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/panels/auth.blade.php ENDPATH**/ ?>
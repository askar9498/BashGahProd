<?php $__env->startSection('head-links'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('head-links'); ?>
    <style>
        .form-group label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            color: gray;
        }

        .form-control {
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 19px;
            padding-bottom: 10px;
            border-radius: 25px;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
            border-color: #007bff;
            outline: none;
        }

        .form-control:focus ~ label,
        .form-control:not(:placeholder-shown) ~ label {
            top: 10px;
            font-size: 0.75rem;
            color: #007bff;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
    </style>

    <script src="<?php echo e(asset('website/sweetalert2.all.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="bg-half bg-dark d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level text-light">
                        <h4 class="title">ارتباط با ما</h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="/home">صفحه اصلی </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ارتباط با ما</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <section class="section pt-5 mt-4">
        <div class="container mt-70 mt-60 border border-1 border-primary mb-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-1 order-md-1 mb-4">
                    <div class="title-heading ms-lg-4">
                        <h4 class="mb-4">اطلاعات تماس</h4>
                        <div class="d-flex contact-detail align-items-center mt-3">
                            <div class="icon">
                                <i data-feather="map-pin" class="fea icon-m-md text-dark me-3"></i>
                            </div>
                            <div class="flex-1 content">
                                <h6 class="title fw-bold mb-0">موقعیت </h6>
                                <p class="text-muted">استان بوشهر، عسلویه، منطقه ویژه اقتصادی انرژی پارس- شرکت پلیمر
                                    آریاساسول
                                    -باشگاه بازنشستگان کد پستی - 7511811365 </p>
                            </div>
                        </div>
                        <div class="d-flex contact-detail align-items-center mt-3">
                            <div class="icon">
                                <i data-feather="phone" class="fea icon-m-md text-dark me-3"></i>
                            </div>
                            <div class="flex-1 content">
                                <h6 class="title fw-bold mb-0">تلفن </h6>
                                <a href="tel:+982185923349" class="text-muted">+9821-85923349</a>
                            </div>
                        </div>
                        <div class="d-flex contact-detail align-items-center mt-3">
                            <div class="icon">
                                <i data-feather="mail" class="fea icon-m-md text-dark me-3"></i>
                            </div>
                            <div class="flex-1 content">
                                <h6 class="title fw-bold mb-0">رایانامه </h6>
                                <a href="mailto:rc@aryasasol.com" class="text-muted">rc@aryasasol.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-2 mb-4">
                    <div class=" p-4">
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <p id="error-msg" class="mb-0"></p>
                            <div id="simple-msg"></div>
                            <div class="form-group">
                                <input type="text" autocomplete="off" class="form-control" name="first_name" id="first_name"
                                       placeholder=" " required>
                                <label for="first_name">نام *</label>
                            </div>
                            <div class="form-group">
                                <input type="text" autocomplete="off" class="form-control" name="last_name" id="last_name" placeholder=" "
                                       required>
                                <label for="last_name">نام خانوادگی *</label>
                            </div>
                            <div class="form-group">
                                <input type="email" autocomplete="off" class="form-control" name="email" id="email" placeholder=" "
                                       required>
                                <label for="email">پست الکترونیکی *</label>
                            </div>
                            <div class="form-group">
                                <input type="text" autocomplete="off" class="form-control" name="subject" id="subject" placeholder=" "
                                       required>
                                <label for="subject">موضوع *</label>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" autocomplete="off" name="message" id="message" rows="4" placeholder=" "
                                          required></textarea>
                                <label for="message">متن پیام *</label>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" id="submit" name="send" class="btn btn-primary ">ارسال
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe src="https://www.google.com/maps?ll=27.542325,52.554539&z=14&t=m&hl=en-US&gl=US&mapclient=embed&cid=15522380775205809026&output=embed"
                                    style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#submit").on('click', function (e) {
                e.preventDefault();
                let first_name = $('input[name="first_name"]').val();
                let last_name = $('input[name="last_name"]').val();
                let email = $('input[name="email"]').val();
                let subject = $('input[name="subject"]').val();
                let message = $('textarea[name="message"]').val();
                if (first_name !== "" && last_name !== "" && email !== "" && subject !== "" && message !== "") {
                    Swal.showLoading('در حال ارسال . . .');
                    $.ajax({
                        url: `/contact-us`,
                        type: 'POST',
                        dataType: 'JSON',
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        data: {
                            "first_name": first_name,
                            "last_name": last_name,
                            "subject": subject,
                            "email": email,
                            "message": message
                        },
                        success: function (response) {
                            Swal.fire(
                                {
                                    type: 'success',
                                    text: 'پیام شما با موفقیت ارسال شد!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                            $('input[name="first_name"]').val('');
                            $('input[name="last_name"]').val('');
                            $('input[name="email"]').val('');
                            $('input[name="subject"]').val('');
                            $('textarea[name="message"]').val('');
                        },
                        error: function (xhr, status, error) {
                            if (xhr.status === 422) {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text: xhr.responseJSON.errors.first_name ||
                                            xhr.responseJSON.errors.last_name ||
                                            xhr.responseJSON.errors.email ||
                                            xhr.responseJSON.errors.subject ||
                                            xhr.responseJSON.errors.message,
                                        confirmButtonText: 'باشه'
                                    });
                            } else if (xhr.status === 429) {
                                Swal.fire(
                                    {
                                        title: 'خطا',
                                        type: 'error',
                                        text: 'درخواست بیش از حد مجاز',
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
                }else{
                    Swal.fire(
                        {
                            type: 'warning',
                            text: 'تمام فیلد ها را پر کنید!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website._html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/website/contact-us.blade.php ENDPATH**/ ?>
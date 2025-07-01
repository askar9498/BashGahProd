<?php
    $nonce = !empty($nonce) ? "nonce='{$nonce}'" : '';
?>

<?php if(! $hasAction && $backgroundMode ): ?>
    <?php if($display === false): ?>
        <style <?php echo $nonce; ?>>
            .grecaptcha-badge {
                visibility: hidden;
            }
        </style>
    <?php endif; ?>
    <script <?php echo $nonce; ?>>
        if (!document.getElementById('gReCaptchaScript')) {
            let reCaptchaScript = document.createElement('script');
            reCaptchaScript.setAttribute('src', '<?php echo e($apiJsUrl); ?>?render=<?php echo e($publicKey); ?>&hl=<?php echo e($language); ?>');
            reCaptchaScript.async = true;
            reCaptchaScript.defer = true;
            document.head.appendChild(reCaptchaScript);
        }
    </script>
<?php endif; ?>


<?php if($hasAction): ?>
    <script <?php echo $nonce; ?>>
        <?php $__currentLoopData = $mappers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action=>$fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    var client<?php echo e($field); ?>;
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        function onloadCallback() {
                    <?php $__currentLoopData = $mappers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action=>$fields): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    if (document.getElementById('<?php echo e($field); ?>')) {
                            client<?php echo e($field); ?> = grecaptcha.render('<?php echo e($field); ?>', {
                            'sitekey': '<?php echo e($publicKey); ?>',
                            <?php if($inline===true): ?> 'badge': 'inline', <?php endif; ?>
                            'size': 'invisible',
                            'hl': '<?php echo e($language); ?>'
                        });
                        grecaptcha.ready(function () {
                            grecaptcha.execute(client<?php echo e($field); ?>, {
                                action: '<?php echo e($action); ?>'
                            });
                        });
                    }
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        }
    </script>
    <script id='gReCaptchaScript'
            src="<?php echo e($apiJsUrl); ?>?render=<?php echo e($inline ? 'explicit' : $publicKey); ?>&hl=<?php echo e($language); ?>&onload=onloadCallback"
            defer
            async <?php echo $nonce; ?>></script>
<?php endif; ?>

<script <?php echo $nonce; ?>>
    function refreshReCaptchaV3(fieldId,action){
        return new Promise(function (resolve, reject) {
            grecaptcha.ready(function () {
                grecaptcha.execute(window['client'+fieldId], {
                    action: action
                }).then(resolve);
            });
        });
    }

    function getReCaptchaV3Response(fieldId){
        return grecaptcha.getResponse(window['client'+fieldId])
    }
</script>

<?php /**PATH /app/vendor/timehunter/laravel-google-recaptcha-v3/src/Providers/../../resources/views/googlerecaptchav3/template.blade.php ENDPATH**/ ?>
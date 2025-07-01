<?php if(Auth::user() && Auth::user()->isAdmin()): ?>
    <?php
        $layout = 'panels.admin._layout';
    ?>
<?php elseif(Auth::user() && !Auth::user()->isAdmin()): ?>
    <?php
        $layout = 'panels.user._layout';
    ?>
<?php else: ?>
    <?php
        $layout = 'errors._layout';
    ?>
<?php endif; ?>

<?php $__env->startSection('title', 'صفحه یافت نشد'); ?>
<?php $__env->startSection('main'); ?>
    <h1 style="text-align: center;margin: 0 auto">
        صفحه مورد نظر یافت نشد
        <?php echo e($exception->getMessage()); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/errors/404.blade.php ENDPATH**/ ?>
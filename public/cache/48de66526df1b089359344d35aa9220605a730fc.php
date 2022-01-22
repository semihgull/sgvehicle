<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(assets_url ('css/main.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(assets_url ('css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(assets_url ('vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(assets_url ('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(assets_url ('css/pages/auth.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(assets_url('images/favicon.svg')); ?>" type="image/x-icon">

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <script>
        setTimeout(() => document.querySelector('.msg').style.display = 'none', 1500);
    </script>
</head>
<body>
<?php if(isset($errors['error'])):?><div class="error-msg"><?=$errors['error'][0]?></div><?php endif;?>
<?php if($msg = msg('msg')): ?>
    <div class="msg">
        <?php echo $msg; ?>

    </div>
    <?php endif; ?>
<main>
    <div id="auth">
            <?php echo $__env->yieldContent('content'); ?>
    </div>
</main>

<script src="<?php echo e(assets_url('vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
<script src="<?php echo e(assets_url('js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(assets_url('vendors/apexcharts/apexcharts.js')); ?>"></script>
<script src="<?php echo e(assets_url('js/pages/dashboard.js')); ?>"></script>
<script src="<?php echo e(assets_url('js/mazer.js')); ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/layout-login.blade.php ENDPATH**/ ?>
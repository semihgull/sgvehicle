

<?php $__env->startSection('title', 'Giriş Yap'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row h-100">
        <div class="col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="<?php echo e(site_url()); ?>"><img src="<?php echo e(assets_url('images/logo/logo.png')); ?>" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Giriş Yap.</h1>
                <p class="auth-subtitle">Kullanıcı adı ve şifre kullanarak giriş yapın.</p>
                <form action="" method="POST">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control  <?php if(isset($errors['username'])):?>has-error<?php endif;?>" placeholder="Username" name="username">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <?php if(isset($errors['username'])):?><div class="error-msg"><?=$errors['username'][0]?></div><?php endif;?>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block shadow-lg mt-5">Giriş Yap</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="<?php echo e(site_url()); ?>">Şifremi Unuttum</a>.</p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/auth/login.blade.php ENDPATH**/ ?>
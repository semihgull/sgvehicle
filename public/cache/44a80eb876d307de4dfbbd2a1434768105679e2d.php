

<?php $__env->startSection('title', 'Araba Kayıt'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Araba Kayıt</h3>
            </div>
            <?php if(@$processOk && @$message): ?>
                <script>
                    Swal.fire('<?php echo e($message); ?>')
                </script>
            <?php endif; ?>
            <?php if(@$type == 'success'): ?>
                <script>userRedirect('<?php echo e(site_url('car/new-car')); ?>', 1)</script>
            <?php endif; ?>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(site_url('car/new-car/create')); ?>" method="POST">
                                    <section id="customer-area">
                                        <h4>Müşteri Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="customer-fullname">Müşteri Adı Soyadı</label>
                                            <input type="text" name="customer-fullname" id="customer-fullname" class="form-control" <?php if(isset($errors['customer-fullname'])):?>has-error<?php endif;?> value="<?=$_posts['customer-fullname'] ?? null ?>">
                                            <?php if(isset($errors['customer-fullname'])):?><div class="error-msg"><?=$errors['customer-fullname'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-address">Müşteri Adres</label>
                                            <textarea name="customer-address" id="customer-address" cols="15" rows="3" <?php if(isset($errors['customer-address'])):?>has-error<?php endif;?> class="form-control"><?=$_posts['customer-address'] ?? null ?></textarea>
                                            <?php if(isset($errors['customer-address'])):?><div class="error-msg"><?=$errors['customer-address'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-phone">Müşteri Telefon</label>
                                            <input type="tel" name="customer-phone" id="customer-phone" class="form-control" <?php if(isset($errors['customer-phone'])):?>has-error<?php endif;?> value="<?=$_posts['customer-phone'] ?? null ?>" pattern="[0-9]{3} [0-9]{3} [0-9]{4}">
                                            <?php if(isset($errors['customer-phone'])):?><div class="error-msg"><?=$errors['customer-phone'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-email">Müşteri Email</label>
                                            <input type="email" name="customer-email" id="customer-email" class="form-control" <?php if(isset($errors['customer-email'])):?>has-error<?php endif;?> value="<?=$_posts['customer-email'] ?? null ?>">
                                            <?php if(isset($errors['customer-email'])):?><div class="error-msg"><?=$errors['customer-email'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-id-number">Müşteri TC No</label>
                                            <input type="number" name="customer-id-number" id="customer-id-number" class="form-control" <?php if(isset($errors['customer-id-number'])):?>has-error<?php endif;?> value="<?=$_posts['customer-id-number'] ?? null ?>" pattern="[0-9]{11}">
                                            <?php if(isset($errors['customer-id-number'])):?><div class="error-msg"><?=$errors['customer-id-number'][0]?></div><?php endif;?>
                                        </div>
                                        <a id="step-two-btn" class="btn btn-outline-primary">Devam Et</a>
                                    </section>
                                    <section id="vehicles-area">
                                        <h4>Araç Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="car-plate">Araba Plakası</label>
                                            <input type="text" name="car-plate" id="car-plate" class="form-control" <?php if(isset($errors['car-plate'])):?>has-error<?php endif;?> value="<?=$_posts['car-plate'] ?? null ?>">
                                            <?php if(isset($errors['car-plate'])):?><div class="error-msg"><?=$errors['car-plate'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="car-chassis-number">Araba Şase No</label>
                                            <input type="text" name="car-chassis-number" id="car-chassis-number" class="form-control" <?php if(isset($errors['car-chassis-number'])):?>has-error<?php endif;?> value="<?=$_posts['car-chassis-number'] ?? null ?>">
                                            <?php if(isset($errors['car-chassis-number'])):?><div class="error-msg"><?=$errors['car-chassis-number'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="car-brand">Araba Marka</label>
                                            <select name="car-brand" id="car-brand" class="form-control">
                                                <option value="999">Seçin</option>
                                                <?php echo e(\App\Services\CarServices::ListCarBrand()); ?>

                                            </select>
                                            <?php if(isset($errors['car-brand'])):?><div class="error-msg"><?=$errors['car-brand'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="car-model">Araba Model</label>
                                            <select name="car-model" id="car-model" class="form-control">
                                                <option value="0">Seçin</option>

                                            </select>
                                            <?php if(isset($errors['car-model'])):?><div class="error-msg"><?=$errors['car-model'][0]?></div><?php endif;?>
                                        </div>
                                        <a id="step-one-btn" class="btn btn-outline-danger">Geri Gel</a>
                                        <input type="submit" value="Kayıt Et" class="btn btn-outline-success">
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(assets_url('js/customJs/car.js')); ?>"></script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/car/new-car.blade.php ENDPATH**/ ?>
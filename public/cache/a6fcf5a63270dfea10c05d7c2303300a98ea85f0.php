

<?php $__env->startSection('title', 'Araba Düzenleme'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Araba Düzenleme</h3>
            </div>
            <?php if(@$processOk && @$message): ?>
                <script>
                    Swal.fire('<?php echo e($message); ?>')
                </script>
            <?php endif; ?>
            <?php if(@$type == 'success'): ?>
                <script>userRedirect('<?php echo e(site_url('car/edit-car')); ?>', 1)</script>
            <?php endif; ?>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="car-search-info">Araç Bilgisi</label>
                                    <input type="text" class="form-control" id="car-search-info" placeholder="Plaka veya Şase Numarası Girin">
                                    <div class="alert alert-primary" role="alert" id="length-info">
                                        En Az Üç Karakter Girmelisiniz.
                                    </div>
                                    <div class="alert alert-danger" role="alert" id="error-info">
                                        Kayıtlı Araç Bulunamadı.
                                    </div>
                                </div>

                                <form action="<?php echo e(site_url('car/edit-car/continue')); ?>" method="POST">
                                    <section id="edit-area">
                                        <h4>Araç Bilgileri</h4>
                                        <div class="form-group">
                                            <label for="car-plate-edit">Araba Plakası</label>
                                            <input type="text" name="car-plate-edit" id="car-plate-edit" class="form-control" <?php if(isset($errors['car-plate-edit'])):?>has-error<?php endif;?> value="<?=$_posts['car-plate-edit'] ?? null ?>">
                                            <input type="hidden" name="car-id-edit" id="car-id-edit" class="form-control">
                                            <?php if(isset($errors['car-plate-edit'])):?><div class="error-msg"><?=$errors['car-plate-edit'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="car-chassis-number-edit">Araba Şase No</label>
                                            <input type="text" name="car-chassis-number-edit" id="car-chassis-number-edit" class="form-control" <?php if(isset($errors['car-chassis-number-edit'])):?>has-error<?php endif;?> value="<?=$_posts['car-chassis-number-edit'] ?? null ?>">
                                            <?php if(isset($errors['car-chassis-number-edit'])):?><div class="error-msg"><?=$errors['car-chassis-number-edit'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="car-brand-edit">Araba Marka</label>
                                            <select name="car-brand-edit" id="car-brand-edit" class="form-control">
                                                <option value="999" id="car-brand-selected">Seçin</option>
                                                <?php echo e(\App\Services\CarServices::ListCarBrand()); ?>

                                            </select>
                                            <?php if(isset($errors['car-brand-edit'])):?><div class="error-msg"><?=$errors['car-brand-edit'][0]?></div><?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <label for="car-model-edit">Araba Model</label>
                                            <select name="car-model-edit" id="car-model-edit" class="form-control">
                                                <option value="0" id="car-model-selected">Seçin</option>
                                            </select>
                                            <?php if(isset($errors['car-model-edit'])):?><div class="error-msg"><?=$errors['car-model-edit'][0]?></div><?php endif;?>
                                        </div>
                                        <input type="submit" value="Güncelle" class="btn btn-outline-success">
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
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/car/edit-car.blade.php ENDPATH**/ ?>
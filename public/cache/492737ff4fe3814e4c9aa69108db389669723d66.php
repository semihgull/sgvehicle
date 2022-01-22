

<?php $__env->startSection('title', 'Parça Kayıt'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Araba Parçası Kayıt</h3>
            </div>
            <?php if(@$processOk && @$message): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e($message); ?>

                </div>
                <script>userRedirect('<?php echo e(site_url('store/new-car-part')); ?>', 1)</script>
            <?php endif; ?>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(site_url('store/new-car-part/create')); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="parts-name">Parça Adı</label>
                                        <input type="text" name="parts-name" id="parts-name" class="form-control" <?php if(isset($errors['parts-name'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-name'])):?><div class="error-msg"><?=$errors['parts-name'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-code">Parça Kodu</label>
                                        <input type="text" name="parts-code" id="parts-code" class="form-control" <?php if(isset($errors['parts-code'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-code'])):?><div class="error-msg"><?=$errors['parts-code'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-category">Parça Kategorisi</label>
                                        <select name="parts-category" id="parts-category" class="form-control">
                                            <option value="0">Seç</option>
                                            <?php echo e(\App\controllers\StoreController::getCategory()); ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-stock">Stok Adedi</label>
                                        <input type="text" name="parts-stock" id="parts-stock" class="form-control" <?php if(isset($errors['parts-stock'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-stock'])):?><div class="error-msg"><?=$errors['parts-stock'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-price">Parça Fiyatı</label>
                                        <input type="text" name="parts-price" id="parts-price" class="form-control" <?php if(isset($errors['parts-price'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-price'])):?><div class="error-msg"><?=$errors['parts-price'][0]?></div><?php endif;?>
                                    </div>
                                    <input type="submit" value="Kayıt Et" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/store/new-car-part.blade.php ENDPATH**/ ?>
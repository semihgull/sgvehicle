

<?php $__env->startSection('title', 'Parça İşlemleri'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(@$processOk && @$message): ?>
            <script>Swal.fire("<?php echo e($message); ?>")</script>
        <script>userRedirect('<?php echo e(site_url('store/edit-car-part')); ?>', 1)</script>
    <?php endif; ?>
            <div class="page-heading">
                <h3>Parça Düzenleme</h3>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(site_url('store/car-part-info/get')); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="parts-list-search">Parça Seç</label>
                                        <select name="parts-list-search" id="parts-list-search" class="form-control">
                                            <option value="">Seç</option>
                                            <?php $__currentLoopData = $partList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($parts["id"]); ?>"><?php echo e($parts["parts-name"]); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <span>veya</span>
                                    <div class="form-group">
                                        <label for="parts-code-search">Parça Kodu</label>
                                        <input type="text" name="parts-code-search" id="parts-code-search" class="form-control" <?php if(isset($errors['parts-code-search'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-code-search'])):?><div class="error-msg"><?=$errors['parts-code-search'][0]?></div><?php endif;?>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" id="parts-find-btn">Parça Bul</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(site_url('store/edit-car-part/update')); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="parts-name-edit">Parça Adı</label>
                                        <input type="text" name="parts-name-edit" id="parts-name-edit" class="form-control" <?php if(isset($errors['parts-name-edit'])):?>has-error<?php endif;?>>
                                        <input type="hidden" name="parts-id-edit" id="parts-id-edit" class="form-control">
                                        <?php if(isset($errors['parts-name-edit'])):?><div class="error-msg"><?=$errors['parts-name-edit'][0]?></div><?php endif;?>
                                    </div>

                                    <div class="form-group">
                                        <label for="parts-code-edit">Parça Kodu</label>
                                        <input type="text" name="parts-code-edit" id="parts-code-edit" class="form-control" <?php if(isset($errors['parts-code-edit'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-code-edit'])):?><div class="error-msg"><?=$errors['parts-code-edit'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-category-edit">Parça Kategorisi</label>
                                        <select name="parts-category-edit" id="parts-category-edit" class="form-control">
                                            <option value="0" id="edit-select-option">Seç</option>
                                            <?php echo e(\App\controllers\StoreController::getCategory()); ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-stock-edit">Stok Adedi</label>
                                        <input type="number" name="parts-stock-edit" id="parts-stock-edit" class="form-control" <?php if(isset($errors['parts-stock-edit'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-stock-edit'])):?><div class="error-msg"><?=$errors['parts-stock-edit'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="parts-price-edit">Parça Fiyatı</label>
                                        <input type="number" name="parts-price-edit" id="parts-price-edit" class="form-control" <?php if(isset($errors['parts-price-edit'])):?>has-error<?php endif;?>>
                                        <?php if(isset($errors['parts-price-edit'])):?><div class="error-msg"><?=$errors['parts-price-edit'][0]?></div><?php endif;?>
                                    </div>
                                    <input type="submit" value="Parça Düzenle" class="btn btn-outline-success">
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(assets_url('js/customJs/store.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/store/edit-car-part.blade.php ENDPATH**/ ?>
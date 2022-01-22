

<?php $__env->startSection('title', 'Parça İşlemleri'); ?>

<?php $__env->startSection('content'); ?>
            <div class="page-heading">
                <h3>Parça İşlemleri</h3>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="counter">
                                                <div class="counter-icon">
                                                    <i class="fa fa-globe"></i>
                                                </div>
                                                <div class="counter-content">
                                                    <h3>Toplam Kategori Sayısı</h3>
                                                    <span class="counter-value"><?php echo e(\App\Services\StoreService::CountCatgory()); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php echo e(site_url('store/new-store-category')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block mb-2">Parça Kategorisi Ekle</button>
                                        </a>
                                        <a href="<?php echo e(site_url('store/new-car-part')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block">Parça Ekle</button>
                                        </a>
                                        <a href="<?php echo e(site_url('store/edit-car-part')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block mt-2">Parça Düzenle</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <caption style="caption-side: top;">Stoğu 10'dan Eksik Olan Ürünler</caption>
                                        <thead>
                                        <tr>
                                            <th scope="row">Ürün No</th>
                                            <th>Ürün Adı</th>
                                            <th>Ürün Kodu</th>
                                            <th>Kalan Ürün</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($part['id']); ?></th>
                                            <td><?php echo e($part['parts-name']); ?></td>
                                            <td><?php echo e($part['parts-code']); ?></td>
                                            <td><?php echo e($part['parts-quantity']); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(assets_url('css/counter-css.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/store/store.blade.php ENDPATH**/ ?>
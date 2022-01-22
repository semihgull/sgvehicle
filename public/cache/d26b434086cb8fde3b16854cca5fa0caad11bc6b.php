

<?php $__env->startSection('title', 'Araç İşlemleri'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Araç İşlemleri</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="counter">
                                            <div class="counter-icon">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                            <div class="counter-content">
                                                <h3>Toplam Araç Sayısı</h3>
                                                <span class="counter-value"><?php echo e(\App\Services\VehicleServices::VehicleCounter()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <a href="<?php echo e(site_url('car/new-car')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block mb-2">Araç Ekle</button>
                                        </a>
                                        <a href="<?php echo e(site_url('car/edit-car')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block">Araç Düzenle</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <caption style="caption-side: top">Kayıt Edilen Son 10 Araç</caption>
                                    <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Plaka</th>
                                        <th scope="col">Araç Sahibi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $lastVehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($item['id']); ?></th>
                                        <td><?php echo e($item['car-plate']); ?></td>
                                        <td><?php echo e(\App\Services\CustomerServices::GetCustomerName($item['car-owner'])); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(assets_url('css/counter-css.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/car/car.blade.php ENDPATH**/ ?>
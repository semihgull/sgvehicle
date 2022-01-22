

<?php $__env->startSection('title', 'Servis İşlemleri'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Servis İşlemleri</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <a href="<?php echo e(site_url('orders/new-order')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block mb-2">Servis Kaydı Aç</button>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <a href="<?php echo e(site_url('orders/list-orders')); ?>">
                                            <button type="button" class="btn btn-info btn-lg btn-block">Tüm Servis Kayıtları</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <div class="container mb-4">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="counter">
                                <div class="counter-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>Tamamlanan Servisler</h3>
                                    <span class="counter-value"><?php echo e(\App\Services\OrderServices::CountOrder('complated')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="counter blue">
                                <div class="counter-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>Bekleyen Servisler</h3>
                                    <span class="counter-value"><?php echo e(\App\Services\OrderServices::CountOrder('onhold')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="counter gray">
                                <div class="counter-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>Tamir Aşamasında</h3>
                                    <span class="counter-value"><?php echo e(\App\Services\OrderServices::CountOrder('repair')); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="counter red">
                                <div class="counter-icon">
                                    <i class="fa fa-rocket"></i>
                                </div>
                                <div class="counter-content">
                                    <h3>İptal Servisler</h3>
                                    <span class="counter-value"><?php echo e(\App\Services\OrderServices::CountOrder('cancel')); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <h4 class="card-title">
                                        Tamir Aşamasında Olanlar
                                    </h4>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#id</th>
                                                <th scope="col">Plaka</th>
                                                <th scope="col">Yetkili</th>
                                                <th scope="col">Son İşlemler</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $repair; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <th scope="row"><?php echo e($item['id']); ?></th>
                                                    <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($item['car-id'], 'plate')); ?></td>
                                                    <td><?php echo e(\App\Services\UserService::ShowUserName($item['related-master'])); ?></td>
                                                    <td><?php echo e($item['updated_at']->diffForHumans()); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <h4 class="card-title">
                                        Son 10 Servisler
                                    </h4>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#id</th>
                                                <th scope="col">Plaka</th>
                                                <th scope="col">Yetkili</th>
                                                <th scope="col">Son İşlem Zamanı</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $onhold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($item['id']); ?></th>
                                                <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($item['car-id'], 'plate')); ?></td>
                                                <td><?php echo e(\App\Services\UserService::ShowUserName($item['related-master'])); ?></td>
                                                <td><?php echo e($item['updated_at']->diffForHumans()); ?></td>
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
            </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(assets_url('css/counter-css.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/orders/order.blade.php ENDPATH**/ ?>
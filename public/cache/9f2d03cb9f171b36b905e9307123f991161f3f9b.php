

<?php $__env->startSection('title', 'Ana Sayfa'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Ana Sayfa</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
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
                                    <div class="col-6">
                                        <div class="counter">
                                            <div class="counter-icon">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                            <div class="counter-content">
                                                <h3>Toplam Ürün Sayısı</h3>
                                                <span class="counter-value"><?php echo e(\App\Services\StoreService::CountPart()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <div class="card">
                                            <h4 class="card-title">
                                                Son 10 Servis Kaydı
                                            </h4>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#id</th>
                                                        <th scope="col">Plaka</th>
                                                        <th scope="col">Yetkili</th>
                                                        <th scope="col">Durumu</th>
                                                        <th scope="col">Son İşlem Saati</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($item['id']); ?></th>
                                                            <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($item['car-id'], 'plate')); ?></td>
                                                            <td><?php echo e(\App\Services\UserService::ShowUserName($item['related-master'])); ?></td>
                                                            <td><?php echo e(\App\Services\OrderStatusService::StatusName($item['order-status'])); ?></td>
                                                            <td><?php echo e($item['updated_at']->diffForHumans()); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-5">
                                        <div class="card">
                                            <h4 class="card-title">
                                                Son 10 Servisler
                                            </h4>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">#id</th>
                                                        <th scope="col">Parça Adı</th>
                                                        <th scope="col">Parça Kodu</th>
                                                        <th scope="col">Sayısı</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th scope="row"><?php echo e($item['id']); ?></th>
                                                            <td><?php echo e($item['parts-name']); ?></td>
                                                            <td><?php echo e($item['parts-code']); ?></td>
                                                            <td><?php echo e($item['parts-quantity']); ?></td>
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
                </section>
            </div>

    <?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(assets_url('css/counter-css.css')); ?>">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/home.blade.php ENDPATH**/ ?>
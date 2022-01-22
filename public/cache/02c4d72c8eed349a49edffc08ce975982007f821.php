

<?php $__env->startSection('title', 'Usta Paneli'); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-heading">
        <h3>Usta Paneli</h3>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <caption style="caption-side: top">Tamamlanan İşler</caption>
                            <thead>
                            <tr>
                                <th scope="col">#Servis Numarası</th>
                                <th scope="col">Plaka</th>
                                <th scope="col">Şase Numarası</th>
                                <th scope="col">Araç Sahibi</th>
                                <th scope="col">Detay Gör</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(count($orders)<1): ?>
                                <tr>
                                    <th scope="row" colspan="5" class="text-center">Tebrikler hiç bekleyen iş yok.</th>
                                </tr>
                            <?php endif; ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">#<?php echo e($order['id']); ?></th>
                                    <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'plate')); ?></td>
                                    <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'chassis-number')); ?></td>
                                    <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'owner')); ?></td>
                                    <td><a href="<?php echo e(site_url('master/order/detail/'. $order['id'])); ?>" class="btn btn-outline-primary">İş Detay</a></td>
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

<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/master/complated-order.blade.php ENDPATH**/ ?>
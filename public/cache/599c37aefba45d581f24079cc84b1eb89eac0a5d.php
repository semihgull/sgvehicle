

<?php $__env->startSection('title', 'Serviş İşlemleri'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Tüm Servis Kayıtları</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                   <div class="col-12">
                                       <table class="table table-hover">
                                           <thead>
                                           <tr>
                                               <th scope="col">#Sipariş No</th>
                                               <th scope="col">Plaka</th>
                                               <th scope="col">Yetkili Kişi</th>
                                               <th scope="col">Sipariş Durumu</th>
                                               <th scope="col">Son İşlem Tarihi</th>
                                               <th scope="col">Düzenle</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                           <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <tr>
                                                   <th scope="col">#<?php echo e($order['id']); ?></th>
                                                   <td><?php echo e(\App\Services\VehicleInfoServices::ShowCar($order['car-id'], 'plate')); ?></td>
                                                   <td><?php echo e(\App\Services\UserService::ShowUserName($order['related-master'])); ?></td>
                                                   <td><?php echo e(\App\Services\OrderStatusService::StatusName($order['order-status'])); ?></td>
                                                   <td><?php echo e($order['updated_at']->diffForHumans()); ?></td>
                                                   <td><a href="<?php echo e(site_url('orders/edit-order/'.$order['id'])); ?>" class="btn btn-primary btn-edit" id="btn-edit" data-service-id="<?php echo e($order['id']); ?>">Düzenle</a></td>
                                               </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           </tbody>
                                       </table>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript" src="<?php echo e(assets_url('js/customJs/order.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(assets_url('js/jquery.inputmask.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/orders/order-list.blade.php ENDPATH**/ ?>
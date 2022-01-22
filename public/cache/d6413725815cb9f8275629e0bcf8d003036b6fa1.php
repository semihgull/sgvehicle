

<?php $__env->startSection('title', 'Servis Kaydı Düzenleme'); ?>

<?php $__env->startSection('content'); ?>

            <div class="page-heading">
                <h3>Servis Kaydı Düzenleme</h3>
            </div>
            <?php if(@$processOk && @$message): ?>
                <script>
                    Swal.fire('<?php echo e($message); ?>')
                </script>
            <?php endif; ?>
            <?php if(@$type == 'success'): ?>
                <script>userRedirect('<?php echo e(site_url('orders/list-orders')); ?>', 1)</script>
            <?php endif; ?>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(site_url('orders/edit-order')); ?>" method="POST">
                                    <section id="service-area">
                                        <h4 class="mt-2">Servis Bilgileri</h4>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="service-id-edit">Servis Numarası</label>
                                                            <input type="text" class="form-control" id="service-id-edit" name="service-id-edit" disabled value="<?php echo e($orders['id']); ?>">
                                                            <input type="hidden" class="form-control" id="service-id-edit-hidden" name="service-id-edit-hidden" value="<?php echo e($orders['id']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="car-km-edit">Araç Kilometresi</label>
                                                            <input type="text" class="form-control" id="car-km-edit" name="car-km-edit" disabled value="<?php echo e($orders['car-km']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="customer-complaint-edit">Müşteri Şikayeti</label>
                                                            <textarea class="form-control" id="customer-complaint-edit" name="customer-complaint-edit" disabled><?php echo e($orders['customer-complaint']); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="masters-opinion-edit">Usta Görüşü</label>
                                                            <textarea class="form-control" id="masters-opinion-edit" name="masters-opinion-edit" disabled><?php echo e($orders['masters-opinion']); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="related-master-edit">İlgili Kişi</label>
                                                            <input type="text" class="form-control" id="related-master-edit" name="related-master-edit" disabled value="<?php echo e($orders['relatedMaster']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="customer-id-edit">Müşteri Adı</label>
                                                            <input type="text" class="form-control" id="customer-id-edit" name="customer-id-edit" disabled value="<?php echo e($orders['customerName']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="car-plate-edit">Plaka</label>
                                                            <input type="text" class="form-control" id="car-plate-edit" name="car-plate-edit" disabled
                                                                   value="<?php echo e(\App\Services\VehicleInfoServices::ShowCar($orders['car-id'], 'plate')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="chassis-number-edit">Şase Numarası</label>
                                                            <input type="text" class="form-control" id="chassis-number-edit" name="chassis-number-edit" disabled
                                                                   value="<?php echo e(\App\Services\VehicleInfoServices::ShowCar($orders['car-id'], 'chassis-number')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="order-status-edit">Servis Kayıt Durumu</label>
                                                        <select name="order-status-edit" id="order-status-edit" class="form-control">
                                                            <option value="<?php echo e($orders['order-status']); ?>"><?php echo e(\App\Services\OrderStatusService::StatusName($orders["order-status"])); ?></option>
                                                            <?php echo e(\App\Services\OrderStatusService::OrderStatusType()); ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" value="Güncelle" class="btn btn-success">
                                        </div>
                                    </section>
                                </form>
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
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/orders/edit-order.blade.php ENDPATH**/ ?>
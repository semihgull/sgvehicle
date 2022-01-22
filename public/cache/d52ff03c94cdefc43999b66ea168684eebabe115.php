

<?php $__env->startSection('title', 'Departman Ayarlraı'); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-heading">
        <h3>Departman Ayarları</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="h5">Departman Ekle</h5>
                                        <form action="<?php echo e(site_url('department/settings/save')); ?>" method="POST">
                                            <div class="form-group">
                                                <label for="department-name">Departman Adı</label>
                                                <input type="text" class="form-control <?php if(isset($errors['department-name'])):?>has-error<?php endif;?>" id="department-name" name="department-name" value="<?=$_posts['department-name'] ?? null ?>" placeholder="Departman Adını Girin">
                                                <?php if(isset($errors['department-name'])):?><div class="error-msg"><?=$errors['department-name'][0]?></div><?php endif;?>
                                            </div>
                                            <input type="submit" class="btn btn-primary me-1 mb-1" value="Ekle">
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="h5">Departman Düzenleme</h5>
                                        <form action="<?php echo e(site_url('department/settings/edit')); ?>" method="POST">
                                            <div class="form-group">
                                                <label for="department-name-edit">Departman Adı</label>
                                                <input type="text" class="form-control <?php if(isset($errors['department-name-edit'])):?>has-error<?php endif;?>" id="department-name-edit" onkeyup="changeDepartmentEdit()" name="department-name-edit" value="asdasd" placeholder="Departman Adını Girin">
                                                <?php if(isset($errors['department-name-edit'])):?><div class="error-msg"><?=$errors['department-name-edit'][0]?></div><?php endif;?>
                                                <input type="hidden" name="department-id-edit" value="" id="department-id-edit">
                                            </div>
                                            <input type="submit" class="btn btn-primary me-1 mb-1" value="Düzenle">
                                            <input type="button" class="btn btn-danger me-1 mb-1" value="Temizle" id="clear-btn">
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <section class="section">
                                            <h5 class="h5">Departman Listesi</h5>
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-striped" id="table1">
                                                        <thead>
                                                        <tr>
                                                            <th>Departman Yetki Numarası</th>
                                                            <th>Departman Yetki Adı</th>
                                                            <th>Düzenle</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($department->id); ?></td>
                                                            <td><?php echo e($department->name); ?></td>
                                                            <td>
                                                                <button class="btn btn-outline-success" onclick="editFunction(<?php echo e($department->id); ?>)" >Düzenle</button>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </section>
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
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(assets_url('js/customJs/department.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/department/settings.blade.php ENDPATH**/ ?>
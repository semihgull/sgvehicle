

<?php $__env->startSection('title', 'Kullanıcı Düzenle'); ?>
<?php $__env->startSection('userScript'); ?>
    <script>
        function userRedirect(to, seconds) {
            if (seconds == 0) {
                window.location.href = to;
                return;
            }
            seconds--;
            setTimeout(function() {
                userRedirect(to, seconds);
            }, 1000);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
            <?php if(@$isUpdating): ?>
                <div class="alert alert-success" role="alert">
                    Kullanıcı Güncellendi
                </div>
                <script>userRedirect('<?php echo e(site_url('user/settings')); ?>', 2)</script>
                <?php endif; ?>
            <div class="page-heading">
                <h3>Kullanıcı düzenleme</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="user-list">Düzenlenecek Kullanıcılar</label>
                                        <select class="form-control" id="user-list" name="user-list">
                                            <option> --Seçin-- </option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user['id']); ?>" data-user-id="<?php echo e($user['id']); ?>"><?php echo e($user['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </form>
                                <hr/>
                                <form action="<?php echo e(site_url('user/edit-user')); ?>" method="POST">
                                    <div class="form-group">
                                        <label for="user-first-name">İsim</label>
                                        <input type="text" class="form-control" id="user-first-name" placeholder="Personel Adı" name="user-first-name"
                                               <?php if(isset($errors['user-first-name'])):?>has-error<?php endif;?> value="<?=$_posts['user-first-name'] ?? null ?>">
                                        <?php if(isset($errors['user-first-name'])):?><div class="error-msg"><?=$errors['user-first-name'][0]?></div><?php endif;?>
                                        <input type="hidden" value="" name="user-id" id="user-id">
                                    </div>
                                    <div class="form-group">
                                        <label for="user-last-name">Soyisim</label>
                                        <input type="text" class="form-control" id="user-last-name" placeholder="Personel Soyadı" name="user-last-name"
                                               <?php if(isset($errors['user-last-name'])):?>has-error<?php endif;?> value="<?=$_posts['user-last-name'] ?? null ?>">
                                        <?php if(isset($errors['user-last-name'])):?><div class="error-msg"><?=$errors['user-last-name'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-name">Kullanıcı adı</label>
                                        <input type="text" class="form-control" id="user-name" placeholder="Personel Kullanıcı Adı" name="user-name"
                                               <?php if(isset($errors['user-name'])):?>has-error<?php endif;?> value="<?=$_posts['user-name'] ?? null ?>">
                                        <?php if(isset($errors['user-name'])):?><div class="error-msg"><?=$errors['user-name'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-email">Kullanıcı Email</label>
                                        <input type="email" class="form-control" id="user-email" placeholder="E-mail Adresi Girin" name="user-email"
                                               <?php if(isset($errors['user-email'])):?>has-error<?php endif;?> value="<?=$_posts['user-email'] ?? null ?>">
                                        <?php if(isset($errors['user-email'])):?><div class="error-msg"><?=$errors['user-email'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-phone">Kullanıcı Telefon</label>
                                        <input type="tel" class="form-control" id="user-phone" placeholder="Telefon Numarası Girin" name="user-phone"
                                               <?php if(isset($errors['user-phone'])):?>has-error<?php endif;?> value="<?=$_posts['user-phone'] ?? null ?>">
                                        <?php if(isset($errors['user-phone'])):?><div class="error-msg"><?=$errors['user-phone'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-address">Kullanıcı Adress</label>
                                        <textarea class="form-control" id="user-adress" name="user-adress" rows="3" <?php if(isset($errors['user-adress'])):?>has-error<?php endif;?>><?=$_posts['user-adress'] ?? null ?></textarea>
                                        <?php if(isset($errors['user-adress'])):?><div class="error-msg"><?=$errors['user-adress'][0]?></div><?php endif;?>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-role">Bir Yetki Seçin</label>
                                        <select class="form-control" id="user-role" name="user-role">
                                            <option> --Seçin-- </option>
                                            <option value="6">Sekreter</option>
                                            <option value="7">Usta</option>
                                            <option value="8">Depocu</option>
                                            <option value="9">Yönetici</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
            let userList = document.getElementById('user-list');
            let userId;
            $(userList).on('change', function (){
                userId = $(userList).find(':selected').data("user-id");
                $.ajax({
                    url : 'http://localhost/sgboilerplate/user/get/user-info',
                    type : 'post',
                    data : {"userId" : userId},
                    success: function (response){
                        let user = JSON.parse(response);
                        $("#user-id").val(user["id"]);
                        $("#user-first-name").val(user["first-name"]);
                        $("#user-last-name").val(user["last-name"]);
                        $("#user-name").val(user["name"]);
                        $("#user-email").val(user["email"]);
                        $("#user-phone").val(user["phone"]);
                        $("#user-adress").val(user["adress"]);
                        $('select[id=user-role] option').filter(':selected').val(user["role"])
                        getDepartmentName(user["role"])
                    }
                });
            });

            function getDepartmentName(departmentId){
                $.ajax({
                    url : 'http://localhost/sgboilerplate/department/get/department-info',
                    type : 'post',
                    data : {"departmentId" : departmentId},
                    success: function (response) {
                        let department = JSON.parse(response);
                        $('select[id=user-role] option').filter(':selected').html(department["name"])

                    }
                });

            }

    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('../layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/users/edit.blade.php ENDPATH**/ ?>
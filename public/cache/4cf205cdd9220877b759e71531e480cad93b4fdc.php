<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?php echo e(site_url()); ?>"><img src="<?php echo e(assets_url('images/logo/logo.png')); ?>" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body py-4 px-5">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="<?php echo e(assets_url('images/faces/1.jpg')); ?>" alt="Face 1">
                    </div>
                    <div class="ms-3 name">
                        <h5 class="font-bold"><?php echo e(auth()->getName()); ?></h5>
                        <h6 class="text-muted mb-0">#<?php echo e(auth()->getId()); ?></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menü <?php echo e(getRoleName(auth()->getRole())); ?><?php echo e(auth()->getRole()); ?></li>

                <li class="sidebar-item">
                    <a href="<?php echo e(site_url('')); ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Ana Sayfa</span>
                    </a>
                </li>

                <div style="<?= (auth()->getRole() == 6) || (auth()->getRole() == 9) ? '' : 'display:none;'?>">

                    <li class="sidebar-title">Araç İşlemleri</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('car')); ?>" class='sidebar-link'>
                            <i class="bi bi-cloud-plus-fill"></i>
                            <span>Araç İşlemleri</span>
                        </a>
                    </li>
                </div>

                <div style="<?= (auth()->getRole() == 8 ) || (auth()->getRole() == 7 ) ? 'display:none' : ''; ?>">
                    <li class="sidebar-title">Servis İşlemleri</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('orders')); ?>" class='sidebar-link'>
                            <i class="bi bi-hdd-fill"></i>
                            <span>Servis Kayıtları</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('orders/new-order')); ?>" class='sidebar-link'>
                            <i class="bi bi-hdd-fill"></i>
                            <span>Servis Kaydı Aç</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('orders/list-orders')); ?>" class='sidebar-link'>
                            <i class="bi bi-hdd-stack-fill"></i>
                            <span>Tüm Servis Kayıtları</span>
                        </a>
                    </li>
                </div>

                <div style="<?= auth()->getRole() == 9 ? '' : 'display:none'?>">
                    <li class="sidebar-title">Kullanıcı İşlemleri</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('user/settings')); ?>" class='sidebar-link'>
                            <i class="bi bi-person-plus-fill"></i>
                            <span>Kullanıcı Ayarları</span>
                        </a>
                    </li>
                </div>

                <div style="<?= (auth()->getRole() == 9) || (auth()->getRole() == 8) ? '' : 'display:none' ?>">
                    <li class="sidebar-title">Parça İşlemleri</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('store')); ?>" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Parça Ayarları</span>
                        </a>
                    </li>
                </div>

                <div style="<?= auth()->getRole() == 9 ? '' : 'display:none' ?>">
                    <li class="sidebar-title">İşletme İşlemleri</li>

                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('department/settings')); ?>" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Departman Ayarları</span>
                        </a>
                    </li>
                </div>

                <div style="<?= (auth()->getRole() != 7 ) ? 'display:none' : ''; ?>">
                    <li class="sidebar-title">İşlerim</li>
                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('master/on-hold-order')); ?>" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Bekleyen İşler</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('master/repair-order')); ?>" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Tamir Aşamasında Olan İşler</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('master/complated-order')); ?>" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>Tamamlanan İşler</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="<?php echo e(site_url('master/cancel-order')); ?>" class='sidebar-link'>
                            <i class="bi bi-gear-fill"></i>
                            <span>İptal Olan İşler</span>
                        </a>
                    </li>
                </div>

                <hr>
                <li class="sidebar-item  ">
                    <a href="<?php echo e(site_url('logout')); ?>" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Çıkış yap</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>

    </div>
</div><?php /**PATH C:\xampp\htdocs\sgboilerplate\public\views/menu.blade.php ENDPATH**/ ?>
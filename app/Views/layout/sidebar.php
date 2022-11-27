 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-primary elevation-4" style="background-color: #c1f8cf; color:#000;">
     <!-- Brand Logo -->
     <a href="<?= base_url() ?>/" class="brand-link text-center">
         <span class="brand-text font-weight-bold">E-commerce</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url() ?>/../../assets/img/user/<?= user()->image ?>" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="<?= base_url() ?>/user" class="d-block"><?= user()->username ?></a>
             </div>
         </div>


         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <?php if (has_permission('manage-all')) : ?>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "admin") ? 'menu-open' : '' ?>">
                     <a href="<?= base_url() ?>/admin"
                         class="nav-link  <?= ($uri->getSegment(1) == "admin") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Admin
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/admin/index"
                                 class="nav-link  <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Dashboard</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/admin/user"
                                 class="nav-link  <?= ($uri->getSegment(2) == "user") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>User Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/admin/role"
                                 class="nav-link  <?= ($uri->getSegment(2) == "role") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Role Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/admin/role_perm"
                                 class="nav-link  <?= ($uri->getSegment(2) == "role_perm") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Role & Permission</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "utility") ? 'menu-open' : '' ?>">
                     <a href="<?= base_url() ?>/utility"
                         class="nav-link  <?= ($uri->getSegment(1) == "utility") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-tools"></i>
                         <p>
                             Utility
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/seo"
                                 class="nav-link  <?= ($uri->getSegment(2) == "seo") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>SEO</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/menu"
                                 class="nav-link  <?= ($uri->getSegment(2) == "menu") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Menu Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/banner"
                                 class="nav-link  <?= ($uri->getSegment(2) == "banner") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Banner Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/promo"
                                 class="nav-link  <?= ($uri->getSegment(2) == "promo") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Promo Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/info"
                                 class="nav-link  <?= ($uri->getSegment(2) == "info") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Info Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/sales"
                                 class="nav-link  <?= ($uri->getSegment(2) == "sales") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sales Management</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/utility/lokasi"
                                 class="nav-link  <?= ($uri->getSegment(2) == "lokasi") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Location Management</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "page") ? 'menu-open' : '' ?>">
                     <a href="<?= base_url() ?>/page"
                         class="nav-link  <?= ($uri->getSegment(1) == "page") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-pager"></i>
                         <p>
                             Page Management
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/page/home"
                                 class="nav-link  <?= ($uri->getSegment(2) == "home") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Page Home</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/page/about"
                                 class="nav-link  <?= ($uri->getSegment(2) == "about") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Page Tentang Kami</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/page/kontak"
                                 class="nav-link  <?= ($uri->getSegment(2) == "kontak") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Page Kontak Kami</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/page/kp"
                                 class="nav-link  <?= ($uri->getSegment(2) == "kp") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Page Kebijakan Privasi</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/page/sk"
                                 class="nav-link  <?= ($uri->getSegment(2) == "sk") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Page Syarat Dan Ketentuan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/page/bank"
                                 class="nav-link  <?= ($uri->getSegment(2) == "bank") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Page Info Bank</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "stock") ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link <?= ($uri->getSegment(1) == "stock") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-cubes"></i>
                         <p>
                             Stock Management
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/stock/index"
                                 class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Stock</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/stock/barang"
                                 class="nav-link <?= ($uri->getSegment(2) == "barang") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Barang</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/stock/kategori"
                                 class="nav-link <?= ($uri->getSegment(2) == "kategori") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kategori Barang</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/stock/jenis"
                                 class="nav-link <?= ($uri->getSegment(2) == "jenis") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Jenis Barang</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/stock/merk"
                                 class="nav-link <?= ($uri->getSegment(2) == "merk") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Merk Barang</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "transaksi") ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link <?= ($uri->getSegment(1) == "transaksi") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-wallet"></i>
                         <p>
                             Transaksi
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/transaksi/index"
                                 class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/transaksi/proses"
                                 class="nav-link <?= ($uri->getSegment(2) == "proses") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Proses</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <?php endif; ?>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "pesanan") ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link <?= ($uri->getSegment(1) == "pesanan") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-user-alt"></i>
                         <p>
                             Pesanan
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/user/index"
                                 class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Data</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/user/cart"
                                 class="nav-link <?= ($uri->getSegment(2) == "cart") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>History</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item  <?= ($uri->getSegment(1) == "user") ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link <?= ($uri->getSegment(1) == "user") ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-user-alt"></i>
                         <p>
                             User
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/user/index"
                                 class="nav-link <?= ($uri->getSegment(2) == "index") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Profile</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/user/cart"
                                 class="nav-link <?= ($uri->getSegment(2) == "cart") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>My Cart</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url() ?>/logout"
                                 class="nav-link <?= ($uri->getSegment(1) == "logout") ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Logout</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
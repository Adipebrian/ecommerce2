<!-- Navbar -->
<nav class="gr">
    <div class="cat">
        <div class="menu-toggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="menu gr hidden">
            <?php foreach (list_menu() as $l) : ?>
                <li class="nav-link">
                    <a href="#"><?= $l->menu ?> <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown gr">
                        <?php foreach (menu() as $m) : ?>
                            <?php if ($m->menu_id == $l->id) : ?>
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="<?= base_url() ?>/home/cat/<?= $m->kd_cat ?>">
                                            <h4 style="text-transform: uppercase;"><?= cat($m->kd_cat) ?></h4>
                                        </a>
                                    </li>
                                    <?php
                                    $jenis = $m->kd_jns;
                                    $jenis = explode(",", $jenis);
                                    ?>
                                    <?php foreach ($jenis as $j) : ?>
                                        <li class="dropdown-link">
                                            <a href="<?= base_url() ?>/home/jns/<?= $j ?>"><?= jns($j) ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </div>
    </div>
    <a href="<?= base_url() ?>" class="logo">
        <img src="<?= base_url() ?>/assets/img/logo.png" alt="logo" />
    </a>
    <form action="<?= base_url() ?>/home/search" class="form" method="POST">
        <?= csrf_field() ?>
        <input type="text" placeholder="Search.." name="key" />
        <button type="submit"><i class="icon_search"></i></button>
    </form>
    <div class="mobile hidden">
        <form action="<?= base_url() ?>/home/search" method="POST">
            <?= csrf_field() ?>
            <input type="text" placeholder="Search.." name="key" id="search_input" />
            <button type="submit"><i class="icon_search"></i></button>
        </form>
    </div>
    <div class="search">
        <i class="icon_search"></i>
    </div>
    <div class="chart">
        <i class="icon_chart"></i>
        <div class="menu_chart gr hidden">
            <li><a href="<?= base_url() ?>/cart">Keranjang</a></li>
        </div>
    </div>
    <div class="user">
        <i class="icon_user"></i>
        <div class="menu_user gr hidden">
            <?php if (logged_in()) : ?>
                <li><a href="<?= base_url() ?>/user/index">Dashboard</a></li>
                <li><a href="<?= base_url() ?>/logout">Logout</a></li>
            <?php else : ?>
                <li><a href="<?= base_url() ?>/login">Login</a></li>
            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- End Navbar -->
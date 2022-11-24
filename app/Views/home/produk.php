<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
  <div class="link">
    <a href="<?= base_url() ?>">Home</a> /
    <a href="<?= base_url() ?>/home/produk">Produk</a>
  </div>
  <?php if ($key) : ?>
    <div class="heading"><?= $key ?></div>
  <?php else : ?>
    <div class="heading">Produk</div>
  <?php endif; ?>
</div>
<!--====== End Info Halaman ======-->

<!--====== Product ======-->
<section class="product-all bg-style">
  <div class="nav-product">
    <div class="record">
      <p><?= ($jml > $jml_barang) ? $jml_barang : $jml ?> dari <?= count_all_produk() ?> Produk</p>
    </div>
    <ul>  
      <?php foreach ($kategori as $c) : ?>
        <li class="active"><a href="<?= base_url() ?>/home/search_product/<?= $key ?>/<?= $c->kd_cat ?>/all/all"><?= $c->kategori ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="group">
    <div class="sidebar-product">
      <div class="box">
        <div class="title">Jenis</div>
        <ul id="jenis">
          <?php if ($jns) : ?>
            <?php foreach ($jns as $x => $j) : ?>
              <li>
                <input type="checkbox" id="jns<?= $x ?>" class="jns" rel="<?= $j->kd_jns ?>" onchange="change()">
                <label for="jns<?= $x ?>"><?= jns($j->kd_jns) ?> <?= $j->kd_jns ?></label>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="box">
        <div class="title">Merk</div>
        <ul id="merk">
          <?php if ($merk) : ?>
            <?php foreach ($merk as $x => $m) : ?>
              <li>
                <input type="checkbox" id="merk<?= $x ?>" class="merk" rel="<?= $m->merk_id ?>" onchange="change()">
                <label for="merk<?= $x ?>"><?= get_merk($m->merk_id) ?><?= $m->merk_id ?></label>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>

    </div>
    <div class="content">
      <div class="boxContainer" id="result">
        <?php if ($barang) : ?>
          <?php foreach ($barang as $b) : ?>
            <a href="<?= base_url() ?>/home/detail/<?= $b->kode ?>" class="box barang" data-merk="<?= $b->merk_id ?>" data-jns="<?= $b->kd_jns ?>">
              <img src="<?= base_url() ?>/assets/img/barang/<?= $b->image1 ?>" alt="" style="object-fit: cover;" />
              <div class="title"><?= $b->nm_barang ?></div>
              <div class="harga">
                <!-- <div class="disc">Rp. 20.000.000</div> -->
                <div class="netto">Rp. <?= $b->harga ?></div>
              </div>
              <!-- <div class="cart gr">Add Cart <i class="icon_chart"></i></div> -->
            </a>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="heading">Tidak Ditemukan!</div>
        <?php endif; ?>
      </div>
      <?php if ($barang && $jml_barang > $jml && count_all_produk() > $jml) : ?>
        <a href="<?= base_url() ?>/home/search_product/<?= $key ?>/<?= $cat_key ?>/<?= $jns_key ?>/<?= $merk_key ?>/<?= $jml + 12 ?>" class="more">Load More</a>
      <?php endif; ?>
    </div>
    <div class="btn-filter"><i class="icon-filter"></i></div>
  </div>
</section>

<!--====== End Product ======-->
<!-- jQuery -->
<script src="<?= base_url() ?>/adminlte/plugins/jquery/jquery.min.js"></script>
<script>
  var jns = document.querySelectorAll('.jns');
  var jns_key = '<?= $jns_key ?>';
  jns_key = jns_key.split('--');
  for (let j = 0; j < jns.length; j++) {
    const jn = jns[j];
    for (let i = 0; i < jns_key.length; i++) {
      const e = jns_key[i];
      if (jn.getAttribute('rel') == e) {
        jn.checked = true;
      }
    }
  }
  var merk = document.querySelectorAll('.merk');
  var merk_key = '<?= $merk_key ?>';
  merk_key = merk_key.split('--');
  for (let j = 0; j < merk.length; j++) {
    const m = merk[j];
    for (let i = 0; i < merk_key.length; i++) {
      const e = merk_key[i];
      if (m.getAttribute('rel') == e) {
        m.checked = true;
      }
    }
  }

  function change() {
    var barang = document.querySelectorAll('.barang');
    var merk = document.querySelectorAll('.merk');
    var jns = document.querySelectorAll('.jns');
    var arr_jns_check = [];
    var arr_jns_notcheck = [];
    var arr_merk_check = [];
    var arr_merk_notcheck = [];

    for (let j = 0; j < jns.length; j++) {
      const jn = jns[j];
      if (jn.checked) {
        arr_jns_check.push(jn.getAttribute('rel'));
      } else {
        arr_jns_notcheck.push(jn.getAttribute('rel'));
      }
    }
    for (let i = 0; i < merk.length; i++) {
      const element = merk[i];
      if (element.checked) {
        arr_merk_check.push(element.getAttribute('rel'));
      } else {
        arr_merk_notcheck.push(element.getAttribute('rel'));
      }
    }
    if (arr_jns_check.join('--') != '') {
      var jns_result = arr_jns_check.join('--');
    } else {
      var jns_result = 'all';
    }
    if (arr_merk_check.join('--') != '') {
      var merk_result = arr_merk_check.join('--');
    } else {
      var merk_result = 'all';
    }
    window.location.href = '<?= base_url() ?>/home/search_product/<?= ($key) ? $key : 'all' ?>/<?= ($cat_key) ? $cat_key : 'all' ?>/' + jns_result + '/' + merk_result;
    
  }
  const filter = document.querySelector(".btn-filter");
  const side = document.querySelector(".sidebar-product");
  filter.addEventListener("click", function() {
    side.classList.toggle("active");
  });
</script>
<?= $this->endSection() ?>
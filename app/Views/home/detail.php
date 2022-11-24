<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>
<!--====== Info Halaman ======-->
<div class="parent gr info-hal">
      <div class="link">
        <a href="<?= base_url() ?>">Home</a> / 
        <a href="<?= base_url() ?>/home/produk">Produk</a>
      </div>
      <div class="heading"><?= $result->nm_barang ?></div>
    </div>
    <!--====== End Info Halaman ======-->

    <!--====== Product ======-->
    <section class="detail parent bg-style">
      <div class="image">
        <div class="img-display">
          <div class="img-showcase">
            <img src="<?= base_url() ?>/assets/img/barang/<?= $result->image1 ?>" alt="image">
          </div>
        </div>
        <div class="img-select">
          <div class="img-item">
            <a href="#" data-id="1">
              <img src="<?= base_url() ?>/assets/img/barang/<?= $result->image1 ?>" alt="produk">
            </a>
          </div>
        </div>
      </div>
      <div class="buy">
        <div class="box">
          <div class="stok">Stok : Tersedia</div>
          <div class="title font2"><?= $result->nm_barang ?></div>
          <ul>
            <li><b>Harga </b> : <?= $result->harga ?></li>
            <li><b>Jenis Barang </b> : <?= get_jns($result->kd_jns) ?></li>
            <li><b>Merk Barang </b> : <?= get_merk($result->merk_id) ?></li>
            <!-- <li><b>Diskon </b> : 50%</li> -->
            <!-- <li><b>Harga Diskon </b> : 50.000.000</li> -->
            <li><b>Estimasi </b> : 3-5 hari</li>
            <li><b>Jumlah </b></li>
          </ul>
          <div class="number">
            <span class="minus">-</span>
            <input type="text" value="1"/>
            <span class="plus">+</span>
          </div>
          <!-- <a href="" class="add-cart gr">
            Add Cart <i class="icon_chart"></i>
          </a> -->
          <a href="https://wa.me/+6282193360708/?text=Hallo!+Admin.+Saya+ingin+membeli+barang+<?= $result->nm_barang ?>(<?= base_url() ?>/home/detail/<?= $result->kode ?>)+Apakah+masih+ada+stok?" target="_blank" class="add-cart gr">
            Buy Now <i class="icon_chart"></i>
          </a>
        </div>
      </div>
    </section>
    <section class="des parent bg-style">
      <div class="box gr">
        <div class="heading">Detail Produk</div>
        <p>
          <?= $result->ket ?>
        </p>
      </div>
    </section>
    <!--====== End Product ======-->
<?= $this->endSection() ?>
<!--====== Promo ======-->
<section class="promo parent gr">
    <div class="title font2">gratis voucher rp.10.000</div>
    <small>Masukan email atau no. whatsapp anda disini</small>
    <form action="<?= base_url() ?>/utility/promo_add" method="POST">
        <?= csrf_field() ?>
        <input type="text" placeholder="Masukan Email/No.Whatsapp Anda.." name="noemail" />
        <button type="submit"><i class="icon_send"></i></button>
    </form>
</section>
<!--====== End Promo ======-->

<!--====== Footer ======-->
<footer class="parent">
    <div class="info">
        <img src="<?= base_url() ?>/assets/img/info/<?= $info->logo ?>" alt="logo" class="logo_footer" />
        <small>Ada Pertanyaan? Hubungi Kami!</small>
        <div class="group">
            <div class="no">
                <p><?= $info->kontak1 ?></p>
                <p><?= $info->kontak2 ?></p>
                <p><?= $info->kontak3 ?></p>
            </div>
            <img src="<?= base_url() ?>/assets/img/contact.png" alt="icon" />
        </div>
        <div class="sosmed">
            <a href="<?= $info->fb ?>">
                <img src="<?= base_url() ?>/assets/img/fb.png" alt="icon" />
            </a>
            <a href="<?= $info->ig ?>">
                <img src="<?= base_url() ?>/assets/img/ig.png" alt="icon" />
            </a>
            <a href="<?= $info->tw ?>">
                <img src="<?= base_url() ?>/assets/img/tw.png" alt="icon" />
            </a>
        </div>
    </div>
    <div class="about">
        <div class="head">Tentang Kami</div>
        <ul>
            <li><a href="<?= base_url() ?>/home/about">Tentang Kami</a></li>
            <li><a href="<?= base_url() ?>/home/kontak">Kontak Kami</a></li>
            <li><a href="<?= base_url() ?>/home/pesan">Cara Pesan</a></li>
            <li><a href="<?= base_url() ?>/home/kp">Kebijakan Privasi</a></li>
            <li><a href="<?= base_url() ?>/home/sk">Syarat dan Ketentuan</a></li>
        </ul>
    </div>
    <div class="about">
        <div class="head">Informasi</div>
        <ul>
            <li><a href="<?= base_url() ?>/home/bank">Informasi Bank</a></li>
            <li><a href="<?= base_url() ?>/home/faq">FAQ</a></li>
            <li><a href="<?= base_url() ?>/home/loker">Lowongan Kerja</a></li>
        </ul>
    </div>
    <div class="salesContainer">
        <?php foreach ($sales as $s) : ?>
            <div class="sales">
                <div class="head">Sales Partner <?= $s->sales ?></div>
                <ul>
                    <li>
                        <a href="<?= $s->shopee ?>"><img src="<?= base_url() ?>/assets/img/shopee.png" alt="icon" /></a>
                    </li>
                    <li>
                        <a href="<?= $s->tokped ?>"><img src="<?= base_url() ?>/assets/img/tokped.png" alt="icon" /></a>
                    </li>
                    <li>
                        <a href="<?= $s->lazada ?>"><img src="<?= base_url() ?>/assets/img/lazada.png" alt="icon" /></a>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="lokasi">
        <select name="lokasi" id="lokasi">
            <?php foreach ($lokasi as $l) : ?>
                <option value="<?= $l->id ?>"><?= $l->lokasi ?></option>
            <?php endforeach; ?>
        </select>
        <div class="result" id="show">
            <?php foreach ($lokasi_awal as $a) : ?>
                <div class="group">
                    <div class="title"><?= $a->tempat ?></div>
                    <p><?= $a->alamat ?></p>
                    <p>Whatsapp : <?= $a->wa ?></p>
                    <p>Telp : <?= $a->telp ?></p>
                    <p><?= $a->wkt_kerja ?></p>
                    <a href="<?= $a->maps ?>">Maps</a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="result" id="lk">
            <?php foreach ($lokasi2 as $x => $lk) : ?>
                <div class="group">
                    <div class="title"><?= $lk->tempat ?></div>
                    <p><?= $lk->alamat ?></p>
                    <p>Whatsapp : <?= $lk->wa ?></p>
                    <p>Telp : <?= $lk->telp ?></p>
                    <p><?= $lk->wkt_kerja ?></p>
                    <a href="<?= $lk->maps ?>">Maps</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</footer>
<!--====== End Footer ======-->
<!-- Back to top button -->
<a id="button-top">
    <img src="<?= base_url() ?>/assets/img/up.png" alt="">
</a>
<a id="button-wa" href="https://wa.me/+6282193360708/?text=Hallo!+Admin" target="_blank">
    <img src="<?= base_url() ?>/assets/img/wa.png" alt="">
</a>
<div class="cp">Copyright @2022</div>
<script>
    <?php foreach ($lokasi as $lk) : ?>
        document.getElementById("lokasi").onchange = function() {
            var show = document.getElementById("show");
            var lokasi = document.querySelector("#lk<?= $lk->id ?>");
            console.log(lokasi);
            if (this.value == 1) {
                show.style.display = "block";
                lokasi.style.display = "none";
            } else {
                show.style.display = "none";
                lokasi.style.display = this.value == <?= $lk->id ?> ? "block" : "none";
            }
        };
    <?php endforeach; ?>
</script>
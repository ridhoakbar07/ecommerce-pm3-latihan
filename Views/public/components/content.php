<!-- <div class="col-md-4 col-lg-3 d-none d-md-block">
    <div class="card h-100">
        <div class="card-body">
            <h5 class="fw-bold card-title">
                <i class="bi bi-list"></i> Kategori
            </h5>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Semua
                </a>
                <?php foreach ($kategoris as $kategori) { ?>
                    <a href="#" class="list-group-item list-group-item-action">
                        <?= $kategori['nama_kategori'] ?>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div> -->

<h5>Kategori</h5>
<hr>
<nav class="nav nav-pills flex-column flex-sm-row">
    <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Active</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="#">Longer nav link</a>
    <a class="flex-sm-fill text-sm-center nav-link" href="#">Link</a>
    <a class="flex-sm-fill text-sm-center nav-link disabled" aria-disabled="true">Disabled</a>
</nav>

<h5 class="mt-5">Produk Kami</h5>
<hr>
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
    <?php foreach ($produks as $produk) { ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?= $produk['foto'] ?>" class="card-img-top" alt="No Image">
                <div class="card-body">
                    <h5 class="card-title fw-bold">
                        <?= $produk['nama_produk'] ?>
                    </h5>
                    <p class="card-text">
                        <b>Rp.
                            <?= number_format($produk['harga'], 2, ".", ",") ?>
                        </b>
                        <br>
                        <small>Stock Barang :
                            <?= $produk['stock'] ?>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
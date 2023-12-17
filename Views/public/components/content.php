<div class="col-md-8 col-lg-9">
    <div class="row">
        <div class="d-flex gap-2">
            <?php foreach ($produks as $produk) { ?>
                <div class="card" style="width: 18rem">
                    <img src="<?= $produk['foto'] ?>" class="card-img-center" alt="No Image" />
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $produk['nama_produk'] ?>
                        </h5>
                        <p class="card-text">
                            <small>
                                <?= $produk['deskripsi'] ?>
                            </small>
                        <h5>Harga : Rp.
                            <?= $produk['harga'] ?>
                        </h5>
                        <small>Stock Barang :
                            <?= $produk['stock'] ?>
                        </small>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
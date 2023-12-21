<h2>Daftar Wishlist <b>Anda</b></h2>
<hr>
<div>
    <button class="btn btn-sm btn-primary float-end my-2">Checkout Semua</button>
</div>
<div class="container-fluid">
    <ol class="list-group list-group-numbered">
        <?php foreach ($wishlists as $wishlist) { ?>
            <li class="list-group-item d-flex justify-content-between align-items-start" style="height: 8rem">
                <img src="<?= $wishlist['foto'] ?>" alt="foto" class="bd-placeholder-img h-100">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        <?= $wishlist['nama_produk'] ?>
                    </div>
                    <?= $wishlist['deskripsi'] ?>
                </div>
                <a href="/" class="float-end">hapus</a>
            </li>
        <?php } ?>
    </ol>
</div>
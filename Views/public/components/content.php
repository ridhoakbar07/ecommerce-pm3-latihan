<div class="bd-example m-0 border-0 bg-light" data-bs-ride="carousel" data-bs-theme="dark">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <?php
            $i = 0;
            foreach ($produks as $index => $produk) {
                if ($produk['diskon'] > 0) { ?>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>"
                        class="<?= $i == 0 ? 'active' : '' ?>" aria-label="Slide <?= $i ?>" aria-current="true"></button>
                    <?php $i++;
                }
            } ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($produks as $index => $produk) {
                if ($produk['diskon'] > 0) { ?>
                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?> text-center" style="height: 22rem">
                        <div class="h-50 my-2">
                            <img src="<?= $produk['foto'] ?>" class="bd-placeholder-img h-100" alt="No Image">
                            <div class="position-absolute top-0 end-30 translate-middle badge rounded bg-success mt-5">
                                <small>Potongan</small>
                                <h3 class="fw-bold">
                                    <?= $produk['diskon'] ?>%
                                </h3>
                            </div>
                            <h5 class="fw-bold text-success">
                                Rp.
                                <?= number_format($produk['harga'] - ($produk['harga'] * $produk['diskon'] / 100), 2, ".", ",") ?>
                            </h5>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h2 class="fw-bold">
                                <?= $produk['nama_produk'] ?>
                            </h2>
                            <p class="m-0">
                                <?= $produk['deskripsi'] ?>
                            </p>
                            <s class="text-danger">
                                Rp.
                                <?= number_format($produk['harga'], 2, ".", ",") ?>
                            </s>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<h3 class="align-text-center text-center mt-3 fw-bold">Pilihan Kategori</h3>
<hr>
<div class="d-flex flex-row mb-3">
    <div class="p-2 ms-2 position-relative flex-fill text-center border rounded-2">
        <i class="bi bi-ui-checks-grid" style="font-size: 3rem; color: darkslategrey; display:block;"></i>
        <a href="/" class="link-secondary link-underline-opacity-0 stretched-link">
            Semua
        </a>
    </div>
    <?php foreach ($kategoris as $kategori) { ?>
        <div class="p-2 ms-2 position-relative flex-fill text-center border rounded-2">
            <i class="bi <?= $kategori['bs_icon'] ?>" style="font-size: 3rem; color: darkslategrey; display:block;"></i>
            <a href="?kategori=<?= urlencode($kategori['nama_kategori']) ?>"
                class="link-secondary link-underline-opacity-0 stretched-link">
                <?= $kategori['nama_kategori'] ?>
            </a>
        </div>
    <?php } ?>
</div>

<h3 class="align-text-center text-center mt-3 fw-bold">Produk</h3>
<hr>
<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
    <?php foreach ($produks as $produk) { ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?= $produk['foto'] ?>" class="card-img-top" alt="No Image">
                <div class="card-body">
                    <h5 class="card-title fw-bold">
                        <a href="#" type='button' data-bs-toggle='modal' data-bs-target='#produkModal'
                            class="link-secondary link-underline-opacity-0 stretched-link"
                            data-bs-id="<?= $produk['id'] ?>">
                            <?= $produk['nama_produk'] ?>
                        </a>
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
                <div class="card-footer text-end">
                    <a href="/addwish" type='button' class="link-danger link-underline-opacity-0 stretched-link"
                        style="position: relative;"><i class="bi bi-heart-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<!-- modal detail produk -->
<div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel"><span id="modal-title"></span> Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            placeholder="Nama Produk">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"
                            placeholder="Deksripsi Produk"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stock" class="col-sm-3 col-form-label">Stock</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="photo" class="col-sm-3 col-form-label">Produk Photo</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="float-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //ini javascript bagian modal
    const modalBody = $('.modal-body').html();

    $('#produkModal').on('shown.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const id = button.data('bs-id');

        $.ajax({
            url: '/api/produk/' + id,
            type: 'GET',
            success: function (response) {
                produk = response;

                $('.modal-body').html(modalBody);
                $('#id').val(produk.id || '');
                $('#nama_produk').val(produk.nama_produk || '');
                $('#deskripsi').val(produk.deskripsi || '');
                $('#harga').val(produk.harga || '');
                $('#stock').val(produk.stock || '');
            }
        });
    });
</script>
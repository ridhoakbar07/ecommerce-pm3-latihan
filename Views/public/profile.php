<header>
    <?php include 'layouts/_header.php'; ?>
</header>

<!-- ini bagian toast notifikasi -->
<?php include 'layouts/_toast.php'; ?>

<div class="container">
    <div class="offset-2 col-8 offset-2">
        <h1>Profil
            <?= $_SESSION['username'] ?>
        </h1>
        <small>Silahkan simpan untuk memperbarui profile anda</small>
        <hr />
        <form action="profile" method="POST">
            <input type="hidden" name="id" value="">
            <div class="row mb-3">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                        placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        placeholder="yyyy-mm-dd">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        placeholder="Tempat Lahir">
                </div>
            </div>
            <div class="row mb-3">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"
                        row=3></textarea>
                </div>
            </div>
            <hr />
            <div class="float-end">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'layouts/_footer.php'; ?>
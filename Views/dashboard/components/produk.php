<!-- Bootstrap Modal -->
<div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produkModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- bagian konten modal akan di isi oleh javascript dibawah -->
                <div id="modalBodyContent">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><i class="bi bi-cart me-1"></i> Daftar <small class="text-secondary">Produk</small></h4>
</div>

<div class="container-fluid">
    <div class="float-end m-2">
        <button type='button' class='btn btn-sm btn-success produk-add' data-bs-toggle='modal'
            data-bs-target='#produkModal'><i class='bi bi-plus'></i>Tambah Data</button>
    </div>
    <div class="table-responsive-sm">
        <table class="table" id="table_produk">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: '/api/kategoris',
            type: 'GET',
            success: function (response) {
                const options = response.map((item, index) => `
            <option value="${item.id}">${item.nama_kategori}</option>
        `).join('');

        console.log(options);
                // Append options to select element
                $('#kategori_select').append(options);

            },
            error: function (error) {
                console.error('Error fetching categories:', error);
            }
        });
        
        function callprodukModal(produk = { id: '', nama_produk: '', deskripsi: '', harga: 0, stock: 0, photo: '', kategori_id: 0 }) {
            $('#modalBodyContent').html(`
                <form action="produk/${produk.id ? 'update' : 'save'}" method="POST">
                    <input type="hidden" name="id" value="${produk.id}">
                    <div class="row mb-3">
                        <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="${produk.nama_produk}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deksripsi Produk">${produk.deskripsi}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="harga" name="harga" value="${produk.harga}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stock" class="col-sm-3 col-form-label">Stock</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="stock" name="stock" value="${produk.stock}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="photo" class="col-sm-3 col-form-label">Produk Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kategori_select" class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                        <select class="form-select" id="kategori_select" name="kategori_id" aria-label="Default select example">
                        </select>
                        </div>
                    </div>
                    <hr/>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-${produk.id ? 'warning' : 'success'}">${produk.id ? 'Update' : 'Simpan'}</button>
                    </div>
                </form>
            `);
        }

        $.ajax({
            url: '/api/produks',
            type: 'GET',
            success: function (response) {
                const tbody = response.map((item, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${item.nama_produk}</td>
                <td>${item.deskripsi}</td>
                <td>${item.harga}</td>
                <td>${item.stock}</td>
                <td>foto</td>
                <td>${item.kategori_id}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-warning produk-edit' data-bs-toggle='modal' data-bs-target='#produkModal' data-bs-id='${item.id}'><i class='bi bi-pencil-square'></i>Edit</button>
                    <button type='button' class='btn btn-sm btn-danger produk-delete' data-bs-toggle='modal' data-bs-target='#produkModal' data-bs-id='${item.id}'><i class='bi bi-trash'></i>Hapus</a>
                </td>
            </tr>
        `).join('');
                $('#table_produk tbody').append(tbody);

                $('.produk-add').on('click', function () {
                    callprodukModal();
                });

                $(document).on('click', '.produk-edit', function () {
                    const userId = $(this).data('bs-id');
                    const produk = response.find(item => item.id === userId);
                    callprodukModal(produk);
                });

                $('.produk-delete').on('click', function () {
                    const userId = $(this).data('bs-id');
                    const produk = response.find(item => item.id === userId);
                    $('#modalBodyContent').html(`
                    <form action="produk/delete/${produk.id}" method="POST">
                        <p>Apakah anda yakin ingin menghapus Kategori : <b class="text-danger">${produk.nama_produk}</b> ini ?</p>
                        <hr/>
                        <div class="float-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                    `);
                });
            }
        });
    });

</script>
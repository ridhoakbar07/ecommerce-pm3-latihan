<!-- Bootstrap Modal -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriModalLabel">Konfirmasi</h5>
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
    <h4><i class="bi bi-list me-1"></i> Daftar <small class="text-secondary">Kategori Produk</small></h4>
</div>

<div class="container-fluid">
    <div class="float-end m-2">
        <button type='button' class='btn btn-sm btn-success kategori-add' data-bs-toggle='modal'
            data-bs-target='#kategoriModal'><i class='bi bi-plus'></i>Tambah Data</button>
    </div>
    <div class="table-responsive-sm">
        <table class="table" id="table_kategori">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
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
        function callkategoriModal(kategori = { id: '', nama_kategori: ''}) {
            $('#modalBodyContent').html(`
                <form action="kategori/${kategori.id ? 'update' : 'save'}" method="POST">
                    <input type="hidden" name="id" value="${kategori.id}">
                    <div class="row mb-3">
                        <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="${kategori.nama_kategori}">
                        </div>
                    </div>
                    <hr/>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-${kategori.id ? 'warning' : 'success'}">${kategori.id ? 'Update' : 'Simpan'}</button>
                    </div>
                </form>
            `);
        }

        $.ajax({
            url: '/api/kategoris',
            type: 'GET',
            success: function (response) {
                const tbody = response.map((item, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${item.nama_kategori}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-warning kategori-edit' data-bs-toggle='modal' data-bs-target='#kategoriModal' data-bs-id='${item.id}'><i class='bi bi-pencil-square'></i>Edit</button>
                    <button type='button' class='btn btn-sm btn-danger kategori-delete' data-bs-toggle='modal' data-bs-target='#kategoriModal' data-bs-id='${item.id}'><i class='bi bi-trash'></i>Hapus</a>
                </td>
            </tr>
        `).join('');
                $('#table_kategori tbody').append(tbody);

                $('.kategori-add').on('click', function () {
                    callkategoriModal();
                });

                $(document).on('click', '.kategori-edit', function () {
                    const userId = $(this).data('bs-id');
                    const user = response.find(item => item.id === userId);
                    callkategoriModal(user);
                });

                $('.kategori-delete').on('click', function () {
                    const userId = $(this).data('bs-id');
                    const kategori = response.find(item => item.id === userId);
                    $('#modalBodyContent').html(`
                    <form action="kategori/delete/${kategori.id}" method="POST">
                        <p>Apakah anda yakin ingin menghapus Kategori : <b class="text-danger">${kategori.nama_kategori}</b> ini ?</p>
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
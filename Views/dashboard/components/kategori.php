<!-- Bootstrap Modal -->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
    <form method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kategoriModalLabel"><span id="modal-title"></span> Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- bagian konten modal akan di isi oleh javascript dibawah -->
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3">
                        <label for="nama_kategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                placeholder="Nama Kategori">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="float-end">
                        <button type="submit" class="invisible btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
        //saat dokumen ready, tambahkan data dari kategori ke <tbody> /tabel body
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
            }
        });
    });

    const modalBody = $('.modal-body').html();

    //saat kategoriModal muncul
    $('#kategoriModal').on('shown.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const id = button.data('bs-id');

        //ambil data kategori berdasarkan id, lalu set judul modal, dan bagian isi modalnya
        $.ajax({
            url: '/api/kategori/' + id,
            type: 'GET',
            success: function (response) {
                let title = button.hasClass('kategori-delete') ? 'Hapus' : response.id ? 'Edit' : 'Tambah';
                let formAction = "/dashboard/<?= $page ?>/" + button.hasClass('kategori-delete') ? `delete/${response.id}` : response.id ? 'update' : 'save';
                $('#modal-title').text(title);

                if (button.hasClass('kategori-delete')) {
                    $('.modal-body').html(`<p>Apakah anda yakin ingin menghapus Kategori : <b class="text-danger">${response.nama_kategori}</b> ini ?</p>`);
                } else {
                    $('.modal-body').html(modalBody);
                    $('#id').val(response['id'] || '');
                    $('#nama_kategori').val(response['nama_kategori'] || '');
                }

                $('form').attr('action', formAction);
                $('button[type="submit"]').removeClass('invisible');
                $('button[type="submit"]').text(title);
            }
        });
    });
</script>
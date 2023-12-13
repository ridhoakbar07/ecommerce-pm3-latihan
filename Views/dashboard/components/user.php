<!-- Bootstrap Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <form method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel"><span id="modal-title"></span> User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- bagian konten modal akan di isi oleh javascript dibawah -->
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-3 pt-0">Roles</legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="adminRadio" value="1">
                                <label class="form-check-label" for="adminRadio">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="userRadio" value="0">
                                <label class="form-check-label" for="userRadio">User</label>
                            </div>
                        </div>
                    </fieldset>
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
    <h4><i class="bi bi-people me-1"></i> Daftar <small class="text-secondary">Pengguna</small></h4>
</div>

<div class="container-fluid">
    <div class="float-end m-2">
        <button type='button' class='btn btn-sm btn-success ' data-bs-toggle='modal' data-bs-target='#userModal'><i
                class='bi bi-plus'></i>Tambah Data</button>
    </div>
    <div class="table-responsive-sm">
        <table class="table" id="table_user">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
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
        //saat dokumen ready, tambahkan data dari user ke <tbody> /tabel body
        $.ajax({
            url: '/api/users',
            type: 'GET',
            success: function (response) {
                const tbody = response.map((user, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.role == 1 ? "admin" : "user"}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-warning ' data-bs-toggle='modal' data-bs-target='#userModal' data-bs-id='${user.id}'><i class='bi bi-pencil-square'></i>Edit</button>
                    <button type='button' class='btn btn-sm btn-danger delete' data-bs-toggle='modal' data-bs-target='#userModal' data-bs-id='${user.id}'><i class='bi bi-trash'></i>Hapus</a>
                </td>
            </tr>
        `).join('');
                $('#table_user tbody').append(tbody);
            }
        });
    });

    const modalBody = $('.modal-body').html();

    //saat userModal muncul
    $('#userModal').on('shown.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const id = button.data('bs-id');

        //ambil data kategori berdasarkan id, lalu set judul modal, dan bagian isi modalnya
        $.ajax({
            url: '/api/user/' + id,
            type: 'GET',
            success: function (response) {
                const user = response;
                let title = button.hasClass('delete') ? 'Hapus' : user.id ? 'Edit' : 'Tambah';
                let formAction = button.hasClass('delete') ? `delete/${user.id}` : user.id ? 'update' : 'save';
                $('#modal-title').text(title);

                if (button.hasClass('delete')) {
                    $('.modal-body').html(`<p>Apakah anda yakin ingin menghapus data : <b class="text-danger">${user.username}</b> ini ?</p>`);
                } else {
                    $('.modal-body').html(modalBody);
                    $('#id').val(user.id || '');
                    $('#username').val(user.username || '');
                    $('#email').val(user.email || '');

                    if (user.role == 1) {
                        $('#adminRadio').prop('checked', true);
                    } else {
                        $('#userRadio').prop('checked', true);
                    }
                }

                $('form').attr('action', "/dashboard/<?= $page ?>/" + formAction);
                $('button[type="submit"]').removeClass('invisible');
                $('button[type="submit"]').text(title);
            }
        });
    });
</script>
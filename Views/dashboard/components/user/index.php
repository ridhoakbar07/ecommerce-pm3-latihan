<!-- Bootstrap Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Konfirmasi</h5>
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
    <h4><i class="bi bi-people me-1"></i> Daftar <small class="text-secondary">Pengguna</small></h4>
</div>

<div class="container-fluid">
    <div class="float-end m-2">
        <button type='button' class='btn btn-sm btn-success user-add' data-bs-toggle='modal'
            data-bs-target='#userModal'><i class='bi bi-plus'></i>Tambah Data</button>
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
        function callUserModal(user = { id: '', username: '', email: '', role: 0 }) {
            $('#modalBodyContent').html(`
                <form action="user/${user.id ? 'update' : 'save'}" method="POST">
                    <input type="hidden" name="id" value="${user.id}">
                    <div class="row mb-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="${user.username}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" value="${user.email}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-3 pt-0">Roles</legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="adminRadio" value="1" ${user.role == 1 ? 'checked' : ''}>
                                <label class="form-check-label" for="adminRadio">Admin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="gridRadios2" value="0" ${user.role == 0 ? 'checked' : ''}>
                                <label class="form-check-label" for="gridRadios2">User</label>
                            </div>
                        </div>
                    </fieldset>
                    <hr/>
                    <div class="float-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-${user.id ? 'warning' : 'success'}">${user.id ? 'Update' : 'Simpan'}</button>
                    </div>
                </form>
            `);
        }

        $.ajax({
            url: '/api/users',
            type: 'GET',
            success: function (response) {
                const tbody = response.map((item, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${item.username}</td>
                <td>${item.email}</td>
                <td>${item.role == 1 ? "admin" : "user"}</td>
                <td>
                    <button type='button' class='btn btn-sm btn-warning user-edit' data-bs-toggle='modal' data-bs-target='#userModal' data-bs-id='${item.id}'><i class='bi bi-pencil-square'></i>Edit</button>
                    <button type='button' class='btn btn-sm btn-danger user-delete' data-bs-toggle='modal' data-bs-target='#userModal' data-bs-id='${item.id}'><i class='bi bi-trash'></i>Hapus</a>
                </td>
            </tr>
        `).join('');
                $('#table_user tbody').append(tbody);

                $('.user-add').on('click', function () {
                    callUserModal();
                });

                $(document).on('click', '.user-edit', function () {
                    const userId = $(this).data('bs-id');
                    const user = response.find(item => item.id === userId);
                    callUserModal(user);
                });

                $('.user-delete').on('click', function () {
                    const userId = $(this).data('bs-id');
                    const user = response.find(item => item.id === userId);
                    $('#modalBodyContent').html(`
                    <form action="user/delete/${user.id}" method="POST">
                        <p>Apakah anda yakin ingin menghapus user : <b class="text-danger">${user.username}</b> ini ?</p>
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
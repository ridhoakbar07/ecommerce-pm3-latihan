<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4><i class="bi bi-people me-1"></i> Daftar <small class="text-secondary">Pengguna</small></h4>
</div>

<div class="container-fluid">
    <div class="table-responsive-sm">
        <table class="table">
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
                <?php
                $no = 0;
                foreach ($users as $user) {
                    $no++;
                    echo "
            <tr>
            <th scope='row'>$no</th>
            <td>{$user['username']}</td>
            <td>{$user['email']}</td>
            <td>" . ($user['role'] === 1 ? 'admin' : 'user') . "</td>
            <td>
                <a class='btn btn-sm btn-warning ' href='{$user['id']}/edit'><i class='bi bi-pencil-square'></i>Edit</a>
                <a class='btn btn-sm btn-danger ' href='{$user['id']}/hapus'><i class='bi bi-trash'></i>Hapus</a>
            </td>
            </tr>
            ";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
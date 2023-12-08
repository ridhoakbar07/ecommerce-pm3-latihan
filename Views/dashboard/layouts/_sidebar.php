<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary min-vh-100">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2 active" aria-current="page" href="/">
                        <i class='bi bi-house-fill me-1'></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="/dashboard/kategoris">
                        <i class='bi bi-list me-1'></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="/dashboard/produks">
                        <i class='bi bi-cart me-1'></i> Produk
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Laporan Penjualan</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <i class='bi bi-plus-circle me-1'></i>
                </a>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="#">
                        <i class='bi bi-file-earmark-text me-1'></i> Harian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="#">
                        <i class='bi bi-file-earmark-text me-1'></i> Bulanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="#">
                        <i class='bi bi-file-earmark-text me-1'></i> Tahunan
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 text-body-secondary text-uppercase">
                <span>Pengaturan</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                    <i class='bi bi-gear-wide-connected me-1'></i>
                </a>
            </h6>
            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="/dashboard/users">
                        <i class='bi bi-people me-1'></i> Users / Pengguna
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link align-items-center gap-2" href="/logout">
                        <i class='bi bi-door-closed me-1'></i> Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
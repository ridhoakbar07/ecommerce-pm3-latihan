<header>
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container'>
            <a class='navbar-brand' href='/'>
                <img src='assets/images/logo/bootstrap-logo.svg' alt='Logo' width='30' height='24'
                    class='d-inline-block align-text-top'></a>
            <form class='d-flex me-auto' role='search' method="GET">
                <input type='search' class='form-control search-hover' name='cari' placeholder='Search here...'
                    aria-label='Search' data-bs-toggle='tooltip' data-bs-placement='bottom'
                    data-bs-title='Cari Produk disini' />
            </form>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarTogglerDemo02'
                aria-controls='navbarTogglerDemo02' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarTogglerDemo02'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' href='#'>Tentang Kami</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' role='button' href='' data-bs-toggle='tooltip'
                            data-bs-placement='bottom' data-bs-title='Keranjang Saya'><i class="bi bi-cart"
                                style="font-size:18px"></i>
                            Cart
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' aria-current='page' role='button' href='/wishlist' data-bs-toggle='tooltip'
                            data-bs-placement='bottom' data-bs-title='Favorite Saya'><i class="bi bi-bag-heart"
                                style="font-size:18px"></i>
                            Wishlist
                        </a>
                    </li>
                </ul>
                <ul class='navbar-nav'>
                    <li class='nav-item'>
                        <?php
                        if (!isset($_SESSION['role_user'])) {
                            echo "
                            <a class='nav-link' aria-current='page' role='button' href='login' data-bs-toggle='tooltip'
                                data-bs-placement='bottom' data-bs-title='Login'>
                                <i class='bi bi-arrow-right-circle' style='font-size:18px'></i>
                                <span class='d-lg-none'>Login</span>
                            </a>
                            ";
                        } else {
                            echo "
                            <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'
                                aria-expanded='false'>
                                <i class='bi bi-person-badge' style='font-size:18px'></i> " . $_SESSION['username'] . "
                            </a>
                            <ul class='dropdown-menu'>
                            <li><a class='dropdown-item' href='/profile'><i class='bi bi-pencil-square' style='font-size:18px'></i> Edit Profil</a></li>
                                <li><a class='dropdown-item' href='/logout'><i class='bi bi-arrow-left-circle' style='font-size:18px'></i> Sign out</a></li>
                            </ul>
                            </li>
                            ";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
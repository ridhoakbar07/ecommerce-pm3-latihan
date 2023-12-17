<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Selamat Datang di laman ecommerce kami">
  <meta name="author" content="Ridho Akbar">
  <meta name="generator" content="Ridho Akbar">
  <meta name="theme-color" content="#712cf9">
  <title>e-Commerce</title>
  <link rel="icon" type="image/png" href="assets/images/logo/bootstrap-logo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="assets/css/app.css" />
  <!-- Your Meta Tags, Title, Stylesheets, and Other Head Content -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <?php include 'layouts/_header.php'; ?>
  </header>

  <!-- ini bagian toast notifikasi -->
  <?php include 'layouts/_toast.php'; ?>

  <main class="py-3">
    <div class="container z-0">
      <div class="row">
        <div class="col-md-4 col-lg-3 d-none d-md-block">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="fw-bold card-title">
                <i class="bi bi-list"></i> Kategori
              </h5>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                  Semua
                </a>
                <?php foreach ($kategoris as $kategori) { ?>
                  <a href="#" class="list-group-item list-group-item-action">
                    <?= $kategori['nama_kategori'] ?>
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php
        $pageMapping = [
          'content' => 'components/content.php',
          'kategori' => 'components/kategori.php',
          'user' => 'components/user.php'
        ];

        // Check if 'page' parameter is set and its value exists in the mapping array
        if (isset($page) && isset($pageMapping[$page])) {
          include_once $pageMapping[$page];
        } else {
          echo '
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Halaman Utama</h1>
          </div>
          ';
        }
        ;
        ?>
      </div>
    </div>
  </main>

  <?php include 'layouts/_footer.php'; ?>

</body>

</html>
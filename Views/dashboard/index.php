<?php
if (!isset($_SESSION['role_user']) || $_SESSION['role_user'] !== 1) {
  header('location: /403');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Selamat Datang di laman ecommerce kami">
  <meta name="author" content="Ridho Akbar">
  <meta name="generator" content="Ridho Akbar">
  <meta name="theme-color" content="#712cf9">
  <title>Dashboard | e-Commerce</title>
  <link rel="icon" type="image/png" href="/assets/images/logo/bootstrap-logo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css" />

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
  <?php include_once 'layouts/_header.php'; ?>

  <?php include 'layouts/_toast.php'; ?>

  <div class="container-fluid z-0">
    <div class="row">

      <?php include_once 'layouts/_sidebar.php'; ?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 vh-100">
        <?php
        $pageMapping = [
          'produk' => 'components/produk.php',
          'kategori' => 'components/kategori.php',
          'user' => 'components/user.php',
          'dashboard' => 'components/dashboard.php'
        ];

        //cek apakah pada saat memanggil view pada route terdapat variabel 'page' tipe array
        if (isset($page) && isset($pageMapping[$page])) {
          include_once $pageMapping[$page];
        } else {
          include_once '404.php';
        }
        ?>
      </main>
    </div>
  </div>
  <?php include 'layouts/_footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var toastElement = document.querySelector('.toast');

      if (toastElement !== null) {
        var myToast = new bootstrap.Toast(toastElement);
        myToast.show();
      }
    });
  </script>
</body>

</html>
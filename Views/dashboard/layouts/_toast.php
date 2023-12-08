<?php
$alertType = '';
$messageText = '';

//cek jika terdapat flash_message hasil AuthController->verifyLogin memiliki nilai
//maka jenis dan pesan alert/peringatan diset nilai tersebut
//sebaliknya ambil jenis pesan dari variabel $data tipe array dari contstructor lainnya
if (isset($_SESSION['flash_message'])) {
  $flashMessage = $_SESSION['flash_message'];
  unset($_SESSION['flash_message']);

  $alertType = ($flashMessage['tipe'] === 'success') ? 'success' : 'danger';
  $messageText = $flashMessage['pesan'];
}

//tampilkan pesan jika, pesan tidak kosong
if (!empty($messageText)) {
  echo "<div
  class='toast w-auto p-0 bg-$alertType text-bg-$alertType border-1 position-absolute top-10 start-50 translate-middle z-1'
  role='alert' aria-live='assertive' aria-atomic='true' data-animation='true' data-autohide='true' data-delay='200'>
  <div class='d-flex'>
    <div class='toast-body'>
      $messageText
    </div>
    <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast'
      aria-label='Close'></button>
  </div>
</div>";
}
?>
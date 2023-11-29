<header>
  <?php include 'layouts/_header.php'; ?>
</header>

<!-- ini bagian toast notifikasi -->
<?php include 'layouts/_toast.php';?>

<section class="py-3">
  <div class="container z-0">
    <div class="row">
      <div class="col-md-4 col-lg-3 d-none d-md-block">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="fw-bold card-title">
              <svg class="bi" width="20" height="20">
                <use href="#list-tasks"></use>
              </svg> Kategori
            </h5>
            <div class="list-group">
              <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                Kategori 1
              </button>
              <button type="button" class="list-group-item list-group-item-action">Kategori 2</button>
              <button type="button" class="list-group-item list-group-item-action">Kategori 3</button>
              <button type="button" class="list-group-item list-group-item-action">Kategori 4</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-9">
        <div id="carouselExampleCaptions" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555" dy=".3em">First
                  slide</text>
              </svg>
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#666"></rect><text x="50%" y="50%" fill="#444" dy=".3em">Second
                  slide</text>
              </svg>
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#555"></rect><text x="50%" y="50%" fill="#333" dy=".3em">Third
                  slide</text>
              </svg>
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="row pt-3">
      <div class="col-md-4 col-lg-3 d-none d-md-block">
        <div class="card">
          <div class="card-body">
            <h5 class="fw-bold card-title">
              <svg class="bi" width="20" height="20">
                <use href="#ticket-perforated"></use>
              </svg> Produk Diskon
            </h5>
            <div id="discountCarousel" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555"
                      dy=".3em">First slide</text>
                  </svg>
                  <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555"
                      dy=".3em">Second slide</text>
                  </svg>
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#555"
                      dy=".3em">Thrid slide</text>
                  </svg>
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#discountCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#discountCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-9">
        <div class="row my-3">
          <div class="col-auto me-auto">
            <h3 class="">Produk Terbaru</h3>
          </div>
          <div class="col-auto">
            <a class="btn btn-sm btn-primary me-1" href="#recentProduk" role="button" data-bs-slide-to="prev">
              <svg class="bi" width="20" height="20">
                <use href="#arrow-left-short"></use>
              </svg>
            </a>
            <a class="btn btn-sm btn-primary" href="#recentProduk" role="button" data-bs-slide-to="next">
              <svg class="bi" width="20" height="20">
                <use href="#arrow-right-short"></use>
              </svg>
            </a>
          </div>
          <div id="recentProduk" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card-group">
                  <div class="d-flex gap-3">
                    <div class="card">
                      <img src="assets/images/produk/contoh1.jpg" class="card-img-top" alt="headphone" height="200px" />
                      <div class="card-body">
                        <h5 class="card-title">Gelang Aboyu</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title
                          and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go Buy</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="assets/images/produk/contoh2.jpg" class="card-img-top" alt="sepatu" height="200px" />
                      <div class="card-body">
                        <h5 class="card-title">Gelang Viored</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title
                          and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go Buy</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="assets/images/produk/contoh3.jpg" class="card-img-top" alt="jam" height="200px" />
                      <div class="card-body">
                        <h5 class="card-title">Gelang test</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title
                          and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go Buy</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card-group">
                  <div class="d-flex gap-3">
                    <div class="card">
                      <img src="assets/images/produk/contoh4.jpg" class="card-img-top" alt="headphone" height="200px" />
                      <div class="card-body">
                        <h5 class="card-title">Gelang Lucky</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title
                          and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go Buy</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="assets/images/produk/contoh5.jpg" class="card-img-top" alt="sepatu" height="200px" />
                      <div class="card-body">
                        <h5 class="card-title">Gelang Raiom</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title
                          and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go Buy</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="assets/images/produk/contoh6.jpg" class="card-img-top" alt="jam" height="200px" />
                      <div class="card-body">
                        <h5 class="card-title">Gelang Kaoji</h5>
                        <p class="card-text">
                          Some quick example text to build on the card title
                          and make up the bulk of the card's content.
                        </p>
                        <a href="#" class="btn btn-primary">Go Buy</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <h5 class="text-center my-3">Produk Terlaris</h5>
          <div class="d-flex gap-3">
            <div class="card" style="width: 18rem">
              <img src="assets/images/produk/cincin.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Rp. 10.000</h5>
                <p class="card-text">Cincin</p>
              </div>
            </div>
            <div class="card" style="width: 18rem">
              <img src="assets/images/produk/gelang1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Rp. 15.000</h5>
                <p class="card-text">Gelang</p>
              </div>
            </div>
            <div class="card" style="width: 18rem">
              <img src="assets/images/produk/hp.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">Rp. 15.000</h5>
                <p class="card-text">Gantungan HP</p>
              </div>
            </div>
            <div class="card" style="width: 18rem">
              <img src="assets/images/produk/gelang2.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5 class="card-title">S&K Berlaku</h5>
                <p class="card-text">Custom</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'layouts/_footer.php'; ?>
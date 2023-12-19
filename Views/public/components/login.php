<div class="form-signin w-100 pt-5 mt-5 m-auto vh-100">
    <form action="/verifylogin" method="POST">
        <img class="mb-4" src="assets/images/logo/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="jhon@smith.com" required>
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating text-start my-3">
            <h6>Belum memiliki akun ?</h6>
            <a href="/register"><strong>klik disini untuk registrasi</strong></a>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>
</div>
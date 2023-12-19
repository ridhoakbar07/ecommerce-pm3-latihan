<div class="form-signin w-100 pt-5 mt-5 m-auto vh-100">
    <form action="/registerUser" method="POST">
        <img class="mb-4" src="assets/images/logo/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Register Akun</h1>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="mail@example.com"
                required>
            <label for="floatingEmail">Email</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username" required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"
                required>
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
    </form>
</div>
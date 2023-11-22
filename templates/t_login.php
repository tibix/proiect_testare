<form method="POST">
    <section class="gradient-custom">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                                <p class="text-dark-50 mb-5">Insert email or username, and password to log in!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="login" id="login" class="form-control form-control-lg"
                                    value="<?php if(isset($_POST['login'])) { echo $_POST['login']; } ?>" />
                                    <label class="form-label" for="login">Email/Username</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg"
                                    "<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>"/>
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-dark" href="password_reset.php">Reset Password</a></p>
                                <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="autentificare">Log In</button>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-4"></i></a>
                                    <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-4"></i></a>
                                    <a href="#!" class="text-dark"><i class="fab fa-google fa-lg mx-4"></i></a>
                                    <a href="#!" class="text-dark"><i class="fab fa-github fa-lg mx-4"></i></a>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0">Don't have an account yet? <a href="register.php" class="text-dark fw-bold">Register here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
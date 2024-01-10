<section class="gradient-custom">
    <div class="container py-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-light text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase"><?php echo _("Log In"); ?></h2>
                            <form method="POST">
                                <div class="form-outline form-white mt-4 mb-4">
                                    <input type="text" name="login" id="login" class="form-control form-control-lg"
                                    value="<?php if(isset($_POST['login'])) { echo $_POST['login']; } ?>" autofocus/>
                                    <label class="form-label" for="login"><?php echo _("Email/Username"); ?></label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg"
                                    "<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>"/>
                                    <label class="form-label" for="typePasswordX"><?php echo _("Password"); ?></label>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-dark fw-bold" href="password_reset.php"><?php echo _("Reset Password"); ?></a></p>
                                <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="autentificare"><?php echo _("Log In"); ?></button>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="https://facebook.com" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-4"></i></a>
                                    <a href="https://twitter.com" class="text-dark"><i class="fab fa-x-twitter fa-lg mx-4"></i></a>
                                    <a href="https://google.com" class="text-dark"><i class="fab fa-google fa-lg mx-4"></i></a>
                                    <a href="https://github.com" class="text-dark"><i class="fab fa-github fa-lg mx-4"></i></a>
                                </div>
                            </form>
                        </div>
                        <div>
                            <p class="mb-0"><?php echo _("Don't have an account yet? "); ?><a href="register.php" class="text-dark fw-bold"><?php echo _("Register here"); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
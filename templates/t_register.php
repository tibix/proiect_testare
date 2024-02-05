<<<<<<< HEAD
<section class="gradient-custom">
    <div class="container py-4 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card bg-light text-dark shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h2 class="fw-bold mb-4 text-uppercase">Register</h2>
                        <form name="inregistrare" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="user_name" name="user_name" class="form-control form-control-lg" 
                                        value="<?php if(isset($_POST['user_name'])) { echo $_POST['user_name']; }?>" autofocus />
                                        <label class="form-label" for="u_name">Username</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" 
                                        value="<?php if(isset($_POST['first_name'])) { echo($_POST['first_name']);}?>" />
                                        <label class="form-label" for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" 
                                        value="<?php if(isset($_POST['last_name'])) {echo($_POST['last_name']);}?>" />
                                        <label class="form-label" for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" 
                                        value="<?php if(isset($_POST['email'])) {echo($_POST['email']);} ?>" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">
                                    <select class="form-control form-control-lg" name="language" id="language">
                                        <option value="no_language" disabled selected class="text-muted"> ... select your language ...</option>
                                        <option value="en">English</option>
                                        <option value="ro">Romanian</option>
                                        <option value="hu">Hungarian</option>
                                        <option value="fr">French</option>
                                        <option value="de">German</option>
                                    </select>
                                    <label class="form-label" for="language">Preffered Language</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" 
                                        value="<?php if(isset($_POST['password'])) { echo($_POST['password']); } ?>" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" id="password_c" name="password_c" class="form-control form-control-lg" 
                                        value="<?php if(isset($_POST['password_c'])) { echo($_POST['password_c']); }?>" />
                                        <label class="form-label" for="password_c">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <div class="d-flex justify-content-center text-center pt-1">
                                    <input class="btn btn-outline-primary" type="submit" name="register" value="Register" />
                                </div>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="https://facebook.com" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-4"></i></a>
                                    <a href="https://twitter.com" class="text-dark"><i class="fab fa-x-twitter fa-lg mx-4"></i></a>
                                    <a href="https://google.com" class="text-dark"><i class="fab fa-google fa-lg mx-4"></i></a>
                                    <a href="https://github.com" class="text-dark"><i class="fab fa-github fa-lg mx-4"></i></a>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
=======
<section class="gradient-custom">
    <div class="container my-3 py-4 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card bg-light text-dark shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h2 class="fw-bold mb-4 text-uppercase">Register</h2>
                        <form name="inregistrare" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="user_name" name="user_name" class="form__data" 
                                        value="<?php if(isset($_POST['user_name'])) { echo $_POST['user_name']; }?>" autofocus />
                                        <label class="form-label" for="u_name">Username</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="first_name" name="first_name" class="form__data" 
                                        value="<?php if(isset($_POST['first_name'])) { echo($_POST['first_name']);}?>" />
                                        <label class="form-label" for="first_name">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="last_name" name="last_name" class="form__data" 
                                        value="<?php if(isset($_POST['last_name'])) {echo($_POST['last_name']);}?>" />
                                        <label class="form-label" for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="email" id="email" name="email" class="form__data" 
                                        value="<?php if(isset($_POST['email'])) {echo($_POST['email']);} ?>" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4 pb-2">
                                    <select class="form__data" name="language" id="language">
                                        <option value="no_language" disabled selected class="text-muted"> ... select your language ...</option>
                                        <option value="en">English</option>
                                        <option value="ro">Romanian</option>
                                        <option value="hu">Hungarian</option>
                                        <option value="fr">French</option>
                                        <option value="de">German</option>
                                    </select>
                                    <label class="form-label" for="language">Preffered Language</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" id="password" name="password" class="form__data" 
                                        value="<?php if(isset($_POST['password'])) { echo($_POST['password']); } ?>" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" id="password_c" name="password_c" class="form__data" 
                                        value="<?php if(isset($_POST['password_c'])) { echo($_POST['password_c']); }?>" />
                                        <label class="form-label" for="password_c">Confirm Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <div class="d-flex justify-content-center text-center pt-1">
                                    <input class="bttn btn_lg btn-green-600" type="submit" name="register" value="Register" />
                                </div>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="https://facebook.com" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-4"></i></a>
                                    <a href="https://twitter.com" class="text-dark"><i class="fab fa-x-twitter fa-lg mx-4"></i></a>
                                    <a href="https://google.com" class="text-dark"><i class="fab fa-google fa-lg mx-4"></i></a>
                                    <a href="https://github.com" class="text-dark"><i class="fab fa-github fa-lg mx-4"></i></a>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> cf24b5a644ba6b56fa56bdda014f5cee21b3e0b2
</section>
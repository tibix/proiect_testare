<?php

require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(isset($_POST['register'])){
    prety_dump($_POST);
    $errors = array();
    $db = new Database();
    $user = new User($db);

    if(isset($_POST['user_name'])) { 
        $u_name = $_POST['user_name'];
        if($user->userExists($u_name)){
            $errors[] = "Username is already in use!</br>";
        }
    } else { 
        $errors[] = "Nume utilizator invalid!</br>";
    }
    if(isset($_POST['first_name'])) { $first_name = $_POST['first_name']; } else { $errors[] = "Nume invalid!</br>"; }
    if(isset($_POST['last_name'])) { $last_name = $_POST['last_name']; } else { $errors[] = "Prenume invalid!</br>"; }
    if(isset($_POST['email'])) { 
        $email = $_POST['email'];
        if($user->emailExists($email)){
            $errors[] = "This e-mail is already registered! Reset password <a href=\"password-reset.php\" class=\"text-dark\">here</a></br>";
        }
    } else { 
        $errors[] = "Email invalid!</br>";
    }
    if(isset($_POST['password'])) { $password = $_POST['password']; } else { $errors[] = "Parola invalida!</br>"; }
    if(isset($_POST['password_c'])) { $password2 = $_POST['password_c']; } else { $errors[] = "Confirmare parola invalida!</br>"; }
    if($_POST['password'] !== $_POST['password_c']) { $errors[] = "Parolele nu coincid!</br>"; }

    if(empty($errors)){
        $now = date('Y-m-d H:i:s');

        if($user->createUser($u_name, $first_name, $last_name, $email, $password, $now)) {
            $db->close();
            redirect("login.php");
        } else {
            $errors[] = "Eroare la crearea contului! Va rugam incercati mai tarziu!";
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show text-secondary" role="alert">
        <?php
        foreach($errors as $error){
            echo  $error;
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <section class="vh-100 gradient-custom">
            <div class="container py-2 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card bg-light text-dark shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register</h3>
                                <form name="register" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="user_name" name="user_name" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['user_name'])) { echo $_POST['u_name']; } ?>" />
                                                <label class="form-label" for="user_name">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="first_name" name="first_name" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['first_name'])) { echo $_POST['first_name']; } ?>"/>
                                                <label class="form-label" for="first_name">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="last_name" name="last_name" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['last_name'])) { echo $_POST['last_name']; } ?>" />
                                                <label class="form-label" for="last_name">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="email" id="email" name="email" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4 pb-2">
                                            <select class="form-control form-control-lg" name="language" id="language">
                                                <option value="no_language" disabled selected class="text-muted">Select your preffered language ...</option>
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
                                                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="password" id="password_c" name="password_c" class="form-control form-control-lg" />
                                                <label class="form-label" for="password_c">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <div class="d-flex justify-content-center text-center pt-1">
                                            <input class="btn btn-outline-primary" type="submit" name="register" value="Register" />
                                        </div>
                                        <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                            <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-4"></i></a>
                                            <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-4"></i></a>
                                            <a href="#!" class="text-dark"><i class="fab fa-google fa-lg mx-4"></i></a>
                                            <a href="#!" class="text-dark"><i class="fab fa-github fa-lg mx-4"></i></a>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
} else {

?>
    <section class="vh-100 gradient-custom">
        <div class="container py-2 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card bg-light text-dark shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register</h3>
                            <form name="inregistrare" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="user_name" name="user_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_name">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="first_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <select class="form-control form-control-lg" name="language" id="language">
                                            <option value="no_language" disabled selected class="text-muted">Select your preffered language ...</option>
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
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="password" id="password_c" name="password_c" class="form-control form-control-lg" />
                                            <label class="form-label" for="password_c">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <div class="d-flex justify-content-center text-center pt-1">
                                        <input class="btn btn-outline-primary" type="submit" name="register" value="Register" />
                                    </div>
                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-4"></i></a>
                                        <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-4"></i></a>
                                        <a href="#!" class="text-dark"><i class="fab fa-google fa-lg mx-4"></i></a>
                                        <a href="#!" class="text-dark"><i class="fab fa-github fa-lg mx-4"></i></a>
                                    </div> 
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include 'templates/footer.php'; ?>

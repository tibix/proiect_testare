<?php
session_start();

require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(isset($_POST['autentificare'])){
    $email = NULL;
    $password = NULL;
    $errors = array();

    if(!empty($_POST['login'])) { $log_in = $_POST['login']; } else { $errors[] = "Login invalid!"; }
    if(!empty($_POST['password'])) { $password = $_POST['password']; } else { $errors[] = "Parola invalida!"; }

    $db = new Database();
    $auth = new User($db);
    $login = $auth->getUserByLogin($log_in);

    if(!empty($login)){
        if($login['password'] == md5($password)){
            // login user
            $_SESSION['user_id'] = $login['id'];
            $_SESSION['user'] = $login['u_name'];
            $_SESSION['f_name'] = $login['f_name'];
            $_SESSION['l_name'] = $login['l_name'];
            $_SESSION['email'] = $login['email'];
            $_SESSION['role'] = $login['role_type'];
            $_SESSION['loggedin'] = TRUE;
            redirect("home.php");
        } else {
            echo "<div class=\"alert alert-danger alert-dismissible text-secondary fade show\" role=\"alert\">Parola incorecta!";
            echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
        }
    } else {
        echo "<div class=\"alert alert-danger alert-dismissible text-secondary fade show\" role=\"alert\">Utilizatorul nu exista!";
        echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
    }
?>
<form method="POST">
    <section class="vh-100 gradient-custom">
        <div class="container py-2 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                                <p class="text-white-50 mb-5">Insert email or username, and password to log in!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="text" name="login" id="login" class="form-control form-control-lg"
                                    value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" />
                                    <label class="form-label" for="typeEmailX">Email/Username</label>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                    <label class="form-label" for="typePasswordX">Password</label>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="password_reset.php">Reset Password</a></p>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit" name="autentificare">Log In</button>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0">Nu aveti cont? <a href="inregistrare.php" class="text-white-50 fw-bold">Inregistrati-va aici</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<?php
} else {
?>
<form method="POST">
<section class="vh-100 gradient-custom">
    <div class="container py-2 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-light text-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Log In</h2>
                            <p class="text-dark-50 mb-5">Insert email or username, and password to log in!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" name="login" id="login" class="form-control form-control-lg" />
                                <label class="form-label" for="login">Email/Username</label>
                            </div>
                            <div class="form-outline form-dark mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <p class="small mb-5 pb-lg-2"><a class="text-secondary" href="password_reset.php">Reset Password</a></p>
                            <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="autentificare">Log In</button>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-dark"><i class="fab fa-facebook-f fa-lg mx-2"></i></a>
                                <a href="#!" class="text-dark"><i class="fab fa-twitter fa-lg mx-2"></i></a>
                                <a href="#!" class="text-dark"><i class="fab fa-google fa-lg mx-2"></i></a>
                                <a href="#!" class="text-dark"><i class="fab fa-github fa-lg mx-2"></i></a>
                            </div>
                        </div>
                        <div>
                            <p class="mb-0">Don't have an account yet? <a href="register.php" class="text-secondary fw-bold">Register here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<?php } ?>
<?php include 'templates/footer.php'; ?>

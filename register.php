<?php

require_once 'classes/Database.php';
require_once 'classes/User.php';

include 'templates/header.php';

if(isset($_POST['register'])){

    $errors = array();

    $db = new Database();
    
    if(!empty($_POST['u_name'])) { 
        $u_name = $_POST['u_name'];
        $check_u_name = "SELECT user_name FROM users WHERE user_name = '$u_name'";
        $result_u_name = $db->query($check_u_name);
        
        if($result_u_name->num_rows > 0){
            $errors[] = "Username already in use! Please choose another username.</br>";
        }

    } else { 
        $errors[] = "Username is invalid or empty!</br>";
    }
    
    if(!empty($_POST['f_name'])) { $f_name = $_POST['f_name']; } else { $errors[] = "First name is invalid or empty!</br>"; }
    if(!empty($_POST['l_name'])) { $l_name = $_POST['l_name']; } else { $errors[] = "Last name is invlid or empty!</br>"; }
    if(!empty($_POST['email'])) { 
        $email = $_POST['email'];
        $check_email = "SELECT email FROM users WHERE email = '$email'";
        $result_email = $db->query($check_email);

        if($result_email->num_rows > 0){
            $errors[] = "E-mail is already in use! Please choose another email or reset your passeword <a class=\"text-dark\" href=\"password-reset.php\">here</a></br>";
        }

    } else { 
        $errors[] = "Email is invalid or empty!</br>";
    }
    
    if(isset($_POST['language']) && $_POST['language'] != 'no_language') { $language = $_POST['language']; } else { $errors[] = "Language is invalid or empty!</br>"; }
    if(!empty($_POST['u_password'])) { $password = $_POST['u_password']; } else { $errors[] = "Password is invalid!</br>"; }
    if(!empty($_POST['u_password_c'])) { $password2 = $_POST['u_password_c']; } else { $errors[] = "Confirm password is invalid!</br>"; }
    if($_POST['u_password'] !== $_POST['u_password_c']) { $errors[] = "Passwords do not match!</br>"; }
    

    if(empty($errors)){
        // convert password to MD5 encripted string
        $password = md5($password);
        $now = date('Y-m-d H:i:s');

        $user = new User($db);

        if($user->createUser($u_name, $f_name, $l_name, $email, $password, $language, $now)) {
            $db->close();
            redirect("login.php");
        } else {
            $error[] = "Error ocurred while creating the account! Please try again later!";
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
                                                <input type="text" id="u_name" name="u_name" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['u_name'])) { echo $_POST['u_name']; } ?>" />
                                                <label class="form-label" for="u_name">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="f_name" name="f_name" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['f_name'])) { echo $_POST['f_name']; } ?>"/>
                                                <label class="form-label" for="f_name">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="l_name" name="l_name" class="form-control form-control-lg"
                                                value="<?php if(isset($_POST['l_name'])) { echo $_POST['l_name']; } ?>" />
                                                <label class="form-label" for="l_name">Last Name</label>
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
                                                <input type="password" id="u_password" name="u_password" class="form-control form-control-lg" />
                                                <label class="form-label" for="u_password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">
                                            <div class="form-outline">
                                                <input type="password" id="u_password_c" name="u_password_c" class="form-control form-control-lg" />
                                                <label class="form-label" for="u_password_c">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <div class="d-flex justify-content-center text-center pt-1">
                                            <input class="btn btn-outline-primary" type="submit" name="inregistrare" value="Register" />
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
                                            <input type="text" id="u_name" name="u_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_name">Username</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="f_name" name="f_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="f_name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="l_name" name="l_name" class="form-control form-control-lg" />
                                            <label class="form-label" for="l_name">Last Name</label>
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
                                            <input type="password" id="u_password" name="u_password" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="password" id="u_password_c" name="u_password_c" class="form-control form-control-lg" />
                                            <label class="form-label" for="u_password_c">Confirm Password</label>
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

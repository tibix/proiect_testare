<?php

DEFINE('NOW', date('Y-m-d H:i:s'));

/**
 * logged_in
 * 
 * @return boolean
 */
function logged_in(){
    if(isset($_SESSION['loggedin'])){
        $loggedin=TRUE;
        return $loggedin;
    }
}

/**
 * redirect
 *
 * @param  mixed $url
 * @return void
 */
function redirect($url)
{
    if (!headers_sent())
    {
        header('Location: '.$url);
        exit;
        }
    else
        {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

/**
 * generateToken
 * @return string $token
 */
function generateToken()
{
    $token = bin2hex(random_bytes(64));
    return $token;
}

/**
 * Function to display a prettified dump of a variable.
 *
 * @param mixed $var The variable to be dumped.
 * @return void
 */
function prety_dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * @param array $errors
 * @return void
 */
function show_errors(array $errors): void
{
    foreach ($errors as $error) {
        echo "<div class=\"alert alert-danger alert-dismissible text-secondary fade show text-center mb-1\" role=\"alert\">$error";
        echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
    }
}

function show_success($message): void
{
    echo "<div class=\"alert alert-success alert-dismissible text-secondary fade show text-center mb-1\" role=\"alert\">$message";
    echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
}

function generateRandomColor() {
    $red = mt_rand(0, 255);
    $green = mt_rand(0, 255);
    $blue = mt_rand(0, 255);

    return "'rgb($red, $green, $blue)'";
}

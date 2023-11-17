<?php

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
 *
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
    print_r($var);
    echo '</pre>';
}
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_language'])) {
        $selectedLanguage = $_POST['selected_language'];
        $_SESSION['user_language'] = $selectedLanguage;

        // Redirect to the previous page or homepage
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

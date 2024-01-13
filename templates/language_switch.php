<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected language from the form
    $selectedLanguage = $_POST['selected_language'];

    // Update the session variable
    $_SESSION['user_language'] = $selectedLanguage;
}

// Redirect back to the previous page or homepage
header('Location: ' . $_SERVER['HTTP_REFERER'] ?? 'index.php');
exit;

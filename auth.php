<?php
// Start the session at the very beginning.
session_start();

// Check if the user is logged in.
// If the 'loggedin' session variable does not exist, redirect them to the login page.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // FIX: Redirect to the admin login page using an absolute path from the site root.
    // The leading slash '/' is crucial as it prevents incorrect relative paths.
    header('Location: /admin/'); 
    exit; // Stop script execution after redirecting.
}
?>


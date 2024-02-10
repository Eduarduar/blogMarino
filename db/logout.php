<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the index page
header("Location: ../");
exit;
?>

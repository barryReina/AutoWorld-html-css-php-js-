<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to homepage after logout
header("Location: AutoWorld.php");
exit;

<?php
session_start();
session_destroy(); // Niszczy sesję

// Usuwa cookies
setcookie('username', '', time() - 3600, "/");
setcookie('password', '', time() - 3600, "/");

// Przekierowanie do strony logowania
header("Location: login.php");
exit();
?>

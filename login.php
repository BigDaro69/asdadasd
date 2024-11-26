<?php
session_start(); // Rozpocznij sesję

// Ustaw statyczne dane logowania
$validUsername = "admin"; // Użyj tutaj swojego statycznego loginu
$validPassword = "password"; // Użyj tutaj swojego statycznego hasła

// Sprawdzenie, czy formularz został przesłany
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Weryfikacja danych logowania
    if ($username === $validUsername && $password === $validPassword) {
        $_SESSION['username'] = $username; // Zapisz nazwę użytkownika w sesji

        // Jeśli zaznaczone "zapamiętaj mnie", ustaw cookie
        if ($remember) {
            setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie ważne przez 30 dni
            setcookie('password', $password, time() + (86400 * 30), "/"); // Cookie ważne przez 30 dni
        }

        // Przekierowanie do strony głównej lub innej strony po zalogowaniu
        header("Location: index.php");
        exit();
    } else {
        echo "Niepoprawny login lub hasło!";
    }
}
?>

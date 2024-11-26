<?php
$servername = "localhost";
$username = "your_username"; // Zmień na swoje dane logowania
$password = "your_password"; // Zmień na swoje dane logowania
$dbname = "rolnictwo"; // Zmień na swoją nazwę bazy danych

// Utworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobierz parametry z żądania
$task = $_GET['task'];

// Przygotowanie zapytania do bazy danych
if ($task === 'gleboka_uprawa') {
    $sql = "SELECT nazwa, moc FROM ciagniki"; // Zmień na odpowiednie zapytanie
} else {
    $sql = "SELECT nazwa, typ FROM maszyny"; // Zmień na odpowiednie zapytanie
}

$result = $conn

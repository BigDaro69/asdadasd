<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = ""; // Twoje hasło
$dbname = "baza_maszyn"; // Nazwa bazy danych

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Pobieranie danych z tabeli 'galeria'
$sql = "SELECT * FROM galeria";
$result = $conn->query($sql);

echo '<div class="gallery-container">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="gallery-item">';
        echo '<img src="' . htmlspecialchars($row['sciezka']) . '" alt="' . htmlspecialchars($row['nazwa']) . '">';
        echo '<p>' . htmlspecialchars($row['opis']) . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>Brak zdjęć w galerii.</p>';
}
echo '</div>';

// Zamknięcie połączenia
$conn->close();
?>

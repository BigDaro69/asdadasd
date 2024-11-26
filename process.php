<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "baza_maszyn"; 

// Nawiązanie połączenia z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Odbieranie danych z formularza
$task = isset($_POST['task']) ? $_POST['task'] : null;
$tractorPower = isset($_POST['tractorPower']) ? (int)$_POST['tractorPower'] : null;
$fieldSize = isset($_POST['fieldSize']) ? (float)$_POST['fieldSize'] : null;
$soilClass = isset($_POST['klasagleby']) ? $_POST['klasagleby'] : null;

// Wyświetlanie nagłówka wyników
echo "<h2>Wyniki dla zadania: " . htmlspecialchars($task) . "</h2>";

// Dopasowanie ciągników
$sqlTractors = "SELECT * FROM ciagniki WHERE moc_km >= ? ORDER BY moc_km ASC";
$stmtTractors = $conn->prepare($sqlTractors);
$stmtTractors->bind_param("i", $tractorPower);
$stmtTractors->execute();
$resultTractors = $stmtTractors->get_result();

echo "<h3>Dostępne ciągniki:</h3>";
if ($resultTractors->num_rows > 0) {
    echo '<table class="machine-table">';
    echo '<tr><th>Nazwa</th><th>Moc (KM)</th><th>Producent</th><th>Masa (kg)</th></tr>';
    while ($row = $resultTractors->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nazwa']) . "</td>";
        echo "<td>" . htmlspecialchars($row['moc_km']) . "</td>";
        echo "<td>" . htmlspecialchars($row['producent']) . "</td>";
        echo "<td>" . htmlspecialchars($row['masa_wlasna']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Brak ciągników spełniających wymagania mocy.</p>";
}

// Dopasowanie pługów
$sqlPlows = "SELECT * FROM plugi WHERE minimalna_moc_km <= ? AND maksymalna_moc_km >= ? ORDER BY szerokosc_pracy DESC";
$stmtPlows = $conn->prepare($sqlPlows);
$stmtPlows->bind_param("ii", $tractorPower, $tractorPower);
$stmtPlows->execute();
$resultPlows = $stmtPlows->get_result();

echo "<h3>Proponowane pługi:</h3>";
if ($resultPlows->num_rows > 0) {
    echo '<table class="machine-table">';
    echo '<tr><th>Nazwa</th><th>Minimalna Moc (KM)</th><th>Maksymalna Moc (KM)</th><th>Szerokość Pracy (m)</th><th>Ilość odkładnic</th></tr>';
    while ($row = $resultPlows->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nazwa']) . "</td>";
        echo "<td>" . htmlspecialchars($row['minimalna_moc_km']) . "</td>";
        echo "<td>" . htmlspecialchars($row['maksymalna_moc_km']) . "</td>";
        echo "<td>" . htmlspecialchars($row['szerokosc_pracy']) . "</td>";
        echo "<td>" . htmlspecialchars($row['ilosc_odkladnic']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Brak odpowiednich pługów dla podanej mocy ciągnika.</p>";
}

// Zamykanie połączenia z bazą danych
$stmtTractors->close();
$stmtPlows->close();
$conn->close();
?>
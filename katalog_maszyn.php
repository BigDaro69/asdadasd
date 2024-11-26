<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = ""; // Podaj swoje hasło
$dbname = "baza_maszyn"; // Nazwa bazy danych

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Pobieranie danych o ciągnikach
$sqlCiagniki = "SELECT * FROM ciagniki ORDER BY producent ASC, moc_km DESC";
$resultCiagniki = $conn->query($sqlCiagniki);

// Pobieranie danych o ciągnikach
$sqlCiagniki = "SELECT * FROM ciagniki ORDER BY producent ASC, moc_km DESC";
$resultCiagniki = $conn->query($sqlCiagniki);

echo '<table class="machine-table" style="width: 100%;">';
echo '<tr><th>Nazwa</th><th>Moc (KM)</th><th>Producent</th><th>Moment obrotowy (Nm)</th><th>Pojemność silnika (cm³)</th><th>Ilość cylindrów</th><th>Masa własna (kg)</th><th>Rozstaw osi (m)</th><th>Wydatek pompy hydraulicznej (l/min)</th><th>Udźwig tylnego TUZ (kg)</th><th>Opis</th></tr>';
if ($resultCiagniki->num_rows > 0) {
    while ($row = $resultCiagniki->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['moc_km']) . '</td>';
        echo '<td>' . htmlspecialchars($row['producent']) . '</td>';
        echo '<td>' . htmlspecialchars($row['moment_obrotowy']) . '</td>';
        echo '<td>' . htmlspecialchars($row['pojemnosc_silnika']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ilosc_cylindrow']) . '</td>';
        echo '<td>' . htmlspecialchars($row['masa_wlasna']) . '</td>';
        echo '<td>' . htmlspecialchars($row['rozstaw_osi']) . '</td>';
        echo '<td>' . htmlspecialchars($row['wydatek_pompy']) . '</td>';
        echo '<td>' . htmlspecialchars($row['udzwig_tylnego_tuza']) . '</td>';
        echo '<td>' . htmlspecialchars($row['opis']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<p>Brak ciągników w bazie danych.</p>';
}
echo '</table>';

// Pobieranie danych o pługach
$sqlPlugi = "SELECT * FROM plugi ORDER BY nazwa ASC";
$resultPlugi = $conn->query($sqlPlugi);

echo '<h2>Plugi</h2>';
echo '<table class="machine-table">';
echo '<tr><th>Nazwa</th><th>Minimalna Moc (KM)</th><th>Szerokość Pracy (m)</th><th>Ilość odkładnic</th><th>Waga (kg)</th></tr>';
if ($resultPlugi->num_rows > 0) {
    while ($row = $resultPlugi->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['minimalna_moc_km']) . '</td>';
        echo '<td>' . htmlspecialchars($row['szerokosc_pracy']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ilosc_odkladnic']) . '</td>';
        echo '<td>' . htmlspecialchars($row['waga']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<p>Brak pługów w bazie danych.</p>';
}
echo '</table>';
// Pobieranie danych o siewnikach
$sqlSiewniki = "SELECT * FROM siewniki ORDER BY nazwa ASC";
$resultSiewniki = $conn->query($sqlSiewniki);

echo '<h2>Siewniki</h2>';
echo '<table class="machine-table" style="width: 100%;">';
echo '<tr><th>Nazwa</th><th>Szerokość robocza (m)</th><th>Wysiew</th><th>Ilość redlic wysiewających</th><th>Pojemność zbiornika (l)</th><th>Rodzaj napędu</th></tr>';
if ($resultSiewniki->num_rows > 0) {
    while ($row = $resultSiewniki->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['szerokosc_robocza']) . '</td>';
        echo '<td>' . htmlspecialchars($row['wysiew']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ilosc_redlic']) . '</td>';
        echo '<td>' . htmlspecialchars($row['pojemnosc_zbiornika']) . '</td>';
        echo '<td>' . htmlspecialchars($row['rodzaj_napedu']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<p>Brak siewników w bazie danych.</p>';
}
echo '</table>';

// Pobieranie danych o kultywatorach
$sqlKultywatory = "SELECT * FROM kultywatory ORDER BY nazwa ASC";
$resultKultywatory = $conn->query($sqlKultywatory);

echo '<h2>Kultywatory</h2>';
echo '<table class="machine-table" style="width: 100%;">';
echo '<tr><th>Nazwa</th><th>Szerokość robocza (m)</th><th>Ilość belek</th><th>Ilość zębów</th><th>Waga (kg)</th><th>Rodzaj wału</th></tr>';
if ($resultKultywatory->num_rows > 0) {
    while ($row = $resultKultywatory->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
        echo '<td>' . htmlspecialchars($row['szerokosc_robocza']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ilosc_belek']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ilosc_zebow']) . '</td>';
        echo '<td>' . htmlspecialchars($row['waga']) . '</td>';
        echo '<td>' . htmlspecialchars($row['rodzaj_walu']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<p>Brak kultywatorów w bazie danych.</p>';
}
echo '</table>';

            // Pobieranie danych o talerzówkach
            $sqlTalerzowki = "SELECT * FROM talerzowki ORDER BY nazwa ASC";
            $resultTalerzowki = $conn->query($sqlTalerzowki);

            echo '<h2>Talerzówki</h2>';
            echo '<table class="machine-table" style="width: 100%;">';
            echo '<tr><th>Nazwa</th><th>Szerokość robocza (m)</th><th>Ilość rzędów talerzy</th><th>Waga (kg)</th><th>Zapotrzebowanie na moc (KM)</th><th>Rodzaj wału</th></tr>';
            if ($resultTalerzowki->num_rows > 0) {
                while ($row = $resultTalerzowki->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['szerokosc_robocza']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['ilosc_rzedow_talerzy']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['waga']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['zapotrzebowanie_moc']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['rodzaj_walu']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<p>Brak talerzówek w bazie danych.</p>';
            }
            echo '</table>';
             // Pobieranie danych o rozrzutnikach obornika
             $sqlRozrzutniki = "SELECT * FROM rozrzutniki ORDER BY nazwa ASC";
             $resultRozrzutniki = $conn->query($sqlRozrzutniki);
 
             echo '<h2>Rozrzutniki Obornika</h2>';
             echo '<table class="machine-table" style="width: 100%;">';
             echo '<tr><th>Nazwa</th><th>Ładowność (t)</th><th>Szerokość rozrzutu (m)</th><th>Zapotrzebowanie na moc (KM)</th></tr>';
             if ($resultRozrzutniki->num_rows > 0) {
                 while ($row = $resultRozrzutniki->fetch_assoc()) {
                     echo '<tr>';
                     echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
                     echo '<td>' . htmlspecialchars($row['ladownosc']) . '</td>';
                     echo '<td>' . htmlspecialchars($row['szerokosc_rozrzutu']) . '</td>';
                     echo '<td>' . htmlspecialchars($row['zapotrzebowanie_moc']) . '</td>';
                     echo '</tr>';
                 }
             } else {
                 echo '<p>Brak rozrzutników obornika w bazie danych.</p>';
             }
             echo '</table>';
             // Pobieranie danych o rozsiewaczach nawozu
            $sqlRozsiewacze = "SELECT * FROM rozsiewacze ORDER BY nazwa ASC";
            $resultRozsiewacze = $conn->query($sqlRozsiewacze);

            echo '<h2>Rozsiewacze Nawozu</h2>';
            echo '<table class="machine-table" style="width: 100%;">';
            echo '<tr><th>Nazwa</th><th>Zapotrzebowanie na moc (KM)</th><th>Szerokość robocza (m)</th><th>Pojemność (l)</th></tr>';
            if ($resultRozsiewacze->num_rows > 0) {
                while ($row = $resultRozsiewacze->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['zapotrzebowanie_moc']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['szerokosc_robocza']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['pojemnosc']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<p>Brak rozsiewaczy nawozu w bazie danych.</p>';
            }
            echo '</table>';
            // Pobieranie danych o przyczepach
            $sqlPrzyczepy = "SELECT * FROM przyczepy ORDER BY nazwa ASC";
            $resultPrzyczepy = $conn->query($sqlPrzyczepy);

            echo '<h2>Przyczepy</h2>';
            echo '<table class="machine-table" style="width: 100%;">';
            echo '<tr><th>Nazwa</th><th>Ładowność (t)</th><th>Zapotrzebowanie na moc (KM)</th><th>Ilość osi</th></tr>';
            if ($resultPrzyczepy->num_rows > 0) {
                while ($row = $resultPrzyczepy->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['nazwa']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['ladownosc']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['zapotrzebowanie_moc']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['ilosc_osi']) . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<p>Brak przyczep w bazie danych.</p>';
            }
            echo '</table>';



// Zamknięcie połączenia z bazą
$conn->close();
?>

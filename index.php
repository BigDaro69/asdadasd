<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Doboru Maszyn Rolniczych</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>System Doboru Maszyn Rolniczych</h1>
        </div>

        <div class="sidebar">
            <ul>
                <li><a href="#home" onclick="openSection('home')">Strona główna</a></li>
                <li><a href="#selection" onclick="openSection('selection')">Dobór maszyn</a></li>
                <li><a href="#machines" onclick="openSection('machines')">Maszyny</a></li>
                <li><a href="#gallery" onclick="openSection('gallery')">Galeria</a></li>
                <li><a href="#logowanie" onclick="openSection('logowanie')">Logowanie</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div id="home" class="section active">
                <h1>Witamy w Systemie Doboru Maszyn Rolniczych</h1>
                <p>Nasza aplikacja pozwala na dobór odpowiednich maszyn do prac polowych, oferując pełen katalog maszyn i ciągników.</p>
                
            </div>

            <div id="selection" class="section">
                <h2>Dobór Maszyn</h2>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="task">Praca do wykonania:</label>
                        <select name="task" id="task" required>
                            <option value="">-- Wybierz czynność --</option>
                            <option value="orka">Orka</option>
                            <option value="siew">Siew</option>
                            <option value="gleboka_uprawa">Uprawa Głęboka</option>
                            <option value="plytka_uprawa">Uprawa Płytka</option>
                            <option value="nawozenie_organiczne">Nawożenie Organiczne</option>
                            <option value="nawozenie_mineralne">Nawożenie Mineralne</option>
                            <option value="transport">Transport</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tractorPower">Moc ciągnika (KM):</label>
                        <input type="number" name="tractorPower" id="tractorPower" placeholder="Podaj moc ciągnika" required>
                    </div>

                    <div class="form-group">
                        <label for="fieldSize">Areał wykonywanej pracy(ha):</label>
                        <input type="number" name="fieldSize" id="fieldSize" placeholder="Podaj powierzchnię pola" required>
                    </div>

                    <div class="form-group">
                        <label for="additionalOptions">Klasa gleby</label>
                        <input type="text" name="klasagleby" id="klasagleby" placeholder="Klasa gleby">
                    </div>

                    <button type="submit" class="submit-button">Oblicz</button>
                </form>
            </div>

            <div id="machines" class="section">
                <h2>Katalog Maszyn</h2>
                <?php include 'katalog_maszyn.php'; ?>
                
            </div>

            

            <div id="gallery" class="section">
                <h2>Galeria</h2>
                <?php include 'galeria.php'; ?>
                
                
                
                
            </div>

            <div id="logowanie" class="section">
                <h2>Logowanie</h2>
                    <form action="login.php" method="POST">
                        <label for="username">Login:</label>
                        <input type="text" name="username" id="username" required>

                        <label for="password">Hasło:</label>
                        <input type="password" name="password" id="password" required>

                        <label>
                            <input type="checkbox" name="remember" id="remember"> Zapamiętaj mnie
                        </label>

                        <button type="submit" class="submit-button">Zaloguj się</button>
                    </form>
            </div>
        </div>
        <footer class="footer">
                <p>© 2024 Antoni Pol</p>
        </footer>
        <script src="script.js"></script>
        


    
</body>
</html>

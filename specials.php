<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speciale Recepten</title>
    <!-- Link naar extern CSS-bestand -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <h1>Recepten Webapplicatie</h1>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Recepten.php">Recepten</a></li>
                <li><a href="specials.php">Specials</a></li>
            </ul>
        </nav>
    </header>

    <section class="specials">
        <h2>Speciale Recepten</h2>
        <?php
        // Verbinding maken met de database en het recept met de langste duur ophalen
        require "database.php";

        $query = "SELECT * FROM menuitem ORDER BY Duur DESC LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Weergeven van het recept met de langste duur
            $row = mysqli_fetch_assoc($result);
            echo "<div class='recipe'>";
            echo "<h3>" . $row['Titel'] . "</h3>";
            echo "<img src='" . $row['Afbeelding'] . "' alt='" . $row['Titel'] . "' />";
            echo "<p>Duur: " . $row['Duur'] . " minuten</p>";
            echo "<p>Aantal ingrediënten: " . $row['Aantal_ingredienten'] . "</p>";
            echo "<p>Menugang: " . $row['Menugang'] . "</p>";
            echo "</div>";
        }
        ?>
    </section>
    <section>
        <?php
        // Verbinding maken met de database en het recept met de langste duur ophalen
        require "database.php";

        $query = "SELECT * FROM menuitem ORDER BY Aantal_ingredienten DESC LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);
            echo "<div class='recipe'>";
            echo "<h3>" . $row['Titel'] . "</h3>";
            echo "<img src='" . $row['Afbeelding'] . "' alt='" . $row['Titel'] . "' />";
            echo "<p>Duur: " . $row['Duur'] . " minuten</p>";
            echo "<p>Aantal ingrediënten: " . $row['Aantal_ingredienten'] . "</p>";
            echo "<p>Menugang: " . $row['Menugang'] . "</p>";
            echo "</div>";
        }
        ?>
    </section>
    <section>
    <?php
    // Verbinding maken met de database en het recept met de langste duur ophalen
    require "database.php";

    $query = "SELECT AVG(Aantal_ingredienten) AS avg_ingredienten FROM menuitem";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        
        echo "<p>avg_ingredienten: " . $row['avg_ingredienten'] . "</p>";
        
    }
    ?>
    </section>
    <footer>
        &copy; 2024 Recepten Webapplicatie. Alle rechten voorbehouden.
    </footer>
</body>
$query = "SELECT AVG(Aantal_ingredienten) AS avg_ingredienten FROM menuitem";
</html>
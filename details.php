<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marrokaanse Keuken - Home</title>
    <!-- Link naar extern CSS-bestand -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Marrokaanse Keuken</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="recept.php">Recepten</a></li>
            <li><a href="specials.php">Specials</a></li>
        </ul>
    </nav>
    <?php
    require 'database.php';

    // Query om het aantal recepten in de database op te halen
    $query = "SELECT COUNT(*) AS total_recipes FROM gerechten";
    $result = mysqli_query($conn, $query);

    // Controleren of de query succesvol is uitgevoerd
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total_recipes = $row['total_recipes'];
        echo "<p>Aantal recepten in de database: " . $total_recipes . "</p>";
    }

    // Query om de namen en foto's van de recepten op te halen
    $query = "SELECT gerecht_id, naam, foto FROM gerechten";
    $result = mysqli_query($conn, $query);

    // Controleren of de query succesvol is uitgevoerd
    if ($result && mysqli_num_rows($result) > 0) {
        // Itereren over de resultaten en de foto's weergeven
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='recept'>";
            echo "<a href='detail.php?id=" . $row['gerecht_id'] . "'>";
            echo "<img src='" . $row['foto'] . "' alt='" . $row['naam'] . "' class='recept-foto'>";
            echo "<p class='recept-naam'>" . $row['naam'] . "</p>";
            echo "</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Geen recepten gevonden.</p>";
    }
    ?>
    <section>
        <h2>Welkom bij onze Recepten Webapplicatie!</h2>
        <p>Ontdek heerlijke recepten en laat je inspireren om zelf aan de slag te gaan in de keuken.</p>
        <!-- Hier kun je meer secties met inhoud toevoegen -->
    </section>
    <section>
        <h2>Nieuwe Recepten</h2>
        <p>Hier komen de nieuwste recepten die toegevoegd zijn aan onze collectie.</p>
    </section>
    <footer>
        &copy; 2024 Recepten Webapplicatie. Alle rechten voorbehouden.
    </footer>
</body>

</html>
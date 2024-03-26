<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten Webapplicatie</title>
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
        <?php

        require 'database.php';




        // Query om het aantal recepten in de database op te halen
        $query = "SELECT COUNT(*) AS total_recipes FROM menuitem";
        $result = mysqli_query($conn, $query);

        // Controleren of de query succesvol is uitgevoerd
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_recipes = $row['total_recipes'];
            echo "<p>Aantal recepten in de database: " . $total_recipes . "</p>";
        }

        $query = "SELECT Titel, Afbeelding FROM menuitem";
        $result = mysqli_query($conn, $query);




        ?>

        <h2>Recepten Overzicht</h2>
        <?php
        require "database.php";

        

        $query = "SELECT menuid, titel, Afbeelding FROM menuitem";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Weergeven van elk recept
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='recipe'>";
                echo "<a href='details.php?id=" . $row['menuid'] . "'>";
                echo "<h3>" . $row['titel'] . "</h3>";
                echo "<img src='" . $row['Afbeelding'] . "' alt='" . $row['titel'] . "' />";
                echo "</a>";
                echo "</div>";
            }
        }
        ?>

    </header>
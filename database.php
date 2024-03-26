<?php
        // Databaseverbinding maken (vervang 'localhost', 'username', 'password' en 'database' door de juiste waarden)
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'canadese restaurant';

        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name); 
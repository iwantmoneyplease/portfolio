<?php

    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"]);
    if(!$conn) 
    {
        displayMsg("error", "Wrong password for database");
        exit();
    }
    else
    {
        $sql = "CREATE DATABASE " . $_POST["dbname"];
        try
        {
            $conn->query($sql);
            displayMsg("success", "Database created successfully");
        }
        catch(mysqli_sql_exception $e)
        {
            displayMsg("error", "Database already exists";)
        }
    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbdatabase"]);

    if(!$conn)
    {
        displayMsg("error", "Wrong password for database");
        exit();
    }
    else
    {
        displayMsg("success", "make more tables NOW");

        $content = "";
        foreach ($env as $key => $value) {
            $content .= "{$key}={$value}\n";
        }
        $file = __DIR__ . '/.env';
        if (file_put_contents($file, $content)) {
            echo ".env file created successfully at {$file}";
        } else {
            echo "Error creating .env file.";
        }

        $sql = "CREATE TABLE IF NOT EXISTS project(
            project_id INT AUTO_INCREMENT PRIMARY KEY,
            project_name VARCHAR(100) NOT NULL,
            project_info VARCHAR(500) NOT NULL,
            project_link VARCHAR(100),
            project_thumbnail VARCHAR(100)
            ) CHARSET=utf8mb4";
        $createProject = $conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS images(
            image_id INT AUTO_INCREMENT PRIMARY KEY,
            project_id INT NOT NULL,
            images_url VARCHAR(100) NOT NULL
            ) CHARSET=utf8mb4";
        $createImages = $conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS categories(
            cat_id INT AUTO_INCREMENT PRIMARY KEY,
            cat_name VARCHAR(100) NOT NULL
            ) CHARSET=utf8mb4";
        $createCategories = $conn->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS cat_relations(
            cat_id INT NOT NULL,
            project_id INT NOT NULL
            ) CHARSET=utf8mb4";
        $createRelations = $conn->query($sql);

    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbdatabase"]);


    /**
     * Här vill jag att ni fortsätter, ni ska
     * 1. Skapa en databas.
     * 2. Skapa tabeller
     * 3. Lägga in eventuell dummy data som behövs direkt
     * 4. Skapa en användare i users-tabellen
     * 4. Skapa en .env som vi använder i fortsättningen.
     * https://www.w3schools.com/php/php_mysql_create_table.asp
     */
?>

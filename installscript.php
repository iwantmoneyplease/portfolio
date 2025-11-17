<?php
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"]);
    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } else {

        $sql = "CREATE DATABASE IF NOT EXISTS " . $_POST["dbname"];
        try {
            $conn->query($sql);
            displayMsg("success", "Database created successfully");
        } catch(mysqli_sql_exception $e){
            displayMsg("error", "Database already exists");
        }

    }
    $conn->close();
    $conn = mysqli_connect($_POST["host"], $_POST["dbuser"], $_POST["dbpass"], $_POST["dbname"]);
    if(!$conn) {
        displayMsg("error", "Wrong passowrd for database");
        exit();
    } else {
        displayMsg("success", "make tabels plz");

        include_once("../../template/maketable.php");

        $stmt = $conn->prepare("
            INSERT INTO info (name, url, telefon, email, discord, about, image, welcome)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $name = "Namn på sidan";
        $url = $_SERVER["HTTP_HOST"];
        $telefon = "070 111 22 33";
        $email = "viktortesterberg@test.ga.lbtest.teste";
        $discord = "";
        $about = "Om text";
        $image = "";
        $welcome = "Kort underrubrik";

        $stmt->bind_param("ssssssss", $name, $url, $telefon, $email, $discord, $about, $image, $welcome);

        if ($stmt->execute()) {
            displayMsg("success", "Data tillagd i info. Uppdatera sen");
        } else {
            displayMsg("error", "Kunde inte lägga till info");
        }

        $stmt = $conn->prepare("
            INSERT INTO users (username, password, role)
            VALUES (?, ?, ?)
        ");

        $user = $_POST["admin"];
        $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $role = "admin";

        $stmt->bind_param("sss", $user, $pass, $role);

        if ($stmt->execute()) {
            displayMsg("success", "Användare tillagd.");
        } else {
            displayMsg("error", "Kunde inte lägga till användare");
        }
        makeEnv();

    }

    function makeTabel($conn, $sql, $name) {
        try {
            $conn->query($sql);
            displayMsg("success", "Tabel " . $name . " created successfully");
        } catch(mysqli_sql_exception $e){
            displayMsg("error",  $name . " already exists");
        }
    }

    function makeEnv(){
        $env = [
            'DB_HOST' => $_POST["host"],
            'DB_PORT' => '3306',
            'DB_DATABASE' => $_POST["dbname"],
            'DB_USER' => $_POST["dbuser"],
            'DB_PASSWORD' => $_POST["dbpass"],
        ];
        $content = "";
        foreach ($env as $key => $value) {
            $content .= "{$key}={$value}\n";
        }

        $file = __DIR__ . '/.env';
        if (file_put_contents($file, $content)) {
            displayMsg("success", "All done");
        } else {
            echo "Något knas";
        }

        echo '<a href="/"> Gå tillbaka</a>';
    }
?>


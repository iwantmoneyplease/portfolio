<?php
    $sql = "CREATE TABLE project (
        project_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        info VARCHAR(500),
        url VARCHAR(100),
        thumbnail VARCHAR(100)
    );";
    makeTabel($conn, $sql, "project");


    $sql = "CREATE TABLE images (
        image_id INT AUTO_INCREMENT PRIMARY KEY,
        project_id INT,
        url VARCHAR(100)
    );";

    makeTabel($conn, $sql, "images");


    $sql = "CREATE TABLE categories (
        cat_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100)
    );";
    makeTabel($conn, $sql, "categories");

    $sql = "CREATE TABLE cat_relations (
        cat_id INT,
        project_id INT,
    );";
    makeTabel($conn, $sql, "cat_relations");

    $sql = "CREATE TABLE info (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        url VARCHAR(50),
        telephone VARCHAR(50),
        email VARCHAR(50),
        discord VARCHAR(50),
        about VARCHAR(500),
        image VARCHAR(100),
        welcome VARCHAR(500)
    )";

    makeTabel($conn, $sql, "info");


    $sql = "CREATE TABLE users (
        username VARCHAR(100) PRIMARY KEY,
        password VARCHAR(200) NOT NULL,
        role VARCHAR(100)
    );";

    makeTabel($conn, $sql, "users");

?>
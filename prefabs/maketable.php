<?php
    $sql = "CREATE TABLE IF NOT EXISTS project (
        project_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        info VARCHAR(500),
        url VARCHAR(100),
        thumbnail VARCHAR(100)
    )";
    makeTabel($conn, $sql, "project");


    $sql = "CREATE TABLE IF NOT EXISTS images (
        image_id INT AUTO_INCREMENT PRIMARY KEY,
        project_id INT NOT NULL,
        url VARCHAR(100)
    )";

    makeTabel($conn, $sql, "images");


    $sql = "CREATE TABLE IF NOT EXISTS categories (
        cat_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100)
    )";
    makeTabel($conn, $sql, "categories");

    $sql = "CREATE TABLE IF NOT EXISTS cat_relations (
        cat_id INT NOT NULL,
        project_id INT NOT NULL
    )";
    makeTabel($conn, $sql, "cat_relations");

    $sql = "CREATE TABLE IF NOT EXISTS info (
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


    $sql = "CREATE TABLE IF NOT EXISTS users (
        username VARCHAR(100) PRIMARY KEY,
        password VARCHAR(200) NOT NULL,
        role VARCHAR(100)
    )";
    makeTabel($conn, $sql, "users");

?>
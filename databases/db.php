<?php

require_once('../include/config.php');




//  create the "admin" table
$sql = "CREATE TABLE `admin` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(30) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) UNIQUE NOT NULL
)";





//  insert data into the "admin" table
$query = "INSERT INTO `admin` (`name`, `email`, `password`) 
    VALUES ('Fahd Gamal', 'fahd@gmail.com', 'password123')";





//  create the "course" table
$sql = "CREATE TABLE `course` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    description TEXT NOT NULL,
    admin_id INT(6) UNSIGNED,
    FOREIGN KEY (admin_id) REFERENCES admin(id)
)";





 //create the "user" table
$sql = "CREATE TABLE `user` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(30) NOT NULL,
    `last_name` VARCHAR(30) NOT NULL,
    `email` VARCHAR(50) UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `admin_id` INT(6) UNSIGNED,
    FOREIGN KEY (admin_id) REFERENCES admin(id)
)";





$query = "INSERT INTO user (first_name, last_name, email, password, admin_id) 
        VALUES ('Mahmoud', 'Hafez', 'mamoud@gmail.com', 'Hafaz123456', '')";




// create the "instructor" table
$sql = "CREATE TABLE `instructor` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `specialty` VARCHAR(50) NOT NULL,
    `admin_id` INT(6) UNSIGNED,
    `course_id` INT(6) UNSIGNED,
    FOREIGN KEY (admin_id) REFERENCES `admin(id)`,
    FOREIGN KEY (course_id) REFERENCES `course(id)`
)";





mysqli_query($config, $sql , $query);

mysqli_close($config);
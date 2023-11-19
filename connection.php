<?php
$conn = mysqli_connect("localhost", "root", "", "project_managment");
if (!$conn) {
    echo "Database Connection Error";
} else {
}
session_start();

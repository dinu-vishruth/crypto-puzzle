<?php
include "config.php";

if ($conn) {
    echo "Database connected successfully!";
} else {
    echo "Database connection failed: " . mysqli_connect_error();
}
?>

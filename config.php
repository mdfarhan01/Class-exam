<?php

$connect = mysqli_connect("localhost","root", "", "products");

$is_connect = false;


if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
 


?>
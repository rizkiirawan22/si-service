<?php

$host = "localhost";
$username = "root";
$pass = "";
$db = "si_service_dwirizki";

$conn = mysqli_connect($host, $username, $pass, $db);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

<?php
const host = 'localhost';
const username = 'root';
const password = '';
const database = 'caochinhan';
$conn =  new mysqli(host, username, password, database);
mysqli_set_charset($conn, 'utf8');
session_start();
if ($conn->connect_error) {
    var_dump($conn->$connect_error);
    die();
}
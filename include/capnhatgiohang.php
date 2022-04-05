<?php
    include '../config/connect.php';

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $query = mysqli_query($conn,"UPDATE giohang SET  soluong = '$quantity' WHERE id = '$id' ");
        if($query) {
            header('location: giohang.php');
        }
    }


?>
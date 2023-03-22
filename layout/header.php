<?php

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$product = mysqli_query($conn, "SELECT product.*,danhmuc.ten_danhmuc as 'ten_danhmuc'  FROM product JOIN danhmuc ON product.id_danh_muc =
danhmuc.id_danhmuc WHERE product.ten_sanpham LIKE '%$keyword%' ");

$danhmuc = mysqli_query($conn, "SELECT * FROM danhmuc ");
// if($product) {
//     header('location: product.php');
// }else {
// }
if (isset($user['id'])) {
    $id_user = $user['id'];

    $giohang = mysqli_query($conn, "SELECT * FROM giohang WHERE id_user = '$id_user'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web bán hàng điện tử PHẠM DANH VINH</title>
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/style-index.css">
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <!-- <div class="container-fluid"></div> -->
    <div class="jumbotron text-center slogan" style="margin:0;background-color: #c69a39;">
        <div class="row d-flex align-items-center">
            <div class="col-sm-4 ">
                <a href="?pages=home" data-toggle="tooltip" title="về trang chủ!"> <img
                        src="https://cdn.mobilecity.vn/mobilecity-vn/images/2022/12/w300/mobilecity.png.webp"
                        alt=""></a>
            </div>
            <div class="col-sm-3">
                <form action="" method="GET">
                    <input type="hidden" name="pages" value="product">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit"><img src="images/icon/search.png"
                                    style="width: 20px;" alt=""></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <!--  -->
        <a data-toggle="tooltip" title="Tham quan các sản phẩm của chúng tôi!" class="navbar-brand header-infor-brand"
            href="?page=index">DANH VINH STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse " id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav">
                    <?php if (isset($user['name'])) { ?>
                    <a href="?pages=users">
                        <li class="nav-item" style="color: white; font-size: 18px;">
                            <?= $user['name']; ?>&nbsp;&nbsp;&nbsp; </li>
                    </a>
                    <a href="?pages=giohang" style="color: white; ">Giỏ hàng<i class="fas fa-shopping-cart"></i>
                        <span
                            class="badge badge-secondary badge-pill"><?php echo mysqli_num_rows($giohang); ?></span>&nbsp;&nbsp;&nbsp;</a>
                    <a href="include/logout.php" style="color: white; "> Đăng xuất&nbsp;<i
                            class="fas fa-sign-out-alt"></i></a>
        </div>
        <?php } else { ?>

        <li class="nav-item ">
            <a class="nav-link position-relative" href="?pages=viewCart" data-toggle="tooltip" data-placement="top"
                title="Giỏ hàng">
                <p class="cart-number"><?php
                                        $totalQuantity = 0;
                                        if (isset($_SESSION['cart'])) {
                                            $cart = $_SESSION['cart'];
                                            foreach ($cart as $item) {
                                                $totalQuantity += $item['quantity'];
                                            }
                                        }
                                        echo  $totalQuantity;
                                        ?></p>
                <i class="fa fa-cart-plus" style="color: white; font-size: 25px;"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?pages=dangnhap">Đăng nhập</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?pages=dangky">Đăng ký</a>
        </li>
        </div>
        <?php } ?>
        </ul>
        </ul>
        </div>
    </nav>
    </form>
    <div class="overflow">
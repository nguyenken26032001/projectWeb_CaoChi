<?php
$carts = $_SESSION['productBuy'];
// print_r("<pre>");
// print_r($carts);
// print_r("</pre>");
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'][0];
}
$totalProduct = sizeof($carts);
$trangthai = 0;
if (isset($_POST['submit'])) {
    $phone = '0' . $_POST['phone'];
    $diachi = $_POST['diachi'];
    $name_nguoiDatHang = $_POST['name'];
    $ghichu = $_POST['ghichu'] ? $_POST['ghichu'] : "";
    $thanhtoan = $_POST['thanhtoan'];
    $id_user = $_POST['id_user'];
    $rd_mahang = 'DANHVINHSTORE-haTinh';
    // $ma_donhang = '01' . substr(str_shuffle($rd_mahang), 0, 10);
    $ma_donhang = $rd_mahang . '-' . uniqid();
    $diachi_donhang = mysqli_query($conn, "INSERT INTO diachi_donhang(ma_donhang,id_user,phone,diachi,ghichu,thanhtoan,trang_thai,name_nguoidat)
  VALUES('$ma_donhang','$id_user','$phone','$diachi','$ghichu','$thanhtoan','$trangthai','$name_nguoiDatHang')");
    if ($diachi) {
        for ($i = 0; $i < count($_POST['id_product']); $i++) {
            $id_product = $_POST['id_product'][$i];
            $soluong = $_POST['quantity'][$i];
            $gia_sanpham = $_POST['gia_sanpham'][$i];
            mysqli_query($conn, "INSERT INTO donhang(ma_donhang,id_product,id_user,soluong,gia_sanpham,trang_thai) VALUES
      ('$ma_donhang','$id_product','$id_user','$soluong','$gia_sanpham','$trangthai')");
        }
    }
    setcookie('order_success', '1', time() + 3600);
    header('location: ?pages=index');
}
?>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2><img src="../images/icon/pair-of-bills.png" width="40px" alt=""> Thanh toán cho đơn hàng của bạn</h2>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted"><img src="../images/icon/cart.png" width="40px" alt=""> Giỏ hàng của
                        bạn</span>
                    <span class="badge badge-secondary badge-pill"><?php echo $totalProduct ?> sản phẩm</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php $total = 0;
                    $giasanpham = 0;
                    $index = 0;
                    foreach ($carts as $key => $value) {  ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><span
                                    class="badge badge-secondary badge-pill"><?php echo ++$index ?></span>
                                <?php echo $value['productName'] ?>
                            </h6>
                            <img src="<?php echo $value['image'] ?>" alt="" class="mt-2" width="40px">
                            <small class="text-muted"><?php echo $value['quantity'] ?> Cái, &nbsp; </small>
                        </div>
                        <span
                            class="text-muted"><?php echo number_format($giasanpham = $value['price'] * $value['quantity']) ?>
                            VND</span>
                    </li>
                    <?php $total += $giasanpham;
                    }  ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng cộng (VND)</span>
                        <strong><?php echo number_format($total) ?> VND</strong>
                    </li>
                </ul>
            </div>

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Địa chỉ thanh toán</h4>
                <form class="needs-validation" novalidate="" method="POST" action="">

                    <div class="mb-3">
                        <label for="Name">Tên</label>
                        <input type="text" class="form-control" id="Name" placeholder="Tên người dùng"
                            value="<?php if (isset($user['name'])) echo $user['name'] ?>" required="" name="name">
                        <div class="invalid-feedback">
                            Không được bỏ trống trường này.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sdt">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại người dùng"
                            value="<?php if (isset($user['sdt'])) echo $user['sdt'] ?>" required="" name="phone">
                        <div class="invalid-feedback">
                            Không được bỏ trống trường này.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" id="address"
                            placeholder="Vd: số 5 ngõ 32 đ.nguyễn viết xuân p.hưng dũng tp.vinh t.nghệ an" required=""
                            name="diachi">
                        <div class="invalid-feedback">
                            Không được bỏ trống trường này.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Ghi chú</label>
                        <div class="input-group">
                            <div class="input-group">
                            </div>
                            <input type="text" class="form-control" id="username" name="ghichu">
                        </div>
                    </div>

                    <h4 class="mb-3">Thanh toán</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="thanhtoan" value="0" type="radio" class="custom-control-input"
                                checked="" required="">
                            <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button onclick="return confirm('Thanh toán đơn hàng này !');"
                        class="btn btn-secondary btn-lg btn-block" name="submit" type="submit">Đặt hàng</button>
                    <br>

                    <div class="row">
                        <input type="text" hidden name="id_user"
                            value="<?php if (isset($user['id'])) echo $user['id'] ?>">
                        <input type="text" hidden name="name"
                            value="<?php if (isset($user['name'])) echo $user['name'] ?>">
                        <?php foreach ($carts as $key => $value) { ?>

                        <input type="text" hidden name="quantity[]" value="<?php echo $value['quantity'] ?>">
                        <input type="text" hidden name="gia_sanpham[]" value="<?php echo $value['price'] ?>">
                        <input type="text" hidden name="id_product[]" value="<?php echo $value['id'] ?>">
                        <?php } ?>
                    </div>

                </form>
            </div>

        </div>

    </div>
    <br>

    <script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');


            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
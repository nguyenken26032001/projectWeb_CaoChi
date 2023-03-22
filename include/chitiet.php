<?php
if (isset($_GET['sanpham'])) {
    $id_product = $_GET['sanpham'];
    $product = mysqli_query($conn, "SELECT * FROM product WHERE id_product = '$id_product'");
    $sanpham = mysqli_fetch_assoc($product);
    // $sanpham = executeResult("SELECT * FROM product WHERE id_product = '$id_product'");
    // lấy ảnh mô tả 
    $img_pro = mysqli_query($conn, "SELECT * FROM img_product WHERE id_product = $id_product");
}
?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mb-5">
            <img id="zoom" class="card-img-top rounded" src="<?php echo $sanpham['anh_sanpham'] ?>" alt="">
        </div>
        <div class="col-md-8">
            <div class="card-body-ml-auto">
                <input type="hidden" name="idProduct" id="idProduct" value="<?php echo $sanpham['id_product'] ?>">
                <h2 id="productName"><?php echo $sanpham['ten_sanpham'] ?></h2>
                <?php if ($sanpham['gia_khuyenmai'] > 0) { ?>
                <p>
                    <span><del><?php echo number_format($sanpham['gia_sanpham']) ?> VND</del></span>&nbsp; Giảm:
                    <?php $khuyenmai = 100 - (($sanpham['gia_khuyenmai']) / ($sanpham['gia_sanpham']) * 100) ?>
                    <?php echo number_format($khuyenmai) ?>%
                </p>
                <p>
                    <span class="price-detail"><?php echo number_format($sanpham['gia_khuyenmai']) ?> VND</span>
                </p>
                <?php } else { ?>
                <p>
                    <span class="price-detail"><?php echo number_format($sanpham['gia_sanpham']) ?> VND</span>
                </p>
                <p>
                    <span>&nbsp;</span>
                </p>
                <?php } ?>
                <p class="card-text py-2"><strong class="title-product-detail">Chi tiết :
                    </strong><span><?php echo $sanpham['chitiet'] ?></span></p>
            </div>
            <strong class="title-product-detail">Số lượng: </strong> <input class="quantity" type="number" value="1"
                name="quantity" min="1" max="<?php echo $sanpham['soluong'] ?>">
            <div class="buy-product mt-3">
                <a class="btn btn-secondary" href="?pages=muangay">Mua Ngay</a>
                <a class="btn btn-danger mx-3" href=""
                    onclick="addToCart($('#idProduct').val(),$('#productName').text(),$('.price-detail').text(),$('.quantity').val())">Thêm
                    vào giỏ hàng
                    !</a>
            </div>
        </div>
    </div>
</div>
<script>
function addToCart(id, productName, price, quantity) {
    $.ajax({
        type: "post",
        url: '?pages=cart',
        data: {
            action: "addToCart",
            id: id,
            productName: productName,
            price: price,
            quantity: quantity
        },
        success: function(data) {
            // alert(data);
            event.preventDefault();
            <?php
                $_SESSION['noti'] = "Sản phẩm đã được thêm vào giỏ hàng.";
                $_SESSION['status_noti'] = "success";
                ?>
            // history.pushState(null, null, '?pages=cart');
        },
    });
}
</script>
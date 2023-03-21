<?php
$listProduct = executeResult("SELECT * FROM product ORDER BY id_product DESC LIMIT 8");
?>
<!-- Carousel băng chuyền ảnh -->
<div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid" src="uploads/<?php $query = mysqli_query($conn, "SELECT * FROM carousel WHERE id = 1");
                                                $img = mysqli_fetch_assoc($query);
                                                echo $img['img']   ?>" alt="Thời Trang Nam">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="uploads/<?php $query = mysqli_query($conn, "SELECT * FROM carousel WHERE id = 2");
                                                $img = mysqli_fetch_assoc($query);
                                                echo $img['img'] ?>" alt="Thời Trang Nữ">
        </div>
        <div class="carousel-item">
            <img class="img-fluid" src="uploads/<?php $query = mysqli_query($conn, "SELECT * FROM carousel WHERE id = 3");
                                                $img = mysqli_fetch_assoc($query);
                                                echo $img['img'] ?>" alt="Thời Trang Gay">
        </div>
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<!-- banner -->
<div class="row">
    <div class="col-sm-4 ">
        <div class="list-group ml-3">
            <a href="#" class="list-group-item list-group-item-action"><i class="fa-thin fa-mobile-notch"></i> ĐIỆN
                THOẠI </a>
            <a href="#" class="list-group-item list-group-item-action">MÁY TÍNH</a>
            <a href="#" class="list-group-item list-group-item-action">ÂM THANH</a>
            <a href="#" class="list-group-item list-group-item-action">ĐỒNG HỒ</a>
        </div>
        <!-- <a data-toggle="tooltip" title="Thời trang nữ!" href="?pages=product"> <img src="images/banner-1.jpg"
                alt=""></a>
        <hr>
        <a href="#"> <img src="images/banner-4.jpg" alt=""></a> -->
    </div>
    <div class="col-sm-8">
        <a data-toggle="tooltip" title="Thời trang nam!" href="?pages=product"> <img src="images/banner-11.jpg"
                alt=""></a>
    </div>
</div>
<div class="cards">
    <?php foreach ($listProduct as $product) {
    ?>
    <div class="card">
        <a href="?pages=chitietsanpham&sanpham=<?php echo $product['id_product'] ?>">
            <img src="<?php echo $product['anh_sanpham'] ?>" alt="" class="card-image">
        </a>
        <div class="card-content">
            <div class="card-top">
                <h3 class="card-title"><?php echo $product['ten_sanpham'] ?></h3>
                <div class="card-price">
                    <h4><?php echo number_format($product['gia_sanpham']) ?>đ</h4>
                </div>
            </div>
            <div class="card-bottom">
                <a href="?pages=chitietsanpham&sanpham=<?php echo $product['id_product'] ?>">
                    <button class="btn-buy">MUA</button>
                </a>
            </div>
        </div>

    </div>
    <?php
    } ?>
</div>
</div>

<!-- <div class="text-center"><a data-toggle="tooltip" class="btn btn-outline-dark"
        title="Tham quan các sản phẩm của chúng tôi!" href="?pages=product">
        <h2>Xem thêm sản phẩm tại đây</h2> 
</a></div> -->
<!-- pagination -->
<nav aria-label="Page navigation example d-flex">
    <ul class="pagination justify-content-center">
        <li class="page-item active"><a class="page-link " href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>
<hr class="my-4">
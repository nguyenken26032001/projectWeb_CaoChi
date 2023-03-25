<?php
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    // print_r("<pre>");
    // print_r($cart);
    // print_r("</pre>");
} else {
    $cart = [];
}
if (isset($_SESSION['productBuy'])) {
    $productBuy = $_SESSION['productBuy'];
} else {
    $productBuy = [];
}


?>
<!-- body{
    background-image: url('https://minhhaisport.vn/wp-content/themes/metro/assets/img/banner.jpg');
    background-repeat: repeat-y;
    height: 1000px;
}

#head{
  margin-top: 120px;
}
.menu_icon #slsp span{
    color: white;
    font-size: 16px;
}
input{
  overflow: visible;
      width: 68px;

}
.notifyCart{
  position: absolute;
  top: 300px;
  left: 560px;

}
.notifyCart p{
  font-size: 22px;
}
.menu_icon #account {
    position: absolute;
    right: 138px;
    top: 20px;
    font-size: 20px;
    cursor: pointer;
} -->
</style>

<body>
    <div class="container">
        <?php
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'];
        }
        ?>
        <input type="hidden" name="slgiohang" id="slgiohang" value="<?php echo $total ?>">
        <div id="giohang">
            <div id="head" class="panel panel-primary mt-4">
                <div class="panel panel-info">
                    <h2 class="text-center"> GIỎ HÀNG CỦA BẠN </h2>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                    <label class="form-check-label" for="checkAll">
                        Chọn tất cả sản phẩm
                    </label>
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered  table-striped">
                        <thead>
                            <tr>
                                <th width="20px"></th>
                                <th> STT</th>
                                <th width=150px style="text-align: center;"> HÌNH ẢNH</th>
                                <th style="text-align: center;"> Sản Phẩm</th>
                                <th style="text-align: center;"> Số Lượng</th>
                                <th style="text-align: center;"> Đơn Giá</th>
                                <th style="text-align: center; width: 130px;">Thành Tiền</th>
                                <th style="text-align: center; width:60px;">UPDATE</th>
                                <th width=60px style="text-align: center;">DELETE</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                            }
                            $stt = 0;
                            foreach ($cart as $item) : ?>
                            <form action="cart.php" method="POST"></form>
                            <tr>
                                <td width=20px>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkItems"
                                            value="<?php echo $item['id'] ?>" id="productItem">
                                    </div>
                                </td>
                                <td> <?php echo ++$stt ?></td>
                                <td><img src="<?php echo $item['image'] ?>" alt="" width=100px> </td>
                                <td style="text-align: center;"><?php echo $item['productName'] ?> </td>
                                <td style="text-align: center;"><input type="number" name="quantity" id="quantity"
                                        value="<?php echo ($item['quantity']) ?>" min="1"
                                        max="<?php echo $item['sltk'] ?>"> </td>
                                <td style="text-align: center;"><?php echo  number_format($item['price']) ?> VNĐ
                                </td>
                                <td style="text-align: center;" id="row<?php echo $item['id'] ?>">
                                    <?php echo  number_format($item['price'] * $item['quantity']) ?> VNĐD</td>
                                <input type="hidden" name="id" id="id" value="<?php echo $item['id'] ?>">
                                <td><button class="btn btn-warning"
                                        onclick="updateCart(<?php echo $item['id'] ?>,$('#quantity').val())">
                                        UPDATE</button>
                                </td>
                                </form>
                                <td><button type="button" class="btn btn-danger"
                                        onclick="deleteCartItem(<?php echo $item['id'] ?>)"> DELETE</button> </td>
                            </tr>
                        </tbody>
                        <?php endforeach;
                    ?>
                        <?php
                    $tongtien = 0;
                    if ($productBuy == []) {
                        $tongtien = 0;
                    } else {
                        foreach ($productBuy as $item) {
                            $tongtien += $item['price'] * $item['quantity'];
                        }
                    }
                    ?>
                        <tr>
                            <td style="width: 120px; font-weight: 600; font-size: 18px; color: red;">Tổng Tiền :</td>
                            <td colspan="12" class="text-center"
                                style="background-color: rgba(0,0,0,0.6); color: #fff; font-size: 22px;">
                                <?php echo  number_format($tongtien) ?> VNĐ</td>
                        </tr>
                    </table>
                    <a href="?pages=thanhtoan">
                        <button class="btn btn-success mb-5"
                            style="width: 100%; margin-top: 30px; padding-top: 10px; padding-bottom: 10px;"> THANH TOÁN
                            ĐƠN HÀNG </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="notifyCart" id="notify">
            <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/5fafbb923393b712b96488590b8f781f.png"
                alt="không có đơn hàng" width="180px">
            <p>Chưa có sản phẩm !</p>
        </div>
    </div>
</body>
<?php
// print_r("<pre>");
// print_r($_SESSION['cart']);
// print_r('</pre>');
?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
function deleteCartItem(id) {
    var choose = confirm(" Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ??!!!");
    if (!choose) {
        return
    } else {
        $.ajax({
            type: "post",
            url: '?pages=cart',
            data: {
                action: "delete",
                id: id,
            },
            success: function(data) {
                location.reload();
            },
        });
    }
}

function updateCart(id, quantity) {
    $.ajax({
        type: "post",
        url: '?pages=cart',
        data: {
            action: "update",
            id: id,
            quantity: quantity
        },
        success: function(data) {
            location.reload();
        },
    });
}
var slgiohang = document.getElementById('slgiohang').value;
// document.getElementById('notify').style.display = "none"
// document.getElementById('giohang').style.display = "none"

if (parseInt(slgiohang) == 0) {
    document.getElementById('giohang').style.display = "none";
    document.getElementById('notify').style.display = "block";
} else {
    document.getElementById('giohang').style.display = "block";
    document.getElementById('notify').style.display = "none";
}
</script>
<script>
var listItemCheck = document.querySelectorAll("#productItem");
[...listItemCheck].forEach((item) => {
    item.addEventListener("change", (e) => {
        var id = e.currentTarget.value;
        if (item.checked) {
            $.ajax({
                type: "POST",
                url: "?pages=cart",
                data: {
                    id: id,
                    action: "productBuy"
                },
                success: function(data) {
                    // location.reload();
                },
            })
        } else {
            $.ajax({
                type: "POST",
                url: "?pages=cart",
                data: {
                    id: id,
                    action: "IsProductBuy"
                },
                success: function(data) {
                    // location.reload();
                },
            })
        }
    });
});
// var checkAll = document.querySelector("#productItem");
// checkAll.addEventListener('change', (e) => {
//     if (e.checked) {
//         $.ajax({
//             type: "POST",
//             url: "?pages=cart",
//             data: {
//                 id: id,
//                 action: "checkAll"
//             },
//             success: function(data) {
//                 // location.reload();
//             },
//         })
//     }
// })
</script>

</html>
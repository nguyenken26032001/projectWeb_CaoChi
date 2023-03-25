</div>
<div class="jumbotron" style="margin-bottom:0; background-color: #fafafa;
">
    <div class="row">
        <div class="col-md-5 infors">
            <a href="index.php" data-toggle="tooltip" title="về trang chủ!" class="footer-infor-brand"> DANH VINH
                STORE</a>
            <div class="infor">
                <i class="fa fa-phone"></i>
                <span class="footer-info-text"> 0123456789</span>
            </div>
            <div class="infor">
                <i class="fa-regular fa-envelope"></i>
                <span class="footer-info-text">Danhvinh@gmail.com</span>
            </div>
            <div class="infor">
                <i class="fa-brands fa-facebook"></i>
                <span class="footer-info-text"><a href="https://www.facebook.com/AliTV.vn" target="_blank">
                        facebook</a></span>
            </div>
            <div class="infor">
                <i class="fa-brands fa-instagram"></i>
                <span class="footer-info-text"><a href="https://www.facebook.com/AliTV.vn"
                        target="_blank">Instagram</a></span>
            </div>
            <div class="infor">
                <i class="fa fa-location-dot"></i>
                <span class="footer-info-text"><a
                        href="https://www.google.com/maps/place/B%E1%BA%BFn+Th%E1%BB%A7y,+Tp.+Vinh,+Ngh%E1%BB%87+An,+Vi%E1%BB%87t+Nam/@18.6537576,105.6875624,14.25z/data=!4m5!3m4!1s0x3139cc33a6f87285:0xd27aa13ec912dfad!8m2!3d18.6637404!4d105.6948581"
                        target="_blank">TP VINH</a></span>
            </div>
        </div>
        <div class="col-md-5">
            <h2>Thông tin dịch vụ</h2>
            <a href="?pages=kiemtra_donhang" class="CSKH">Kiểm tra trạng thái đơn hàng</a><br>
            <a href="" class="CSKH">Về Chúng Tôi</a><br>
            <a href="" class="CSKH">Chính Sách Bảo Hành</a><br>
            <a href="" class="CSKH">Chính Sách Bảo Mật</a><br>
            <a href="" class="CSKH">Điều Khoản Và Điều Kiện</a><br>
            <a href="" class="CSKH">Câu hỏi thường gặp</a>
        </div>

        <div class="col-md-2">
            <img src="images/lap.png" width="100%" alt="">
        </div>
    </div>


</div>
<!-- <p class="end">Copyrights © 2023 and Developer by Danh Vinh !</p> -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/handleProplem.js"></script>
<script src="js/handleCart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php
if (isset($_SESSION['noti']) && $_SESSION['noti'] != '') {
?>
<script>
swal.fire({
    title: "",
    text: "<?php echo $_SESSION['noti'] ?>",
    icon: "<?php echo $_SESSION['status_noti'] ?>",
    button: "ok",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
});
</script>
<?php
}
unset($_SESSION['noti']);
unset($_SESSION['status_noti']);
?>
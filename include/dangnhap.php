<?php

$err = [];
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $data = executeResult("SELECT * FROM users WHERE email = '$email' and password = '$password'");
  if ($data) {
    $_SESSION['user'] = $data;
    header('location: ?pages=index');
  } else {
    $_SESSION['status'] = "Email hoặc mật khẩu không đúng vui lòng kiểm tra lại";
    $_SESSION['status_code'] = "error";
  }
}
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
if (isset($user['name'])) {
  header('location: ?pages=users');
} else { ?>
<div class="container-fluid">
    <hr>

    <h2>Đăng nhập tài khoản</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="" placeholder="Nhập email vd:abc@xzy.qwr..." name="email"
                required="true"
                value="<?php if (isset($_POST['email'])) echo $_POST['email'];
                                                                                                                                      else echo ''; ?>">
            <p class="text-danger"> <?php echo (isset($err['email'])) ? $err['email'] : '' ?> </p>
        </div>
        <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu..." name="password"
                required="true">
            <p class="text-danger"> <?php echo (isset($err['password'])) ? $err['password'] : '' ?> </p>
        </div>
        <button type="submit" class="btn btn-secondary">Đăng nhập</button>
    </form>
    <br>
    <h6><a href="?pages=dangky">Đăng ký tài khoản tại đây.</a></h6>
    <hr>
</div>
<?php  } ?>
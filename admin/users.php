<?php
    include 'header.php';

    $users = mysqli_query($conn,"SELECT * FROM users");
?>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="index.php"><i class="fas fa-home"></i> Trang chính</a>
  </li>
  </li>  <li class="nav-item">
    <a class="nav-link " href="category.php"><i class="fas fa-align-justify"></i> Danh mục</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="product.php"><i class="fas fa-tshirt"></i> Sản phẩm</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carousel.php"><i class="fas fa-images"></i> Ảnh carousel</a>
  </li>

  <li class="nav-item">
    <a class="nav-link active" href="users.php"><i class="fas fa-address-card"></i> Khách hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="donhang.php"><i class="fas fa-truck"></i> Đơn hàng</a>
  </li>
</ul>
<br>
<h6>Bộ lọc tìm kiếm</h6>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
<br>

<h5>Thông tin khách hàng <span class="badge badge-secondary badge-pill"><?php echo  mysqli_num_rows($users) ?></span></h5>

<table class="table table-striped">
    <thead>
        <tr >
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>email</th>
            <th>Số đt</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach($users as $key => $value) { ?>
        <tr>
            <td><?php echo $key +1 ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['sdt'] ?></td>
            <td><a onclick="return confirm('Bạn có chắc muốn xóa khách hàng <?php echo $value['name'] ?>')" class="btn btn-outline-danger" href="xoa_khach_hang.php?id_khach_hang=<?php echo $value['id'] ?>">Xóa</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php
    include 'footer.php';
?>
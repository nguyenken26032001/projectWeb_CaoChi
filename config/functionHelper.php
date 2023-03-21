<?php require_once './config/connect.php';
function executeResult($sql)
{
    $conn =  new mysqli(host, username, password, database);
    mysqli_set_charset($conn, 'utf8');
    $data = [];
    $result = mysqli_query($conn, $sql);
    if ($result != null) {
        while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
        }
        mysqli_close($conn);
        return $data;
    }
}
//hàm execute  sử dụng cho câu lệnh insert ,delete, update dữ liệu vào db
function execute($sql)
{
    $conn =  new mysqli(host, username, password, database);
    mysqli_set_charset($conn, 'utf8');
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
function get_member($id)
{
    $conn =  new mysqli(host, username, password, database);
    mysqli_set_charset($conn, 'utf8');
    $sql = "select * from khachhang where id= $id";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}
function get_memberProduct($id)
{
    $conn =  new mysqli(host, username, password, database);
    mysqli_set_charset($conn, 'utf8');
    $sql = "select *  from sanPham where  id=$id ";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}
function get_memberCategory($maNhom)
{
    $conn =  new mysqli(host, username, password, database);
    mysqli_set_charset($conn, 'utf8');
    $sql = "select * from nhomhang where  maNhom=$maNhom ";
    $query = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($query);
}
function getSecurity($pwd)
{
    return md5(md5($pwd));
}
function totalQuantity($cart)
{
    $total = 0;
    foreach ($cart as $key => $value) {
        $total += $value['soLuong'];
    }
    return $total;
}
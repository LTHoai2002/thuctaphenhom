<?php

include('C:/xampp/htdocs/t3/admincp/config/config.php');

if (!$mysqli) {
    die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = "DELETE FROM yeuthich1 WHERE id_yt = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        die('Lỗi chuẩn bị câu truy vấn: ' . $mysqli->error);
    }

  
    $stmt->bind_param('i', $id);
    if (!$stmt->execute()) {
        die('Lỗi thực thi câu truy vấn: ' . $stmt->error);
    }


    $stmt->close();
    $mysqli->close();

    echo '<script>alert("Đã xóa thành công!"); window.location.href = "../includes/addyeuthich.php";</script>';
    exit; 

} else {
   
    echo '<script>alert("Không có ID hợp lệ!"); window.location.href = "../includes/addyeuthich.php";</script>';
    exit;
}
?>
<?php

include('C:/xampp/htdocs/t3/admincp/config/config.php');


if (isset($_POST['id']) && isset($_POST['ma_tro'])) {
    $id = $_POST['id']; 
    $ma_tro = $_POST['ma_tro']; 

  
    $check_sql = "SELECT * FROM yeuthich1 WHERE id = ? AND ma_tro = ?";
    $check_stmt = $mysqli->prepare($check_sql);
    $check_stmt->bind_param("is", $id, $ma_tro);
  
    $check_stmt->execute();
    $check_stmt->store_result();
    
    
    if ($check_stmt->num_rows > 0) {
        echo "Exists"; 
    } else {
     
        $insert_sql = "INSERT INTO yeuthich1 (id, ma_tro) VALUES (?, ?)";
        $insert_stmt = $mysqli->prepare($insert_sql);
        $insert_stmt->bind_param("is", $id, $ma_tro);
        
    
        if ($insert_stmt->execute()) {
            echo "Done"; 
        } else {
            echo "Error: " . $mysqli->error; 
        }
        
   
        $insert_stmt->close();
    }
    
    // Đóng statement kiểm tra
    $check_stmt->close();
} else {
    echo "Invalid data"; // Trường hợp dữ liệu gửi lên không hợp lệ
}

// Đóng kết nối MySQL
$mysqli->close();
?>
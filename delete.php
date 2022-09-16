<?php
$conn = mysqli_connect('localhost', 'root', '', 'thi_thu');
if (!$conn) {
    echo "loi ket noi";
    echo mysqli_connect_errno();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn,"SELECT * FROM quan_ao WHERE id=$id");
    
   mysqli_query($conn,"DELETE FROM quan_ao WHERE id=$id");
   $row = mysqli_fetch_assoc($result);
    unlink($row['avatar']);
   
   header('location:list.php');
}

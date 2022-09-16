<?php
$conn = mysqli_connect('localhost', 'root', '', 'thi_thu');
if (!$conn) {
    echo "loi ket noi";
    echo mysqli_connect_errno();
}
$categoryList = mysqli_query($conn,"SELECT * FROM category");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $result = mysqli_query($conn,"SELECT * FROM quan_ao WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    if(isset($_FILES['avatar']) && $_FILES['avatar']['name'] != null){
    $avatar = 'uploads/' . time(). $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar);
        unlink($row['avatar']);
        $sql = "UPDATE `quan_ao` SET `name`='$name',`price`='$price',`description`='$description',`category_id`='$category_id',`avatar`='$avatar' WHERE id=$id";
        mysqli_query($conn,$sql);
    }else{
        $sql1 = "UPDATE `quan_ao` SET `name`='$name',`price`='$price',`description`='$description',`category_id`='$category_id'WHERE id=$id";
        mysqli_query($conn,$sql1);
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">

<table>
    <tr>
        <td>
            <label for="">name</label>
            <input value="<?php echo $row['name'] ?>" type="text" name="name">
        </td>
        <td>
            <label for="">price</label>
            <input value="<?php echo $row['price'] ?>" type="text" name="price">
        </td>
    </tr>
    <tr>
        <td>
            <label for="">description</label>
            <textarea name="description" id="" cols="30" rows="10"><?php echo $row['name'] ?></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label for="">category_id</label>
            <select name="category_id" id="">
                <?php foreach($categoryList as $category):?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php endforeach;?>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <label for="">avatar</label>
            <input value="<?php echo $row['name'] ?>" type="file" name="avatar">
        </td>
    </tr>
    <tr>
        <td>
            <button>add</button>
        </td>
    </tr>
</table>

</form>
</body>
</html>
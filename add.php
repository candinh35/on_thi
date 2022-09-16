<?php
$conn = mysqli_connect('localhost', 'root', '', 'thi_thu');
if(!$conn){
    echo "loi ket noi";
    echo mysqli_connect_errno();
}

$result = mysqli_query($conn,"SELECT * FROM category");

if(isset($_FILES['avatar']) && $_FILES['avatar']['name'] != null){
    $avatar = 'uploads/' . time(). $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar);
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];
    $sql = "INSERT INTO `quan_ao`( `name`, `price`, `description`, `category_id`, `avatar`) VALUES ('$name',$price,'$description', $category_id,'$avatar')";
    mysqli_query($conn,$sql);
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
                <input type="text" name="name">
            </td>
            <td>
                <label for="">price</label>
                <input type="text" name="price">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">category_id</label>
                <select name="category_id" id="">
                    <?php foreach($result as $row):?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                    <?php endforeach;?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">avatar</label>
                <input type="file" name="avatar">
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
<?php 
 $conn = mysqli_connect('localhost', 'root', '', 'thi_thu');
 if(!$conn){
     echo "loi ket noi";
     echo mysqli_connect_errno();
 }
 $result = mysqli_query($conn,"SELECT *,quan_ao.name as quan_ao_name, quan_ao.id as quan_ao_id , category.name as category_name FROM quan_ao INNER JOIN category ON quan_ao.category_id = category.id");
if(isset($_POST['min'])){
    $min = $_POST['min'];
    $max = $_POST['max'];

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
    
    <table>
        <thead>
            <th>id</th>
            <th>avatar</th>
            <th>name</th>
            <th>price</th>
            <th>category</th>
            <th>description</th>
        </thead>
        <tbody>
            <?php foreach($result as $row):
                if($row['price'] >$min && $row['price'] < $max){
                ?>
            <tr>
                <td>
                    <?php echo $row['quan_ao_id'] ?>
                </td>
                <td>
                    <img src="<?php echo $row['avatar'] ?>" alt="" width="100">
                    
                </td>
                <td>
                    <?php echo $row['quan_ao_name'] ?>
                </td>
                <td>
                    <?php echo $row['price'] ?>
                </td>
                <td>
                    <?php echo $row['category_name'] ?>
                </td>
                <td>
                    <?php echo $row['description'] ?>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $row['quan_ao_id'] ?>">xoa</a>
                    <a href="edit.php?id=<?php echo $row['quan_ao_id'] ?>">sua</a>
                </td>
            </tr>
            
            <?php };
        endforeach;?>
            <tr>
                <td>
                    <a href="add.php">them</a>
                </td>
                <td>
                    <a href="compare.php">so sanh</a>
                </td>
            </tr>
        </tbody>
    </table>
<?php }?>
<form action="" method="post">
        <label for="">min</label>
        <input type="text" name="min">
        <label for="">max</label>
        <input type="text" name="max">
        <button>tim kiem</button>
    </form>
</body>
</html>
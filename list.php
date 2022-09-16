<?php
$conn = mysqli_connect('localhost', 'root', '', 'thi_thu');
if (!$conn) {
    echo "loi ket noi";
    echo mysqli_connect_errno();
}
$sql = "SELECT *,quan_ao.name as quan_ao_name, quan_ao.id as quan_ao_id , category.name as category_name FROM quan_ao INNER JOIN category ON quan_ao.category_id = category.id";
$s = mysqli_query($conn, "SELECT * FROM quan_ao");
echo mysqli_num_rows($s);

// so sanh 
if (isset($_POST['min'])) {
    $min = $_POST['min'];
    $max = $_POST['max'];
    $sql . " WHERE price BETWEEN $min AND $max";
}
if (isset($_GET['page'])) {
    $r = ($_GET['page'] - 1) * 10;
}
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <th>id</th>
            <th>avatar</th>
            <th>name</th>
            <th>price</th>
            <th>category</th>
            <th>description</th>
        </thead>
        <tbody>

            <?php



            foreach ($result as $row) : ?>
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

            <?php endforeach; ?>
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
    <form action="" method="post">
        <label for="">min</label>
        <input type="text" name="min">
        <label for="">max</label>
        <input type="text" name="max">
        <button>tim kiem</button>
    </form>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="">Previous</a></li>
            <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</body>

</html>
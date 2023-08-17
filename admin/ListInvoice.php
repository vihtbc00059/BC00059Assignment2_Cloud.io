<?php
    require_once ("ConnectDB.php");

    $sql = "SELECT * FROM invoice
            INNER JOIN user ON invoice.user_id=user.user_ID";
    $result = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage user</title>
    <script src="JS/ProductManageScript.js"></script>
    <link rel="stylesheet" href="CSS/ProductManageStyle.css">
</head>
<body>
    <table border="1" id="tblListProduct">
        <tr id="ListProductTitle">
            <td colspan="6">LIST INVOICE</td>
        </tr>
        <tr>
            <th width="7%">ID</th>
            <th width="15%">User</th>
            <th width="15%">Total price</th>
            <th width="14%">Date</th>
            <th>Address</th>
            <th width="10%">Detail</th>
        </tr>

        <?php
            if(mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td class="center"><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_fullname']; ?></td>
            <td class="center"><?php echo number_format($row['total_price'],0); ?></td>
            <td class="center"><?php echo $row['create_date']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td class="center">
                <a href="index.php?page=InvoiceDetail&id=<?php echo $row['id']; ?>">Detail</a>
            </td>
        </tr>

        <?php
            }
        ?>
    </table>
</body>
</html>
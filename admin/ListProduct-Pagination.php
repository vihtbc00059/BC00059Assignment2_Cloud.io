<?php
    require "ConnectDB.php";

    $sql1 = "SELECT count(product_id) as total FROM product";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $total_record = $row1['total'];

    $limit = 3;
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $total_page = ceil($total_record / $limit);

    if($current_page < 1)
        $current_page = 1;
    else if($current_page > $total_page)
        $current_page = $total_page;
        
    $start = ($current_page - 1) * $limit;

    if($start < 0)
        $start = 0;
    
    $sql2 = "SELECT * FROM product LIMIT $start, $limit";
    $result2 = mysqli_query($conn, $sql2);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>List product</title>
        <link rel="stylesheet" href="ProductManageStyle.css">
    </head>
    <body>
        <table border="1" id="tblListProduct">
            <tr>
                <th>
                    Product ID
                </th>
                <th>
                    Product name
                </th>
                <th>
                    Product type
                </th>
                <th>
                    Product price
                </th>
                <th>
                    Description
                </th>
                <th>
                    Product image
                </th>
                <th>Edit</th>
            </tr>
        <?php
            if(mysqli_num_rows($result2) > 0)
                while($row = mysqli_fetch_assoc($result2)){
        ?>
            <tr>
                <td>
                    <?php echo $row['product_id']; ?>
                </td>
                <td>
                    <?php echo $row['product_name']; ?>
                </td>
                <td>
                    <?php echo $row['product_type']; ?>
                </td>
                <td>
                    <?php echo $row['product_price']; ?>
                </td>
                <td>
                    <?php echo $row['product_description']; ?>
                </td>
                <td>
                    <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" height="50px">
                </td>
                <td>
                    <a href="ModifyProduct.php?id=<?php echo $row['product_id']; ?>">Modify</a> |
                    <a href="DeleteProduct.php?id=<?php echo $row['product_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
        </table>

        <br>
        <div id="pagination">
        <?php
            // Hiển thị phân trang
            if($current_page > 1 && $total_page > 1)
                echo '<a href="ListProduct-Pagination.php?page=' . ($current_page - 1) . '">Pre</a> | ';

            for($i=1; $i<=$total_page; $i++){
                // Nếu trang hiện tại thì hiện thẻ span, ngược lại hiển thị thẻ a
                if($i == $current_page)
                    echo '<span>' . $i . '</span> | ';
                else
                    echo '<a href="ListProduct-Pagination.php?page=' . $i . '">' . $i . '</a> | ';
            }

            // Nếu current_page < total_page và total_page > 1 mới hiển thị nút Next
            if($current_page < $total_page && $total_page > 1)
                echo '<a href="ListProduct-Pagination.php?page=' . ($current_page + 1) . '">Next</a> | ';
        ?>
    </div>
    
        <br>
        <a href="AddProductPage.php">Return AddProductPage</a>
    </body>
    </html>
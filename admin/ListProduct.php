<?php
    require "ConnectDB.php";

    $sql1 = "SELECT count(product_id) as total FROM product";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $total_record = $row1['total'];

    $limit = 10;
    $current_page = isset($_GET['ListPage']) ? $_GET['ListPage'] : 1;
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
        <link rel="stylesheet" href="CSS/ProductManageStyle.css">
        <script src="JS/ProductManageScript.js"></script>
    </head>
    <body>

        <!-- <div id="log">
            <?php
                // if(isset($_SESSION['user'])){
                //     echo $_SESSION['user']['fullname'];
                // }
                // else{
                //     header("Location: Login.php");
                // }
            ?>
            <a href="javascript:LogOut()">Logout</a>
        </div> -->

        <table border="1" id="tblListProduct">
        <tr id="ListProductTitle">
            <td colspan="7">LIST PRODUCT</td>
        </tr>
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
                <td class="center">
                    <?php echo $row['product_id']; ?>
                </td>
                <td>
                    <?php echo $row['product_name']; ?>
                </td>
                <td class="center">
                    <?php echo $row['product_type']; ?>
                </td>
                <td>
                    <?php echo number_format($row['product_price'],0); ?>
                </td>
                <td>
                    <?php echo $row['product_description']; ?>
                </td>
                <td>
                    <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" height="50px">
                </td>
                <td class="center">
                    <a href="index.php?page=modifyProduct&id=<?php echo $row['product_id']; ?>">Modify</a> |
                    <a href="DeleteProduct.php?id=<?php echo $row['product_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
        </table>

        <br/>
        <div id="pagination">
            <?php
                // Show pagination
                if($current_page > 1 && $total_page > 1)
                    echo '<a href="ListProduct-Pagination.php?ListPage=' . ($current_page - 1) . '">Pre</a> | ';

                for($i=1; $i<=$total_page; $i++){
                    // If the page is current, the "span" tag will be displayed, otherwise the "a" tag will be displayed
                    if($i == $current_page)
                        echo '<span>' . $i . '</span> | ';
                    else
                        echo '<a href="index.php?page=listProduct&ListPage=' . $i . '">' . $i . '</a> | ';
                }

                // If current_page < total_page and total_page > 1, the "Next" button will be displayed
                if($current_page < $total_page && $total_page > 1)
                    echo '<a href="index.php?page=listProduct&ListPage=' . ($current_page + 1) . '">Next</a> | ';
            ?>
        </div>
    </body>
    </html>
<?php
    require "ConnectDB.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>

<?php
    $sql = "SELECT * FROM product WHERE product_id='$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
        $row = mysqli_fetch_assoc($result);
?>

<?php
    if(isset($_POST['btnMod'])){
        $productname = $_POST['productname'];
        $producttype = $_POST['producttype'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $oldimage = $row['product_image'];
        $newimage = $_FILES['image']['name'];

        if($newimage == ""){    // Do not update image
            $sql = "UPDATE product
                    SET product_name='$productname', product_type='$producttype', product_price='$price', product_description='$description'
                    WHERE product_id='$id'";
            if($conn -> query($sql))
                header("Location: index.php?page=listProduct");
            else
                echo "Update not successful!";
        }
        else{
            $del = unlink(trim($oldimage));     // Delete old image

            if($del)
                echo "Delete old image successful.";
            else
                echo "Delete old image failed!";

            $target_dir = "Images/";
            $target_file = $target_dir . time() . "-" . basename($newimage);
        //    $target_file = str_replace(" ", "", $target_file);  // Remove all space
            if($_FILES['image']['error'] != 0){
                echo "Image error!";
                die();
            }
            else if($_FILES['image']['size'] > 5242880){
                echo "Maximum Image size is 5MB";
                die();
            }
            else if(file_exists($target_file)){
                echo "Image name existed!";
                die();
            }
            else{
                $sql = "UPDATE product
                        SET product_name='$productname' , product_type='$producttype' , product_price='$price' , product_description='$description' , product_image='$target_file'
                        WHERE product_id='$id'";
                if($conn -> query($sql)){
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    header("Location: index.php?page=listProduct");
                }
                else
                    echo "Update not successful!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify product</title>
    <link rel="stylesheet" href="CSS/ProductManageStyle.css">
    <script src="JS/ProductManageScript.js"></script>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table id="AddProductTable">
            <tr>
                <th colspan="2" id="AddProductTH">
                    MODIFY PRODUCT
                </th>
            </tr>
            <tr>
                <td>
                    Product name
                </td>
                <td>
                    <input type="text" name="productname" id="productname" value="<?php echo $row['product_name']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Product type
                </td>
                <td>
                    <input type="radio" name="producttype" id="water" value="Water" <?php if($row['product_type']=="Water") echo "checked"; ?>>Water
                    <input type="radio" name="producttype" id="cake" value="Cake" <?php if($row['product_type']=="Cake") echo "checked"; ?>>Cake
                </td>
            </tr>
            <tr>
                <td>
                    Price
                </td>
                <td>
                    <input type="number" name="price" id="price" value="<?php echo $row['product_price']; ?>" step="1000"> VND
                </td>
            </tr>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    <textarea name="description" id="description" cols="30" rows="2"><?php echo $row['product_description']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                    <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" height="100px">
                </td>
            </tr>
            <tr>
                <td>
                    New image
                </td>
                <td>
                    <input type="file" name="image" id="image" accept="image/*">
                </td>
            </tr>
            <tr id="btnRow">
                <td colspan="2" >
                    <input type="submit" value="Modify product" class="btn" name="btnMod">
                <!--    <input type="button" value="Clear" class="btn" onclick="ClearForm()"> -->
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
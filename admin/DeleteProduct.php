<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require "ConnectDB.php";

        // Get product image
        $sql1 = "SELECT product_image FROM product WHERE product_id='$id'";
        $result = $conn -> query($sql1);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $image = $row['product_image'];
            echo $image;
        }
        
        // Delete product
        $sql2 = "DELETE FROM product WHERE product_id='$id'";

        if($conn -> query($sql2) == true){
            $del = unlink($image);
            if($del)
                echo "Delete image successful.";
            else
                echo "Delete image failed!";

            header("Location: index.php?page=listProduct");
        }   
        else
            echo "Delete product failed!";
    }
?>
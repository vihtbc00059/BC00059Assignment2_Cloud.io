<?php
    if(isset($_POST['btnAdd'])){    
        $productname = $_POST['productname'];
        $producttype = $_POST['producttype'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        
        $product_image_name = $_FILES['image']['name'];
        $target_dir = "Images/";     // \\\\ -> \\ in php -> \ mysql
        $target_file = $target_dir . time()."-" . basename($product_image_name);    // Add timestamp into Image name
    //    $target_file = str_replace(" ", "", $target_file);      // Remove all space (required for unlink)

        if($_FILES['image']['error'] != 0){
            echo "Image error!";
            die();
        }
        else if($_FILES['image']['size'] > 5242880){   // 5 MB
            echo "Maximum Image size is 5MB";
            die();
        }
        else if(file_exists($target_file)){
            echo "Image name existed!";
            die();
        }
        else{
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        }        

        require "ConnectDB.php";

        $sql = "INSERT INTO product(product_name, product_type, product_price, product_description, product_image)
                VALUES ('$productname', '$producttype', '$price', '$description', '$target_file')";

        if($conn -> query($sql) == true){
            echo "Insert product successful";
            header("Location: index.php?page=listProduct");
        }
        else
            echo "Insert product failed!";
    }
    else
        echo "Access denied!";
?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        require_once "ConnectDB.php";

        $sql = "DELETE FROM user WHERE user_ID='$id'";

        if($conn -> query($sql) == true){
            header("Location: index.php?page=manageUser");
        }
        else
            echo "Delete user failed!";
    }
?>
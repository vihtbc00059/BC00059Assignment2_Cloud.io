<?php
    session_start();
    
    $info = "";
    if(isset($_POST['username']) && isset($_POST['password'])){
        require_once "ConnectDB.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM AdminAccount WHERE admin_username='$username' AND admin_password=MD5(MD5('$password'))";
        $result = $conn -> query($sql);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['AdminAcc'] = $row;
        //    var_dump($_SESSION[user']);
            header("Location: index.php");
        }
        else{
            $info = "Login failed!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin login</title>
    <link rel="stylesheet" href="CSS/ProductManageStyle.css">
    <script src="JS/ProductManageScript.js"></script>
</head>
<body>
    <form action="" method="POST" onsubmit="return CheckLogin()">
        <table id="tbLogin">
            <tr id="trLogin">
                <td colspan="2">
                    ADMIN LOGIN
                </td>
            </tr>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type="text" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <tr>
                <td colspan="2" id="btnLogin">
                    <input type="submit" value="Login" id="login" name="login">
                </td>
            </tr>
        </table>
        <?php echo $info; ?>
    </form>
    
</body>
</html>
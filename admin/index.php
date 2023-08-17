<?php
    session_start();
    if(!isset($_SESSION['AdminAcc']))
        header("Location: Login.php");
    else
        $fullname = $_SESSION['AdminAcc']['admin_fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <link rel="stylesheet" href="ProductManageStyle.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
</head>
<body>

<!-- <div id="tabs">
  <ul>
    <li><a href="http://www.free-css.com/"><span>CSS Templates</span></a></li>
    <li><a href="http://www.free-css.com/"><span>CSS Layouts</span></a></li>
    <li><a href="http://www.free-css.com/"><span>CSS Books</span></a></li>
    <li><a href="http://www.free-css.com/"><span>CSS Menus</span></a></li>
    <li><a href="http://www.free-css.com/"><span>CSS Tutorials</span></a></li>
    <li><a href="http://www.free-css.com/"><span>CSS Reference</span></a></li>
    <li><a rel="nofollow" target="_blank" href="http://www.exploding-boy.com/" title="explodingboy"><span>explodingboy</span></a></li>
  </ul>
</div> -->
    <div id="adminMenu">
        <table border="0" width="90%" style="margin: auto;">
            <tr>
                <th colspan="4">
                  <!--  ADMINISTRATOR PAGE -->
                </th>
                <td style="text-align: right">
                    Hello <?php echo $fullname; ?>
                    <a href="Logout.php">Logout</a>
                </td>
            </tr>
            <tr>
                <td width="12%">
                    <a href="index.php?page=addProduct"><button><b>Add product</b></button></a>
                </td>
                <td width="12%">
                    <a href="index.php?page=listProduct"><button><b>List product</b></button></a>
                </td>
                <td width="12%">
                    <a href="index.php?page=manageUser"><button><b>Manage user</b></button></a>
                </td>
                <td width="12%">
                    <a href="index.php?page=ListFeedback"><button><b>List Feedback</b></button></a>
                </td>
                <td width="12%">
                    <a href="index.php?page=ListInvoice"><button><b>List Invoice</b></button></a>
                </td>
            </tr>
        </table>
    </div>

    <div id="adminContent">
        <?php
            if(isset($_GET['page'])){
                if($_GET['page'] === "addProduct")
                    require_once "AddProductPage.php";
                else if($_GET['page'] === "listProduct")
                    require_once "ListProduct.php";
                else if($_GET['page'] === "modifyProduct")
                    require_once "ModifyProduct.php";
                else if($_GET['page'] === "manageUser")
                    require_once "ListUser.php";
                else if($_GET['page'] === "deleteUser")
                    require_once "DeleteUser.php";
                else if($_GET['page'] === "modifyUser")
                    require_once "ModifyUser.php";
                else if($_GET['page'] === "ListFeedback")
                    require_once ("ListFeedback.php");
                else if($_GET['page'] === "DeleteFeedback")
                    require_once ("DeleteFeedback.php");
                else if($_GET['page'] === "ListInvoice")
                    require_once ("ListInvoice.php");
                else if($_GET['page'] === "InvoiceDetail")
                    require_once ("InvoiceDetail.php");
            }
            else
            echo "<marquee direction='right' scrolldelay='80'>Welcome to Administrator page</marquee>";
        ?>
    </div>
</body>
</html>
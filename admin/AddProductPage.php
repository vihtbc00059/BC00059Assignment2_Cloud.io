<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add product</title>
    <link rel="stylesheet" href="CSS/ProductManageStyle.css">
    <script src="JS/ProductManageScript.js"></script>
</head>
<body>
    <form action="AddProductProcessing.php" method="post" onsubmit="return ValidateForm()" enctype="multipart/form-data">
        <table id="AddProductTable">
            <tr>
                <th colspan="2" id="AddProductTH">
                    ADD PRODUCT
                </th>
            </tr>
            <tr>
                <td>
                    Product name
                </td>
                <td>
                    <input type="text" name="productname" id="productname">
                </td>
            </tr>
            <tr>
                <td>
                    Product type
                </td>
                <td>
                    <input type="radio" name="producttype" id="water" value="Water">Water
                    <input type="radio" name="producttype" id="cake" value="Cake">Cake
                </td>
            </tr>
            <tr>
                <td>
                    Price
                </td>
                <td>
                    <input type="number" name="price" id="price" value="20000" step="1000"> VND
                </td>
            </tr>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    <textarea name="description" id="description" cols="30" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                    <input type="file" name="image" id="image" accept="image/*">
                </td>
            </tr>
            <tr id="btnRow">
                <td colspan="2" >
                    <input type="submit" value="Add product" class="btn" name="btnAdd">
                    <input type="button" value="Clear" class="btn" onclick="ClearForm()">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
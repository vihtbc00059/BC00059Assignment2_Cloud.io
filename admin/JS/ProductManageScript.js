function ClearForm(){
    document.getElementsByTagName('form')[0].reset();
}

function ValidateForm(){
    var productname = document.getElementById('productname').value;
    
    var productype = "";
    if(document.getElementById('water').checked)
        productype = document.getElementById('water').value;
    if(document.getElementById('cake').checked)
        productype = document.getElementById('cake').value;

    var image = document.getElementById('image').value;
    
    if(productname == ""){
        alert("Product name is empty!");
        return false;
    }
    else if(productype == ""){
        alert("Product type is empty!");
        return false;
    }
    else if(image == ""){
        alert("Image is empty!");
        return false;
    }
    else{
        return true;
    }
}

function CheckLogin(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if(username == ""){
        alert("Username is empty!");
        document.getElementById('username').focus();
        return false;
    }
    else if(password == ""){
        alert("Password is empty!");
        document.getElementById('password').focus();
        return false;
    }
    else
        return true;
}

function LogOut(){
    var choose = confirm("Are you sure?");
    if(choose){
        window.location.href = "LogOut.php";
    }
}
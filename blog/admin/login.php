<?php
require_once "config.php";
global $conn;
//get all usernames and passwords from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
// fetch all posts as an associative array called $posts
$allusers = mysqli_fetch_all($result, MYSQLI_ASSOC);
//get the user entry from the form
$user = filter_input(INPUT_POST, "username");
$pass = filter_input(INPUT_POST, "password");
$loginSuccess = findUserandPass($allusers, $user, $pass);
function displaypage($loginsuccess){
    if($loginsuccess ==1){
        header("Location: adminindex.php");
    }
    else{
        displayErrorPage();
    }
}
displaypage($loginSuccess);

function displayErrorPage(){

    print <<<HERE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href = "../../cssbasic/style.css">
    <link rel = "icon" href = "../../assets/fabicon2.png">
    <script src="https://kit.fontawesome.com/8ecbe21a08.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


<div>
    <nav>
        <ul class ="navstandard">
            <li class = "navstandardcont" ><a href = "../../blog.html" class = "currentPage"> Back to Blog </a></li>
        </ul>
    </nav>
</div>
<div class = "blockquotefeat">
    <h3></h3>
    <blockquote class ="featureblockquote"> Inspire.
    </blockquote>
</div>

<div class = "Tansection">
<h3>Login</h3>
<p class = "note">Please Enter the correct Username and Password</p>
<form action = "../../blog/admin/login.php" method = "post">
    <div class = "formorderhor">
    <label for = "username">Username:</label>
        <input id ="username" name = "username"></div>
    <div class = "formorderhor">
    <label for = "password">Password:</label>
    <input id = "password" name = "password">
    </div>
    <button type ="submit" class = "formsubmitbutton">Submit</button>
</form>
<div>
    
</div>
</div>
HERE;


}

//compare the database with the user entry
function findUserandPass($usersdatabase, $user, $pass){
    $login = 0;
foreach($usersdatabase as $value){
    $userinfo = $value;

    foreach($userinfo as $a => $b){
        //search for the key username and password
            if($a == "username"){
                //compare entered username to data username
                if($b !== $user){
                    print "<br><p>Error User Not Found</p><br>";
                }

            }
            if($a == "password"){
                //compare entered password to data password
                if($b !== $pass){
                    print "<br><p>Error, Login Failed.</p><br>";
                }
                else{
                    $login = 1;
                }
            }
    }
}
return $login;
}



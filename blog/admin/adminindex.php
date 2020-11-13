<?php
//use sessions for the post search
//session_start();
//$sendResults = $_SESSION['search'];
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
<header>
    <a href = "../../index.html"><img class = "logo" src ="../../assets/snow-landscape-mountains-nature-59106.jpg" 
    alt = 
    ""></a>
    <h1>Tabei Design</h1>
</header>
<ul class ="navstandard">
            <li class = "navstandardcont" ><a href = "adminindex.php" class = "currentPage"> Admin Home </a></li>
            <li class = "navstandardcont"><a href = "addpost.php">Add Post</a></li>
            <li class = "navstandardcont"><a href = "adduser.php">Add User</a></li>
        </ul>
        
        <h2> Blog Administration</h2>

<div id ="allPosts">
<!--See all posts, add filters published, featured, not published-->
<!--script from postdatabase-->
</div>
<script>
    $(document).ready(function() {
        $("#allPosts").load("postdatabase.php"); //NAME OF THE PAGE TO ADD
    });
</script>
<div class = "centered">
<a href = "../../blog.html"><button class = "calltoaction">Log Out</button></a>
</div>
HERE;


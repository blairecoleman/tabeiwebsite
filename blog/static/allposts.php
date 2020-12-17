<?php
//display all live posts from database

print <<<HERE
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
<div class = "loading"></div>
<header>
    <a href = "../../index.html"><img class = "logo" src ="" alt = ""></a>
    <h1>Tabei Design</h1>
</header>
<div >
    <nav>
        <ul class ="navstandard">
            <li><a href = "../../index.html"><img class = "" src ="../../assets/TabeiLogotitle3.jpg" alt = ""></a></li>
            <li class = "navstandardcont" ><a href = "../../blog.html" class = "currentPage"> Back to Blog </a></li>
            
        </ul>
    </nav>
</div>
<div>
<h2>All Posts</h2>
<div>
<ul id = "allPostList">
</ul>
</div>
<script>
    $(document).ready(function() {
        $("#allPostList").load("allpostcontent.php"); //NAME OF THE PAGE TO ADD
    });
</script>
<div id = "footer"></div>
<script>
    $(document).ready(function() {
        $("#footer").load("../../footer.php"); //NAME OF THE PAGE TO ADD
    });
</script>
</div>
<script>
    $(window).load(function() {
        $('#loading').hide();
    });
</script>
</body>
</html>
HERE;
?>
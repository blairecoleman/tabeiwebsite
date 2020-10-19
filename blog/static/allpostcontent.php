<?php
require_once "../admin/config.php";
function getPublishedPosts() {
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts WHERE published=true";
    $result = mysqli_query($conn, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $posts;


}
$display = getPublishedPosts();
//print_r($display);
foreach ($display as  $value){
    $post = $value;
    foreach($post as $a){
        print <<<HERE
<li>$a</li>
HERE;
    }

}

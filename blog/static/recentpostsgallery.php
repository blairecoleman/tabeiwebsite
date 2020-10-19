<?php
//grid of 5 most recent posts
require_once "../admin/config.php";
function getRecentPosts(){
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts WHERE published=true";
    $result = mysqli_query($conn, $sql);
    // fetch all posts as an associative array called $posts
    $allposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $recentid = count($allposts);

    $recentpost1 = $allposts[$recentid-1];
    $recentpost2 = $allposts[$recentid-2];
    $recentpost3 = $allposts[$recentid-3];
    $recentpost4 = $allposts[$recentid-4];
    $recentpost5 = $allposts[$recentid-5];

    $recentPosts = array($recentpost1,$recentpost2,$recentpost3,$recentpost4,$recentpost5);
    return $recentPosts;
}
$display = getRecentPosts();
foreach ($display as  $value){
    $post = $value;
    foreach($post as $a){
        //I will use if statement to display post title, description and image then display in a grid
        print <<<HERE
<li>$a</li>
HERE;
    }

}
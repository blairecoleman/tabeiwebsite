<?php
require_once "config.php";
//What if instead of using sessions, I just included one file in the other?
//session_start();


function getAllPosts() {
    // use global $conn object in function
    global $conn;
    $sql = "SELECT * FROM posts";
    $result = mysqli_query($conn, $sql);

    // fetch all posts as an associative array called $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $posts;

}

//Only works for exact Strings in the arrays
function nestedInArray($needle, $haystack) {
    $correctPost = array();
    foreach ($haystack as $item) {
        //print_r($item);
        //print $needle;
        $post = implode($item);
        //print $post;
        //$found = stripos($post, $needle);
        //if(in_array($needle, $item)){
           //return true;
        //}
        if(stripos($post, $needle) != false){
            //$position = stripos($post, $needle); //figure out how to pass this
            array_push($correctPost, $item);
        }

    }
    return $correctPost; //how to pass the results of an if and else sta
}

 function searchForResults ($display, $searchEntry){
 //Search all posts for the search term
     //print_r($display); // for a code validation
         $hasEntry = nestedInArray($searchEntry, $display);
         //print "<br><br> <p>This is hasEntry Variable</p>";
         //print_r($hasEntry);
       if (!empty($hasEntry)) {
           $validresults = $hasEntry;
           //print_r($validresults);
}
       else {
           $validresults = "<p class = 'note'>No Search Results</p>";
           print $validresults;
       }

     foreach($validresults as $value){
      $singlePost = displaypostresult($value);
     $postListing = implode($singlePost);
         print <<<HERE
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href = "../../cssbasic/style.css">
    <link rel = "icon" href = "../../assets/fabicon2.png">
    <script src="https://kit.fontawesome.com/8ecbe21a08.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div>
$postListing
</div>
<a href ="adminindex.php">Back to home</a>
</body>
</html>
HERE;
     }
     }


function displaypostresult($value){
    $title = "";
    $postImage = "";
    $date = "";
    $descript = "";
    foreach($value as $a => $b){

            if ($a == "title") {
                $title = "<h3>$b</h3>";
            }
            if ($a == "image") {
                $postImage = "<img src = '../../assets/$b' alt = 'post image'>";
            }
            if ($a == "datedraft") {
                $date = "<p>$b</p>";
            }
            if ($a == "description") {
                $descript = "<p>$b</p>";
            }

    }
    $postResult = array($title, $postImage, $date, $descript);
    return $postResult;
}
//display posts that have the search term
//print_r($display);
//foreach ($display as  $value){
    //$post = $value;
    //foreach($post as $a){
        //print <<<HERE
//<li>$a</li>
//HERE;
    //}

//}
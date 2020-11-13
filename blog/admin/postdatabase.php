<?php
require_once "config.php";
include_once "postsearch.php";


$searchEntry =  filter_input(INPUT_POST, "searchterm");
$allPostsArray = getAllPosts();


if($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST["searchterm"])){
  print <<<HERE
<h2>Search Results</h2>
HERE;
    print "<h3>Search Results for:</h3><br>";
    print ($_POST["searchterm"]);
    searchForResults($allPostsArray, $searchEntry);
}
else{
    print <<<HERE
<form action = "postdatabase.php" method = "post" class = "Tansection">
<div class = "formorderhor">
<label for = "searchterm">Search</label>
<input id = "searchterm" name ="searchterm">
</div>
<button type = "submit" class = "calltoaction">Search Posts</button>
</form>
HERE;

    foreach($allPostsArray as $value){
        $singlePost = displaypostresult($value);
        $postListing = implode($singlePost);
//how to send this back to be displayed on adminindex.php
        print <<<HERE
<div>
$postListing
</div>
HERE;
}
}
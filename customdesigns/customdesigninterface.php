<?php
print <<<HERE
<form action = "" method = "post">
<div class  = "formorderhor">
        <input type = "radio" value = "Blog" name = "webOption" id = "blog">
        <label for = "blog">Blog</label>
        <input type = "radio" value = "Store" name = "webOption" id = "store">
        <label for = "store">Store</label>
        <input type = "radio" value = "Non-profit" name = "webOption" id = "nonprofit">
        <label for = "nonprofit">Non-Profit</label>
        </div>
<input type = "submit">
</form>
HERE;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sampleWebsite = $_POST["webOption"];
}
else {
    $sampleWebsite = "Blog";
}
print $sampleWebsite;
//call function
//Make a function that takes sampleWebsite and prints the specified html page



document.getElementsByClassName("pageChange").onclick = changeSamplePage();
document.getElementsByClassName("styleChange").onclick = changeSampleStyle();
function changeSamplePage(selectedPage){
    //accept the value of onclick
   switch (selectedPage){
       case "Blog":
           document.getElementById('sampleSite').src = "customdesigns/blog/index.html";
           break;
       case "Business":
           document.getElementById('sampleSite').src = "customdesigns/business/index.html";
           break;
       case "Non-Profit":
           document.getElementById('sampleSite').src = "customdesigns/nonprofit/index.html";
           break;
       default:
           document.getElementById('sampleSite').src = "customdesigns/blog/index.html";
           break;
   }
    //use that value to change the file path to a different page from custom designs folder
}
function checkCurrentPage(){
    //Checks the current sample page and pass to change style function
}
function changeSampleStyle(){
    //changes the link to a different set of stylesguides after accepting both current page and style selctions
}
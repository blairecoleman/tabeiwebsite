$("a").click(function(){
    var idVal = $(this).attr("href");
    $("html, body").animate({
        'scrollTop':$(idVal).offset().top
    }, 500);
});
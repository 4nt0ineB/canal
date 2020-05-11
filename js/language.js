$(document).ready(function(){
  $(".lang-flag").click(function(){
    $(".language-dropdown").toggleClass("open");
  });
  $("ul.lang-list li").click(function(){
    $("ul.lang-list li").removeClass("selected");
    $(this).addClass("selected");
    if($(this).hasClass('lang-en')){
      $(".language-dropdown").find(".lang-flag").addClass("lang-en").removeClass("lang-es").removeClass("lang-pt");
      $("#lang_selected").html("<p>FR</p>")
    }else if($(this).hasClass('lang-pt')){
      $(".language-dropdown").find(".lang-flag").addClass("lang-pt").removeClass("lang-es").removeClass("lang-en");
    $("#lang_selected").html("<p>PT</p>")
    }else{
      $(".language-dropdown").find(".lang-flag").addClass("lang-es").removeClass("lang-en").removeClass("lang-pt");
      $("#lang_selected").html("<p>ES</p>")
    }
    $(".language-dropdown").removeClass("open");
  });
})


// UP PAGE
$(function(){
  $(window).scroll(function(){
    if($(window).scrollTop()<445){
      $("#btnUp").fadeOut("fast");
    } else {
      $("#btnUp").fadeIn("fast");
    }
  });
  $("#btnUp").click(function() {
    $("html,body").animate({scrollTop: 0}, "fast");
  });
});
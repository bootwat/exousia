/*
jQuery ==================================================
*/
$(function() {
  Pace.on("done", function() {
    $(".preloader").fadeOut(800);
  });

  //Clear Previous Data onLoad();
  $("form input").val("");
  $("form textarea").val("");
});

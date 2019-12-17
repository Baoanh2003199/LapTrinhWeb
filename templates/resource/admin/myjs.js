function expandChildUL() {
  $(".parentUL").click(function(e) {
    var child = $(this).children();
    console.log(child[1]);
    var childUL = child[1];
    if ($(childUL).css("display") == "block") {
      $(childUL).css("display", "none");
    } else {
      $(childUL).css("display", "block");
    }
  });
}
function closeMenu(params) {
  $(".menuTitle").click(function(e) {
    var parent = $(this).parent();
    $(parent).css("display", "none");
    var iconMenu = $(".iconMenu");
    $(iconMenu).css("display", "block");
    $(".right").addClass("rightAffterClick");
  });
}
function expandMenu(params) {
  $(".iconMenu").click(function(e) {
    $(".left").css("display", "block");
    $(this).css("display", "none");
    $(".right").removeClass("rightAffterClick");
  });
}

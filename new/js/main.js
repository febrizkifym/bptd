window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    $(".navbar").addClass("scrollmode");
    }    else {
    $(".navbar").removeClass("scrollmode");
  }
}
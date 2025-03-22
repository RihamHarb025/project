$(document).ready(function () {
    let texts = ["The best recipes", "The best premuim meals", "The best dishes for every occasion"];
    let index = 0;

    function changeText() {
        $("#animated-text").css({ transform: "translateY(-20px)", opacity: 0 });
        setTimeout(() => {
            index = (index + 1) % texts.length;
            $("#animated-text").text(texts[index]).css({ transform: "translateY(20px)" });
            setTimeout(() => {
                $("#animated-text").css({ transform: "translateY(0)", opacity: 1 });
            }, 200);
        }, 800);
    }
    setTimeout(() => {
        $("#animated-text").css({ opacity: 1 });
    }, 500);
    setInterval(changeText, 3000);

    function checkVisibility() {
        $('.card').each(function() {
          var card = $(this);
          var windowHeight = $(window).height();
          var cardTop = card.offset().top;
          var cardBottom = cardTop + card.outerHeight();
  
          if (cardTop < $(window).scrollTop() + windowHeight && cardBottom > $(window).scrollTop()) {
            card.removeClass('opacity-0 translate-y-12').addClass('opacity-100 translate-y-0 transition-all duration-1000');
          }
        });
      }
      $(window).on('scroll', function() {
        checkVisibility();
      });
  
      checkVisibility();
});
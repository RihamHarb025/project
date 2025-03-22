$(document).ready(function () {
    let texts = ["The best recipes", "The best premuim meals", "The best dishes for every occasion"];
    let index = 0;

    function changeText() {
        // Fade out the text and move it up
        $("#animated-text").css({ transform: "translateY(-20px)", opacity: 0 });

        // Wait a bit before changing text
        setTimeout(() => {
            index = (index + 1) % texts.length; // Cycle through the texts array
            $("#animated-text").text(texts[index]).css({ transform: "translateY(20px)" });

            // After changing the text, fade it back in and move it to original position
            setTimeout(() => {
                $("#animated-text").css({ transform: "translateY(0)", opacity: 1 });
            }, 200); // Small delay to ensure smooth transition
        }, 800); // Wait time before changing the text
    }

    // Fade in the initial text
    setTimeout(() => {
        $("#animated-text").css({ opacity: 1 });
    }, 500); // Fade in delay (ensure text appears after a short delay)

    // Change the text every 3 seconds
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
  
      // Trigger the checkVisibility function when the page is scrolled
      $(window).on('scroll', function() {
        checkVisibility();
      });
  
      // Initial check for visibility
      checkVisibility();
});
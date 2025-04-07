$(document).ready(function () {

    $('#menu-toggle').click(function() {
        $('#menu').toggleClass('show'); // Toggle the 'show' class
    });
  let texts = ["The best recipes", "The best premium meals", "The best dishes for every occasion"];
  let index = 0;

  function changeText() {
      console.log("Changing text...");

      // Animate the text out (fade out and slide up)
      $("#animated-text").css({
          opacity: 0,
          transform: "translateY(-20px)" // Slide up while fading out
      });

      // After the text fades out, change the text and animate back in
      setTimeout(function() {
          index = (index + 1) % texts.length;
          $("#animated-text").text(texts[index]);

          // Animate the text in (fade in and slide down)
          $("#animated-text").css({
              opacity: 1,
              transform: "translateY(0)" // Slide down into position
          });
      }, 1000); // Wait for the fade out and slide up to finish before changing the text
  }

  // Initially show the text (fade in and slide into place)
  setTimeout(() => {
      $("#animated-text").css({ opacity: 1, transform: "translateY(0)" });
  }, 500);

  // Change text every 3 seconds
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

// Trigger the visibility check when scrolling
$(window).on('scroll', function() {
    checkVisibility();
});

// Initial check when the page loads
checkVisibility();


let stickyHeader = $('#header').clone().attr('id', 'sticky-header').appendTo('body');

// Style the sticky header properly
$('#sticky-header').css({
    'position': 'fixed',
    'top': '0',
    'left': '0',
    'width': '100%',
    'z-index': '1000',
    'background-color': 'white',
    'box-shadow': '0 4px 6px rgba(0, 0, 0, 0.1)',
    'opacity': '0',
    'transform': 'translateY(-20px)', // Initially moved up
    'transition': 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out',
    'pointer-events': 'none' // Prevent it from interfering when hidden
});

let triggerPoint = 400; // Adjust as needed

$(window).scroll(function () {
    if ($(window).scrollTop() > triggerPoint) {
        $('#sticky-header').css({
            'opacity': '1',
            'transform': 'translateY(0)',
            'pointer-events': 'auto' // Allow interactions when visible
        });
    } else {
        $('#sticky-header').css({
            'opacity': '0',
            'transform': 'translateY(-20px)',
            'pointer-events': 'none' // Disable interactions when hidden
        });
    }
});

const modal = $("#register-modal");
const closeModal = $("#close-modal");
const profileBtn = $("#profile-btn");

profileBtn.click(function (event) {
    if (!isAuthenticated) {
        event.preventDefault(); // Prevent navigation
        modal.removeClass("hidden");
        $("body").css("overflow", "hidden"); // Disable scrolling
    }
});

closeModal.click(function () {
    modal.addClass("hidden");
    $("body").css("overflow", "auto"); // Enable scrolling
});

// Close modal if user clicks outside of it
$(window).click(function (event) {
    if ($(event.target).is(modal)) {
        modal.addClass("hidden");
        $("body").css("overflow", "auto"); // Enable scrolling
    }
});

const logoutBtn = $("#logout-btn");
const logoutModal = $("#logout-modal");
const cancelBtn = $("#cancel-btn");
const cancelLogout = $("#cancel-logout");

logoutBtn.click(function () {
  logoutModal.removeClass("hidden");
  $("body").css("overflow", "hidden"); // Disable scroll
});

cancelBtn.click(function () {
  logoutModal.addClass("hidden");
  $("body").css("overflow", "auto"); // Enable scroll
});

cancelLogout.click(function () {
  logoutModal.addClass("hidden");
  $("body").css("overflow", "auto"); // Enable scroll
});

// Optional: click outside modal to close
$(window).click(function (event) {
  if ($(event.target).is(logoutModal)) {
    logoutModal.addClass("hidden");
    $("body").css("overflow", "auto");
  }
});



$('#like-form').on('submit', function(e) {
    e.preventDefault();  // Prevent the form from submitting normally
    
    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(response) {
            // Toggle the like button text
            if (response.liked) {
                $('#like-btn').html('❤️ Liked');
            } else {
                $('#like-btn').html('🤍 Like');
            }
            
            // Update the like count
            $('#like-count').text(response.like_count);
        }
    });
});

$('#comment-form').on('submit', function(e) {
    e.preventDefault();  // Prevent the form from submitting normally

    $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(response) {
            // Append the new comment to the comments section
            $('#comments-section').prepend(`
                <div class="mb-4 border-b pb-3">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-gray-800">${response.comment.user_name}</span>
                        <span class="text-sm text-gray-500">${response.comment.created_at}</span>
                    </div>
                    <p class="mt-2 text-gray-700">${response.comment.body}</p>
                </div>
            `);

            // Clear the comment textarea after submission
            $('textarea[name="body"]').val('');
        }
    });
});

});


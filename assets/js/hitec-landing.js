/**
 * Hi-Tec Landing Page JavaScript
 */
;(($) => {
  // Document ready
  $(document).ready(() => {
    // Smooth scroll for anchor links
    $('a[href^="#"]').on("click", function (event) {
      var target = $(this.getAttribute("href"))
      if (target.length) {
        event.preventDefault()
        $("html, body").stop().animate(
          {
            scrollTop: target.offset().top,
          },
          1000,
        )
      }
    })

    // Optional: Add animations when elements come into view
    function animateOnScroll() {
      $(".hitec-product-item, .hitec-benefit-item").each(function () {
        var elementPosition = $(this).offset().top
        var topOfWindow = $(window).scrollTop()
        var windowHeight = $(window).height()

        if (elementPosition < topOfWindow + windowHeight - 100) {
          $(this).addClass("animated")
        }
      })
    }

    // Run on scroll
    $(window).on("scroll", animateOnScroll)
    // Run once on page load
    animateOnScroll()
  })
})(jQuery)


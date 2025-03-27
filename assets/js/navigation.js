/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
;(($) => {
  // Primary Navigation toggle
  $(".menu-toggle").on("click", function () {
    $(this).toggleClass("active")
    $(".primary-menu").toggleClass("active")
  })
})(jQuery)


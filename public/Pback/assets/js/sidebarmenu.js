$(function () {
  "use strict";

  // Remove any active class from sidebar items
  $('.sidebar-item').removeClass('active');

  // Add active class to the current URL's corresponding sidebar item
  var url = window.location.href;
  $('#sidebarnav a[href="' + url + '"]').closest('.sidebar-item').addClass('active');

  // Handle click event on sidebar items
  $('.sidebar-link').on('click', function () {
      // Remove active class from all sidebar items
      $('.sidebar-item').removeClass('active');
      // Add active class to the clicked sidebar item
      $(this).closest('.sidebar-item').addClass('active');
  });
});

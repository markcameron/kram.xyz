$(function() {

  // Hide alerts after a while
  setTimeout(function() {
    $(".alert").hide('slow')
  }, 7500);

  // Datepicker
  $(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    todayHighlight: true,
    autoclose: true
  });

  $(".wysiwyg").wysihtml5();

  // Toggle the status of a content type
  $(document).on('click', '.change-status', function(e) {
    e.preventDefault();

    var link = $(this);
    var href = link.attr('href');

    $.ajax ({
      type: 'GET',
      dataType: 'json',
      url: href,
      success: function(data) {
        link.parent().html(data.button);
      }
    });
  });

});

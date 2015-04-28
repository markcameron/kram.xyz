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

});

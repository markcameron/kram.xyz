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

  // Display a popup to confirm the delete of an element
  $('.delete-confirm-dialog').on('click', function(e){
    e.preventDefault();
    var delete_url = $(this).parent().attr('action');

    BootstrapDialog.show({
      type: BootstrapDialog.TYPE_DANGER,
      title: "Confirm delete.",
      message: 'Are you sure you want to delete this? The operation cannot be reversed.',
      buttons: [{
        label: 'Cancel',
        action: function(dialogItself) {
          dialogItself.close();
        },
      }, {
        label: 'DELETE',
        cssClass: 'btn-primary',
        action: function(dialogItself) {
          $.ajax({
            url: delete_url,
            type: "DELETE",
            headers: {
              'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(result){
              location.reload();
            }
          });
        },
      }]
    });
  });

});

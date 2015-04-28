$(function() {

  // Remove Image on X click
  $(document).on('click', '.remove-single-image', function(e) {
    e.preventDefault();

    $(this).closest('.form-group').children('.image-upload').show();
    $(this).closest('.image-display').remove();
  });

  $(document).on('blur', '.image-display input[name="media_alt"], .image-display input[name="media_title"]', function() {
    var text = $(this).val();
    var id = $(this).closest('.image-display').data('id');
    var type = $(this).data('type');
    var scope = $(this).closest('.image-display').data('scope');
    var model_name = $(this).closest('.image-display').data('model-name');
    var model_id = $(this).closest('.image-display').data('model-id');

    $.ajax({
      method: 'POST',
      url: "/admin/macros/dropzone-update-meta/"+ model_name +"/"+ model_id +"/"+ scope,
      data: {
        text: text,
        id: id,
        type: type,
      },
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
      },
    });
  });

});

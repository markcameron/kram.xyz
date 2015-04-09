<div id="{{ $type }}-dropzone">
  <div id="{{ $type }}-actions" class="row">

    <div class="col-sm-12">
      <!-- The fileinput-button span is used to style the file input field as button -->
      <span class="btn btn-success {{ $type }}-fileinput-button dz-clickable">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add Files</span>
      </span>
      <button class="btn btn-primary start" type="submit">
        <i class="glyphicon glyphicon-upload"></i>
        <span>Upload</span>
      </button>
      <button class="btn btn-warning cancel" type="reset">
        <i class="glyphicon glyphicon-ban-circle"></i>
        <span>Cancel upload</span>
      </button>
    </div>

    <div class="col-sm-12">
      <!-- The global file processing state -->
      <span class="fileupload-process">
        <div aria-valuenow="0" aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress progress-striped total-progress active" id="{{ $type }}-total-progress">
          <div data-dz-uploadprogress="" style="width:0%;" class="progress-bar progress-bar-success"></div>
        </div>
      </span>
    </div>

  </div>

  <div class="table table-striped previews {{ $type }}-previews todo-list" class="files">
    @foreach($files as $file)
      <div  id="media_id_{{ $file->id }}" class="file-row dz-image-preview dz-processing dz-success" data-id="{{ $file->id }}">
        <div>
          <span class="handle ui-sortable-handle">
            <i class="fa fa-ellipsis-v"></i>
            <i class="fa fa-ellipsis-v"></i>
          </span>
        </div>
        <div style="width:96px;">
          <span class="preview">
            @if ($image = Imagecache::get($file->filename, '80x80'))
              {{ $image->img }}
            @endif
          </span>
        </div>

        <div>
          <div class="input-group">
            <span class="input-group-addon">Alt</span>
            {!! Form::text('alt', $file->alt, ['class' => 'alt form-control', 'data-type' => 'alt', 'autocomplete' => 'off']) !!}
          </div>
          <div class="input-group" style="margin-top:10px">
            <span class="input-group-addon">Title</span>
            {!! Form::text('title', $file->title, ['class' => 'title form-control', 'data-type' => 'title', 'autocomplete' => 'off']) !!}
          </div>
        </div>
        <div>
          <p class="size" data-dz-size></p>
          <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
          </div>
        </div>
        <div>
          <a href="{!! route('admin.dropzone_delete', [$model_name, $model->id, $file->id]) !!}" data-dz-remove class="btn btn-danger delete">
            <i class="glyphicon glyphicon-trash"></i>&nbsp;
            <span>Delete</span>
          </a>
        </div>
      </div>
    @endforeach
  </div>

  <div class="row">
    <div class="table table-striped" class="files" id="previews-dropzone">

        <div id="{{ $type }}-template" class="file-row">
          <!-- This is used as the file preview template -->
          <div>
            <span class="handle ui-sortable-handle">
              <i class="fa fa-ellipsis-v"></i>
              <i class="fa fa-ellipsis-v"></i>
            </span>
          </div>
          <div>
            <span class="preview"><img data-dz-thumbnail /></span>
          </div>
          <div>
            <div class="input-group">
              <span class="input-group-addon">Alt</span>
              {!! Form::text('alt', NULL, ['class' => 'alt form-control', 'data-type' => 'alt']) !!}
            </div>
            <div class="input-group" style="margin-top:10px">
              <span class="input-group-addon">Title</span>
              {!! Form::text('title', NULL, ['class' => 'title form-control', 'data-type' => 'title']) !!}
            </div>
            <strong class="error text-danger" data-dz-errormessage></strong>
          </div>
          <div>
            <p class="size" data-dz-size></p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
            </div>
          </div>
          <div>
            <button class="btn btn-primary start">
              <i class="glyphicon glyphicon-upload"></i>
              <span>Upload</span>
            </button>
            <button data-dz-remove class="btn btn-warning cancel">
              <i class="glyphicon glyphicon-ban-circle"></i>
              <span>Annuler</span>
            </button>
            <a href="" class="btn btn-danger delete">
              <i class="glyphicon glyphicon-trash"></i>
              <span>Effacer</span>
            </a>
          </div>
        </div>

    </div>

  </div>
</div>

@section('js')

  @parent

  <script>
   (function () {
     var scope = "{{ $type }}";

     // Get the template HTML and remove it from the document template HTML and remove it from the document
     var previewNode = document.querySelector("#"+ scope +"-template");
     previewNode.id = "";
     var previewTemplate = previewNode.parentNode.innerHTML;
     previewNode.parentNode.removeChild(previewNode);

     var weight = 0;
     var dropzone = [];
     dropzone[scope] = new Dropzone("#"+ scope +"-dropzone", {
       url: "/admin/ajax/dropzone-upload/{{ $model_name }}/{{ $model->id }}/"+ scope,
       thumbnailWidth: 80,
       thumbnailHeight: 80,
       parallelUploads: 1,
       previewTemplate: previewTemplate,
       // Make sure the files aren't queued until manually added
       autoQueue: true,
       // Define the container to display the previews
       previewsContainer: "."+ scope +"-previews",
       // Define the element that should be used as click trigger to select files.
       clickable: "."+ scope +"-fileinput-button",
       success: function (file, response) {
         file.previewElement.querySelector(".delete").href = "/admin/ajax/dropzone-delete/{{ $model_name }}/{{ $model->id }}/"+ response.id;
         file.previewElement.setAttribute('id', 'media_id_' + response.id);
         file.previewElement.setAttribute('data-id', response.id);
         file.previewElement.classList.add("dz-success");
         file.previewElement.querySelector(".delete").addEventListener("click", function (e) {
           e.preventDefault();
           e.stopPropagation();

           var url = this.href;

           return $.ajax({
             method: 'POST',
             url: url,
             headers: {
               'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
             },
             success: function (data, status) {
               if (file !== null) {
                 dropzone[scope].removeFile(file);
               }
             }
           });
         });
       },
     });

     dropzone[scope].on("addedfile", function(file) {
       // Hookup the start button
       file.previewElement.querySelector(".start").onclick = function() { dropzone[scope].enqueueFile(file); };
     });

     // Update the total progress bar
     dropzone[scope].on("totaluploadprogress", function(progress) {
       document.querySelector("#"+ scope +"-total-progress .progress-bar").style.width = progress + "%";
     });

     dropzone[scope].on("sending", function(file, xhr) {
       xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
       // Show the total progress bar when upload starts
       document.querySelector("#"+ scope +"-total-progress").style.opacity = "1";
       // And disable the start button
       file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
     });

     // Hide the total progress bar when nothing's uploading anymore
     dropzone[scope].on("queuecomplete", function(progress) {
       document.querySelector("#"+ scope +"-total-progress").style.opacity = "0";
     });

     // Setup the buttons for all transfers
     // The "add files" button doesn't need to be setup because the config
     // `clickable` has already been specified.
     document.querySelector("#"+ scope +"-actions .start").onclick = function() {
       dropzone[scope].enqueueFiles(dropzone[scope].getFilesWithStatus(Dropzone.ADDED));
     };
     document.querySelector("#"+ scope +"-actions .cancel").onclick = function() {
       dropzone[scope].removeAllFiles(true);
     };

     $(".{{ $type }}-previews .delete").each(function(index) {
       $(this).on("click", function(e) {
         e.preventDefault();

         var url = $(this).attr('href');
         var file = $(this).closest('.file-row');

         $.ajax({
           method: 'POST',
           url: url,
           headers: {
             'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
           },
           success: function (data, status) {
             file.remove();
           }
         });
       });
     });

     function throttle(f, delay){
       var timer = null;
       return function(){
         var context = this, args = arguments;
         clearTimeout(timer);
         timer = window.setTimeout(function(){
           f.apply(context, args);
         },
                                   delay || 500);
       };
     }

     $(document).ready(function() {

       $(document).on('blur', "#"+ scope +"-dropzone .alt, #"+ scope +"-dropzone .title", function() {
         var text = $(this).val();
         var id = $(this).closest('.file-row').data('id');
         var type = $(this).data('type');

         $.ajax({
           method: 'POST',
           url: "/admin/ajax/dropzone-update-meta/{{ $model_name }}/{{ $model->id }}/"+ scope,
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

       // jQuery UI sortable for the todo list
       $(".todo-list").sortable({
         placeholder: "sort-highlight",
         handle: ".handle",
         forcePlaceholderSize: true,
         zIndex: 999999,
         update: function( event, ui ) {
           var data = $(this).sortable("serialize");
           $.ajax({
             type: "POST",
             url: "/admin/ajax/dropzone-update-positions/{{ $model_name }}/{{ $model->id }}/"+ scope,
             data: data,
             context: document.body,
             headers: {
               'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
             },
             success: function(){
             }
           });
         },
       });

       $('.todo-list').mousedown(function(){
         document.activeElement.blur();
       });


     }); // END DOCUMENT READY

   })();

  </script>

@stop

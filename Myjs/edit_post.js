tinymce.init({
    selector: '#edit-content',
    plugins: ' image autosave ',
    toolbar: ' image ',
   
    menubar: false,
    statusbar: false,
    block_unsupported_drop: false,
    //toolbar: false,
    toolbar_location: 'bottom',
    skin: 'outside',
    images_upload_url: 'upimg.php',
    autosave_interval: "1s",
    autosave_ask_before_unload: false,
    autosave_prefix: "content-{query}-",
    autosave_restore_when_empty: true,
    //automatic_uploads: true,

    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    },
    
    //images_upload_base_path: '/php/myimages',
    
    
    /* enable automatic uploads of images represented by blob or data URIs*/
    //automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
      input.setAttribute('max-width', '10px');
  
      /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
      */
  
      input.onchange = function () {
        var file = this.files[0];
  
        var reader = new FileReader();
        reader.onload = function () {
          /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
          */

          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);
  
          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };
  
      input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });
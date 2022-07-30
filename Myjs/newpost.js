const form = document.querySelector( ".posting-area" ),
    unique_id = form.querySelector( ".unique_id" ).value,   
    inputTitle = form.querySelector( ".input-title" ),
    sendBtn = document.getElementById('submitbtn');
    dropdownbtn = document.getElementsByClassName( "dropdown-toggle" );
   
    //點選看板的下拉式選單後顯示出看板名稱
    $('.dropdown-menu a').click(function () {           
        $('.dropdown-toggle').text($(this).text());  
        $('.cid').val($(this).attr("value")); 
        $('.submit-btn').prop("disabled", false); 
    });   

    
    //根據輸入的文字行數自動調整標題textarea高度
       $('#autoresizing').on('input', function () {
        this.style.height = 'auto';
          
        this.style.height = 
                (this.scrollHeight) + 'px';
    });
   

    tinymce.init({
        selector: '#input-content',
        plugins: ' image autosave',
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

        entity_encoding: 'raw',      //解決&nbps的;this for remove &nbps tag.
        force_br_newlines : true,//啟用BR換行;use <br> to break;
        force_p_newlines : false, //停用P換行, disable <P> to break;
        forced_root_block : false, //移除開頭的



       

        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        
        
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
    


// @ts-ignore
form.onsubmit = ( e ) =>
{
    e.preventDefault();
}



function upport(){
    
    alert('44');
    console.log('44444');
}



// @ts-ignore
sendBtn.onclick = () =>
{   
    
    let xhr = new XMLHttpRequest();
    xhr.open( "POST", "php/insert-post.php", true );
    xhr.onload = () =>
    {
        if ( xhr.readyState === XMLHttpRequest.DONE )
        {
            if ( xhr.status === 200 )
            {
                if (   inputTitle.value != ""  && tinymce.activeEditor.getContent != ""  ){
                  
                inputTitle.value = "";    //送出後清空標題和內容
                tinymce.activeEditor.setContent("");

                
                //送出後清除localStorage
                localStorage.removeItem("title");
                localStorage.removeItem("content--draft");
                localStorage.removeItem("content--time");


                $(".successalert").fadeTo(2000, 500).slideUp(500, function(){
                    $(".successalert").slideUp(500);
                    window.location.assign("index.php");
                });
               
                               
                }else if( inputTitle.innerHTML == "" ){                    
                    $(".titlealert").fadeTo(2000, 500).slideUp(500, function(){
                        $(".titlealert").slideUp(500);
                    });
                }else if(tinymce.activeEditor.getContent() == "" && inputTitle.innerHTML != ""  ){
                    $(".contentalert").fadeTo(2000, 500).slideUp(500, function(){
                        $(".contentalert").slideUp(500);
                    });
                }
        
            }
        }
    }
    //@ts-ignore
    let formData = new FormData( form );
    xhr.send( formData );
}



//localstorage 暫存標題
function showTitle(){    
    inputTitle.addEventListener("keyup", function() { // this function will be executed whenever the content of the editableDiv changes
    title = this.value; // get contents of the title
    window.localStorage.setItem("title", title); // add them to the localStorage
});

    title = window.localStorage.getItem("title"); // get the saved divcontent
    if (title === null) {

    } else {
        inputTitle.innerHTML = title; // write it into the editableDiv
    }
}

setTimeout(( () => showTitle() ), 1000);


//localstorage 暫存內容
// function showContent(){
// if(!localStorage.getItem(".input-content"))
// localStorage.setItem(".input-content","");
// localStorage.content = localStorage.getItem(".input-content");
// $(".input-content").html(localStorage.content);
// $(".input-content").keyup(function(){
// localStorage.setItem(".input-content",$(this).val());
// });
// }

// setTimeout(( () => showContent() ), 1500);



// //暫存看板
// function showKanban(){
//     if(!localStorage.getItem(".dropdown-toggle"))
//     localStorage.setItem(".dropdown-toggle","點此選擇發文看板");
//     localStorage.Kanban = localStorage.getItem(".dropdown-toggle");
//     $(".dropdown-toggle").text(localStorage.Kanban);
//     $(".dropdown-toggle").click(function(){
//     localStorage.setItem(".dropdown-toggle",$(this).text());
//     });
//     }

// // setTimeout(( () => showKanban() ), 100);

// setInterval(( () => showKanban() ), 500);






  




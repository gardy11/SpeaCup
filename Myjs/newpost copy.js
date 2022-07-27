const form = document.querySelector( ".posting-area" ),
    unique_id = form.querySelector( ".unique_id" ).value,   
    //inputField = form.querySelector( ".input-field" ),
    inputTitle = form.querySelector( ".input-title" ),
    inputContent = form.querySelector( ".input-content" ),
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
   

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('myimg').setAttribute('src',e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    document.getElementById('post_img').onchange = function () { //set up a common class
        readURL(this);
    };


// @ts-ignore
form.onsubmit = ( e ) =>
{
    e.preventDefault();
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
                if (   inputTitle.value != ""  && inputContent.value != ""  ){
                  
                inputTitle.value = "";    //送出後清空標題和內容
                inputContent.value = "";
                
                //清除localStorage
                localStorage.removeItem(".input-title");
                localStorage.removeItem(".input-content");
                alert('文章發布成功');
                
                
                } if(inputTitle.innerHTML == ""){                    
                    $(".titlealert").fadeTo(2000, 500).slideUp(500, function(){
                        $(".titlealert").slideUp(500);
                    });
                }else if( inputTitle.innerHTML != "" && inputContent.value == ""){
                //}else {
                    // alert('請輸入內容');
                    $(".contentalert").fadeTo(2000, 500).slideUp(500, function(){
                        $(".contentalert").slideUp(500);
                    });
                }


                // if (inputTitle.innerHTML == ""){
                //     alert('請輸入標題');
                // }else if(inputContent.value == ""){
                //     alert('請輸入內容');
                //     }else{
                //         inputTitle.value = "";    //送出後清空標題和內容
                //         inputContent.value = "";
                //         //scrollToBottom();
                //         alert('文章發布成功');
                //         localStorage.removeItem("text");
                //     }                
            }
        }
    }
    //@ts-ignore
    let formData = new FormData( form );
    xhr.send( formData );
}


//暫存標題
function showTitle(){
if(!localStorage.getItem(".input-title"))//window物件，前面的window省略
localStorage.setItem(".input-title","");//這裡先判斷一下，做空白儲存，否則返回 NULL 顯示出來體驗不好，這裡的if大括號省去了
localStorage.title = localStorage.getItem(".input-title");//取值
$(".input-title").html(localStorage.title);//顯示
$(".input-title").keyup(function(){//這裡有很多，比如blur, change,keyup keydown, 還有做個定時器也行，實用於多欄位儲存
localStorage.setItem(".input-title",$(this).val());//重新儲存
});
}

setTimeout(( () => showTitle() ), 1000);

//暫存內容
function showContent(){
if(!localStorage.getItem(".input-content"))
localStorage.setItem(".input-content","");
localStorage.content = localStorage.getItem(".input-content");
$(".input-content").html(localStorage.content);
$(".input-content").keyup(function(){
localStorage.setItem(".input-content",$(this).val());
});
}

setTimeout(( () => showContent() ), 1500);

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





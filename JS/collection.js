$('.collection-btn').click(function() {
    return false;
}).mouseover(function() {
    $(this).attr('href', '#');
}) 


$(document).ready(function(){
  
     // if the user clicks on the collection button
     $('.collection-btn').on('click', function(){
        var post_id = $(this).data('id');
         //alert(post_id);
        $clicked_btn1 = $(this);

        if($clicked_btn1.hasClass('fa-bookmark-o')){
            action1 = 'collect';
        }else if($clicked_btn1.hasClass('fa-bookmark')){
            action1 = 'uncollect';
        }

        $.ajax({
            url: 'post.php',
            type: 'post',
            data: {
                'action1' : action1,
                'post_id' : post_id
            },
            success: function(data){
               
                res = JSON.stringify(data);

                if (action1 == 'collect'){
                    $clicked_btn1.removeClass('fa-bookmark-o');
                    $clicked_btn1.addClass('fa-bookmark');
                }else if (action1 == 'uncollect'){
                    $clicked_btn1.removeClass('fa-bookmark');
                    $clicked_btn1.addClass('fa-bookmark-o');
                }
                
                // display the number of likes and dislikes
                // $clicked_btn.siblings('span.likes').text(res.likes);
                // $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                // change button styling of the other button if user is reacting the second time to post
                // $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');

            }
           
        });
    });
    


});
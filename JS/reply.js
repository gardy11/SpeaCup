$( '#postStatus' ).click( function ()
{
      $statusTXT = $( '#status' ).val();
      $.post( `php/action.php?action=postStatus&status=${ $statusTXT }&postTo=<?php echo $_REQUEST['user_id'] ?>`,
            function ( res )
            {

                  loadStatus()
                  $( '#status' ).val( ' ' );
            } )
} )


$( document ).ready( function ()
{
      loadStatus()
} )

function loadStatus ()
{

      $.post( 'php/action.php?action=fetchAllStatus&uid=<?php echo $user_id ;?>', function ( res )
      {
            // alert( res );
            $( '#all-status' ).html( res )
      } )
}

function loadRelatedComment ( pid )
{
      $.post( `php/action.php?action=relatedComments&pid=${ pid }`, function ( res )
      {
            console.log( res );
            $( '#displayRelatedComment' + pid ).html( res );
            $( '#displayRelatedComment' + pid ).prev().hide();
      } )
}
const pswrField = document.querySelector( '.form input[type="password"] #m-password2 m-password3'),
      toggleBtn = document.querySelectorAll( ".form .field i" );

toggleBtn.onclick = () =>
{
      if ( pswrField.type == "password" )
      {
            pswrField.type = "text";
            toggleBtn.classList.add( "active" );
      } else
      {
            pswrField.type = "password"
            toggleBtn.classList.remove( "active" );
      }
}


var chatButton = document.querySelector( '.chatbox__button' );
var chatContent = document.querySelector( '.chat-area' );
var icons = {
    isClicked: '<img src="./images/icons/chatbox-icon.svg" />',
    isNotClicked: '<img src="./images/icons/chatbox-icon.svg" />'
}
// @ts-ignore
var chatbox = new InteractiveChatbox( chatButton, chatContent, icons );
chatbox.display();
chatbox.toggleIcon( false, chatButton );

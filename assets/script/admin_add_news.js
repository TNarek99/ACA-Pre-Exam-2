// Get the addNewsModal
var addNewsModal = document.getElementById('add-news-modal');

// Get the button that opens the addNewsModal
var addNewsButton = document.getElementById("add-news-button");

// Get the <addNewsSpan> element that closes the addNewsModal
var addNewsSpan = document.getElementsByClassName("close-add-news-modal")[0];

// When the post clicks on the button, open the addNewsModal
addNewsButton.onclick = function() {
    addNewsModal.style.display = "block";
}

// When the post clicks on <addNewsSpan> (x), close the addNewsModal
addNewsSpan.onclick = function() {
    addNewsModal.style.display = "none";
}

// When the post clicks anywhere outside of the addNewsModal, close it
window.onclick = function(event) {
    if (event.target == addNewsModal) {
        addNewsModal.style.display = "none";
    }
}
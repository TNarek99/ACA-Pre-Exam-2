// Get the addCategoryModal
var addCategoryModal = document.getElementById('add-category-modal');

// Get the button that opens the addCategoryModal
var addCategoryButton = document.getElementById("add-category-button");

// Get the <addCategorySpan> element that closes the addCategoryModal
var addCategorySpan = document.getElementsByClassName("close-add-category-modal")[0];

// When the category clicks on the button, open the addCategoryModal
addCategoryButton.onclick = function() {
    addCategoryModal.style.display = "block";
}

// When the category clicks on <addCategorySpan> (x), close the addCategoryModal
addCategorySpan.onclick = function() {
    addCategoryModal.style.display = "none";
}

// When the category clicks anywhere outside of the addCategoryModal, close it
window.onclick = function(event) {
    if (event.target == addCategoryModal) {
        addCategoryModal.style.display = "none";
    }
}
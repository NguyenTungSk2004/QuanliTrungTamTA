function handleImageSourceChange(idModal, selectedValue) {
    var ImageField = document.getElementById(idModal);
    var imageUrlField = ImageField.querySelectorAll('[name="imageUrlField"]');
    var uploadField = ImageField.querySelectorAll('[name="uploadField"]');

    if (selectedValue === "url") {
        imageUrlField.forEach(function(element) {
            element.style.display = "block";
        });
        uploadField.forEach(function(element) {
            element.style.display = "none";
        });
    } else if (selectedValue === "upload") {
        imageUrlField.forEach(function(element) {
            element.style.display = "none";
        });
        uploadField.forEach(function(element) {
            element.style.display = "block";
        });
    }
}

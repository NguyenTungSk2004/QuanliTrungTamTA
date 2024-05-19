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

try {
    var SelectionImageFieldAddCourse = document.querySelectorAll('#addCourse input[type="radio"][name="imageSource"]');
    SelectionImageFieldAddCourse.forEach(function(radio) {
      radio.addEventListener("change", function() {
        handleImageSourceChange("addCourse",this.value);
      });
    });
} catch (error) {
    console.error(error);
}

// Xóa khóa học
function deleteCourse(courseId) {
    if (confirm('Bạn có chắc chắn muốn xóa khóa học này không?')) {
        document.getElementById('deleteForm' + courseId).submit();
    }
  }
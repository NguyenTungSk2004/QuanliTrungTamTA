/**
 * Handles the change of image source in the specified modal.
 * @param {string} idModal - The ID of the modal element.
 * @param {string} selectedValue - The selected value indicating the image source ("url" or "upload").
 */
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

// Add event listeners to the radio input elements with the name "imageSource" inside the "addCourse" element.
try {
    /**
     * Represents a collection of radio input elements with the name "imageSource" inside the "addCourse" element.
     * @type {NodeList}
     */
    var SelectionImageFieldAddCourse = document.querySelectorAll('#addCourse input[type="radio"][name="imageSource"]');
    SelectionImageFieldAddCourse.forEach(function(radio) {
      radio.addEventListener("change", function() {
        handleImageSourceChange("addCourse",this.value);
      });
    });
} catch (error) {
    console.error(error);
}

try {
    /**
     * Represents a collection of radio input elements with the name "imageSource" inside the "editCourse" element.
     * @type {NodeList}
     */
    var SelectionImageFieldEditCourse = document.querySelectorAll('#editCourse input[type="radio"][name="imageSource"]');
    SelectionImageFieldEditCourse.forEach(function(radio) {
        radio.addEventListener("change", function() {
            handleImageSourceChange("editCourse",this.value);
        });
    });
} catch (error) {
    console.error(error);
}

/**
 * Deletes a course with the specified courseId.
 * 
 * @param {number} courseId - The ID of the course to be deleted.
 */
function deleteCourse(courseId) {
    if (confirm('Bạn có chắc chắn muốn xóa khóa học này không?')) {
        document.getElementById('deleteForm' + courseId).submit();
    }
  }



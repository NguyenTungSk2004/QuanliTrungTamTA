const SelectionImageField = document.querySelectorAll('input[type="radio"][name="imageSource"]');
// Lắng nghe sự kiện thay đổi của nút radio
SelectionImageField.forEach(function(radio) {
    radio.addEventListener("change", function() {
        // Lấy giá trị của nút radio được chọn
        var selectedValue = this.value;
        
        // Hiển thị hoặc ẩn các trường nhập tương ứng
        if (selectedValue === "url") {
            document.getElementById("imageUrlField").style.display = "block";
            document.getElementById("uploadField").style.display = "none";
        } else if (selectedValue === "upload") {
            document.getElementById("imageUrlField").style.display = "none";
            document.getElementById("uploadField").style.display = "block";
        }
    });
});

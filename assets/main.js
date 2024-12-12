
// function to load images on box if image are selecte
function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('preview');
    var imageName = document.getElementById('imageName');
    // Check if a file is selected
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            // Display selected image
            preview.src = e.target.result;
            preview.style.display = 'block';
            // Display image name
            imageName.innerText = input.files[0].name;
        }
        reader.readAsDataURL(input.files[0]); // Read the image file as a data URL
    } else {
        // Clear preview if no file is selected
        preview.src = '#';
        preview.style.display = 'none';
        imageName.innerText = '';
    }
}


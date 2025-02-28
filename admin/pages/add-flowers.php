<?php
if( isset ($_SESSION['username']) && isset( $_SESSION['password'] ) ) {

include_once ("config.php");

if (isset($_POST['add'])) {
    $msg = array();
    $flower_name = mysqli_real_escape_string($conn, $_POST['flower_name']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    if ($_FILES['images']['error'] === UPLOAD_ERR_OK) {

        //validate the size of images (images size must be less than or equal to 2 mb )
        if ($_FILES['images']['size'] >= 2 * 1024 * 1024) {
            $msg[] = "Image size must be less than 2MB";
            exit;
        }

        //validate file type (must be jpeg, jpg, and png )
        $allowed_type = ['image/jpeg', 'image/png', 'image/jpg'];
        $image_type = $_FILES['images']['type'];

        if (!in_array($image_type, $allowed_type)) {
            $msg[] = "Image type must be png, jpeg, or jpg";
            exit;
        }

        // Directory where uploaded images will be saved
        $uploadsDirectory = __DIR__ . "/uploads/";

        if (empty($msg)) {
            if (move_uploaded_file($_FILES['images']['tmp_name'], $uploadsDirectory . basename($_FILES['images']['name']))) {
                $uploadPath = $uploadsDirectory . basename($_FILES['images']['name']);
                $sql = "INSERT INTO flower(name, content, images) VALUES('{$flower_name}', '{$content}', '{$_FILES['images']['name']}' )";
                // echo $sql;
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    ?>
                    <script>
                        window.addEventListener("load", function () {
                            messagePopupHandle("Added Successfully!!!");
                        })
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        window.addEventListener("load", function () {
                            messagePopupHandle("Added Failed Due To Some Reason!!!");
                        })
                    </script>
                    <?php
                }
            }
        }


    }
}

?>


<div class="popup d-none ">
    <div class="popup-content">
        <button class="btn checkbtn"><i class="fa-solid fa-check"></i></button>
        <h1 id="thankyou" class="text-dark">Thank You!</h1>
        <h5 id="message" class="py-3 message text-dark"></h5>
        <div class="d-grid gap-2 my-3">
            <button class="btn popupOk" id="popupOk" name="" type="">OK</button>
        </div>


    </div>
</div>

<section class=" bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">

                            <form method="POST" enctype="multipart/form-data" action="">

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" name="flower_name"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example1cg">Flower's Name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <textarea name="content" class="form-control form-control-lg" id=""
                                        rows="10"></textarea>
                                    <label class="form-label" for="form3Example4cg">Content</label>
                                </div>
                                <div class="d-flex">
                                    <div class="col-4">
                                        <div data-mdb-input-init class="form-outline form-white">
                                            <!-- Modified file input to trigger onchange event -->
                                            <input type="file" name="images" id="img"
                                                class="form-control form-control-lg" onchange="previewImage(event)" />
                                            <label class="form-label" for="img">Upload Image</label>
                                        </div>
                                    </div>
                                    <!-- Container for displaying uploaded image -->
                                    <div id="imagePreview" class="image-container ms-5">
                                        <!-- Initially hidden, shown when an image is selected -->
                                        <img id="preview" src="#" alt="Uploaded Image" style="display:none;">
                                        <div id="imageName" class="image-name">Image Name</div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center py-3">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                        name="add">Add</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    //function to handle popup message box
    function messagePopupHandle(msg) {
        const popups = document.querySelectorAll(".popup");
        popups.forEach(function (popup) {
            popup.classList.add('d-block');
            popup.classList.remove('d-none');
            document.getElementById('message').innerText = msg;
            const popupOks = document.querySelectorAll('.popupOk');
            popupOks.forEach(function (popupOk) {
                popupOk.addEventListener('click', function () {
                    popup.classList.remove('d-block');
                    popup.classList.add('d-none');
                })
            })
        })
    }
</script>

<?php 

} else {
    header( "Location: http://localhost/flower-encyclopedia/admin/login.php");
}
?>

<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");

include_once("config.php");

    if( isset( $_POST['login'] ) ) {

        $username = mysqli_escape_string( $conn, $_POST['username'] );
        $password = mysqli_escape_string( $conn, $_POST['password'] );


    $sql = "SELECT * FROM users";

    $result = mysqli_query( $conn, $sql );

    if( mysqli_num_rows( $result ) > 0 ) {
        while( $row = mysqli_fetch_assoc( $result ) ) {
            if( $row['email'] === $username && $row['password'] === $password ) {
                ?>
            <script>
                window.addEventListener("load", function () {
                    messagePopupHandle("Login Successfully!!!");
                })
            </script>
            <?php
            } else {
                ?>
                <script>
                    window.addEventListener("load", function () {
                        messagePopupHandle("Login Failed, Username and password not matched!!!");
                    })
                </script>
                <?php
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

<section class="gradient-form">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="assets/images/login.webp" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 text-light mb-5 pb-1">We are The Lily's Bloom Team</h4>
                                </div>

                                <form method="POST" action="">
                                    <p class="text-light">Please login to your account</p>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form2Example11" name="username" class="form-control"
                                            placeholder="Phone number or email address" />
                                        <label class="form-label" for="form2Example11">Username</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="password" id="form2Example22" class="form-control" />
                                        <label class="form-label" for="form2Example22">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="login" type="submit">Log
                                            in</button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2 text-info">Don't have an account?</p>
                                        <a href="register.php" type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-outline-danger">Create new</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">We are more than just a company</h4>
                                <p class="small mb-0">"Lily's Bloom" captures the essence of the flower shop focusing on lilies, portraying them as the central attraction where they flourish and bloom beautifully. It's concise, easy to remember, and evokes a sense of growth and vitality associated with flowers.</p>
                            </div>
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
include_once ("includes/footer.php");

?>


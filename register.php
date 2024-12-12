<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");

include_once("config.php");

if( isset( $_POST['register'])) {
    $name = mysqli_real_escape_string( $conn, $_POST['name'] );
    $email= mysqli_real_escape_string( $conn, $_POST['email'] );
    $password= mysqli_real_escape_string( $conn, $_POST['password'] );
    $con_password= mysqli_real_escape_string( $conn, $_POST['c-password'] );

    if( $password === $con_password ) {
        $sql  = "INSERT INTO users(name, email, password ) VALUES ( '{$name}', '{$email}', '{$password}' )";
        $result = mysqli_query( $conn, $sql );
        if ($result) {
            ?>
            <script>
                window.addEventListener("load", function () {
                    messagePopupHandle("Register Successfully!!!");
                })
            </script>
            <?php
        } else {
            ?>
            <script>
                window.addEventListener("load", function () {
                    messagePopupHandle("Register Failed Due To Some Reason!!!");
                })
            </script>
            <?php
    }
    } else {
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('er-msg').textContent = 'Password and Confirm  Password must be matched.';
        });
        </script>
        <?php
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

<section class=" bg-image" style="background-image: url('assets/images/login.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center text-light mb-5">Create an account</h2>

                            <form method="POST" action="">

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="c-password" id="form3Example4cdg" class="form-control form-control-lg" />
                                    <label class="form-label" for="form3Example4cdg">Confirm password</label>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in Terms & Conditions.
                                    </label>
                                </div>

                                <p id="er-msg" class="text-danger"></p>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="register" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                                        class="fw-bold text-info"><u>Login here</u></a></p>

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
include_once ("includes/footer.php");

?>


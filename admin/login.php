<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");
include_once("../config.php");

if( isset( $_POST['login']))  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(  $username == "chandan@gmail.com" && $password == "chandan" ) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: http://localhost/flower-encyclopedia/admin");
    } else {
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('msg').textContent = 'Please enter valid username and password.';
        });
        </script>
        <?php
    }
}

?>



<section class="gradient-form">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="../assets/images/login.webp" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 text-light mb-5 pb-1">We are The Lily's Bloom Team</h4>
                                </div>

                                <form method="POST" action="">
                                    <p class="text-light">Please login to your account</p>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form2Example11" class="form-control"
                                            placeholder="Phone number or email address" value="" name="username"/>
                                        <label class="form-label" for="form2Example11">Username</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="form2Example22" value="" class="form-control" name="password" />
                                        <label class="form-label" for="form2Example22">Password</label>
                                    </div>
                                    <div class="text-center text-danger">
                                        <p id="msg"></p>
                                    </div>
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="login" type="submit">Log
                                            in</button>
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



<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");

?>

<div class="contact_us py-5 text-center">
    <div class="container cards text-center">
        <div class="row">
            <div class="col-lg-4 rounded">
                <div class="icon"><i class="fa-solid fa-phone"></i></div>
                <div class="heading text-capitalize">
                    <h3>call us now</h3>
                </div>
                <div class="information">9823196848</div>
            </div>
            <div class="col-lg-4 rounded">
                <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                <div class="heading text-capitalize">
                    <h3>Email for help</h3>
                </div>
                <div class="information">chandan@gmail.com</div>
            </div>
            <div class="col-lg-4 rounded">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="heading text-capitalize">
                    <h3>Location</h3>
                </div>
                <div class="information">Buddhanagar, Kathmandu, Nepal</div>
            </div>
        </div>
    </div>



    <section class="" style="">
        <div class="mask d-flex align-items-center h-100">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 ">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center text-light mb-5">feel free to contact us</h2>

                                <form>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1cg">Your Name</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example3cg">Your Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <textarea name="" class="form-control form-control-lg" id=""
                                            rows="10"></textarea>
                                        <label class="form-label" for="form3Example4cg">Message</label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="button" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send
                                            message</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map rounded text-center py-3">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.927050714707!2d85.32951860188965!3d27.69468421903351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199a06c2eaf9%3A0xc5670a9173e161de!2sNew%20Baneshwor%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1713780095786!5m2!1sen!2snp"
            width="1120" height="450" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<?php
include_once ("includes/footer.php");

?>


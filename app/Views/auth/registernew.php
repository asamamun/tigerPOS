<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/logregstyle.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>TigerPOS - Registration</title>
</head>

<body>
    <!-- flash message view -->
    <?php echo view("partial/flashmessage"); ?>

    <!-- blue circle background -->
    <div class="d-none d-md-block ball login bg-primary bg-gradient position-absolute rounded-circle"></div>

    <!-- logo name -->
    <div class="position-absolute top-0 start-0 p-3">
        <a href="tigerpos" class="text-decoration-none fw-bold fs-5">TigerPOS</a>
    </div>

    <!-- Register Section -->
    <div class="container register__form">
        <div class="row vh-100 w-100 align-self-center">
            <div class="d-none d-lg-block col-lg-6 col-xl-6 p-5">
                <div class="row vh-100 p-5">
                    <div class="col align-self-center p-5 text-center">
                        <img src="<?php echo base_url(); ?>/assets/images/register.png" class="bounce" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-6 px-5">
                <div class="row vh-100">
                    <div class="col align-self-center p-5 w-100">
                        <h3 class="fw-bolder">REGISTER HERE !</h3>
                        <p class="fw-lighter fs-6">Have an account, <span><?php echo anchor('/login', 'Sign In', ['class' => 'text-primary']); ?></span></p>
                        <!-- form register section -->
                        <!-- <form action="" class="mt-5"> -->
                        <?php echo form_open("register") ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" id="name" name="name" value="<?= old('name') ?>" class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" placeholder="Enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" id="email" name="email" value="<?= old('email') ?>" class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" id="password" name="password" class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3">
                                <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Re-type Password</label>
                            <div class="d-flex position-relative">
                                <input type="password" id="password_confirm" name="password_confirm" class="form-control text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3">
                                <span class="password__icon text-primary fs-4 fw-bold bi bi-eye-slash"></span>
                            </div>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="password_confirm" class="form-label">Re-type Password</label>
                            <div class="d-flex position-relative">
                                <input type="checkbox" id="agree" name="agree" class="form-check-input text-indent auth__password shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3">
                                <label class="form-check-label" for="agree">
                                    I agree all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div>
                        </div> -->
                        <div class="col text-center">
                            <button type="submit" class="btn btn-outline-dark btn-lg rounded-pill mt-4 w-100">Sign Up</button>
                        </div>
                        <?= form_close() ?>
                        <!-- </form> -->

                        <p class="mt-5 text-center">Or Sign in with social platforms</p>
                        <div class="row text-center">
                            <div class="col mt-3">
                                <a href="" class="btn btn-outline-dark border-2 rounded-circle"><i class="bi bi-facebook fs-5"></i></a>
                            </div>
                            <div class="col mt-3">
                                <a href="" class="btn btn-outline-dark border-2 rounded-circle"><i class="bi bi-linkedin fs-5"></i></a>
                            </div>
                            <div class="col mt-3">
                                <a href="" class="btn btn-outline-dark border-2 rounded-circle"><i class="bi bi-twitter fs-5"></i></a>
                            </div>
                            <div class="col my-3">
                                <a href="" class="btn btn-outline-dark border-2 rounded-circle"><i class="bi bi-google fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/logregscript.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-3.5.1.js"></script>
</body>

</html>
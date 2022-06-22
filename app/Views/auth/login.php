<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css" />
  <title>Document</title>
</head>

<body>
  <div class="container">

    <!-- flash message view -->
    <?php echo view("partial/flashmessage"); ?>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100 py-5">
          <div class="col-md-8 col-lg-6 offset-xl-1 border rounded p-5 bg-secondary">
            <?php echo form_open("login"); ?>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" value="<?= old('email') ?>" />
              <label class="form-label" for="email">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required />
              <label class="form-label" for="password">Password</label>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            </div>

            <?php echo form_close() ?>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="<?php echo base_url() ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/js/jquery-3.5.1.js"></script>
</body>
</html>
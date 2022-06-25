<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- create account form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
</div>
<!-- new account form -->
<h1>New Account</h1>
<?php echo form_open('accounts/create'); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="account_number">Account Number</label>
    <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Enter account number">
</div>

<div class="form-group">
    <label for="balance">Balance</label>
    <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter balance">
</div>

<button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
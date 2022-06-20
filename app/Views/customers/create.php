<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- create customer form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>        
        </div>
    <?php endif; ?>
</div>
<!-- new customer form -->
<h1>New Customer</h1>
<?php echo form_open('customers/create'); ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
</div>
<div class="form-group">
    <label for="mobile">Mobile</label>
    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
</div>
<div class="form-group">
    <label for="expense">Expense</label>
    <input type="text" class="form-control" id="expense" name="expense" placeholder="Enter expense">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- edit account form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>        
        </div>
    <?php endif; ?>
</div>
<!-- edit account form -->
<h1>Account Info</h1>
<?php echo form_open('accounts/edit/'.$account['id']); ?>

<?php echo form_hidden("id",$account['id']); ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= $account['name'] ?>">
</div>
<div class="form-group">
    <label for="account_number">Account Number</label>
    <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Enter account number" value="<?= $account['account_number'] ?>">
</div>
<div class="form-group">
    <label for="category_id">Balance</label>
    <input type="text" class="form-control" id="balance" name="balance" placeholder="Enter balance" value="<?= $account['balance'] ?>">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
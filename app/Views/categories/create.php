<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- create category form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>        
        </div>
    <?php endif; ?>
</div>
<!-- new category form -->
<h1>New Cagetory</h1>
<?php echo form_open('categories/create'); ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
</div>
<button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
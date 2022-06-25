<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- edit category form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>        
        </div>
    <?php endif; ?>
</div>
<!-- edit category form -->
<h1>Category Info</h1>
<?php echo form_open('categories/edit/'.$category['id']); ?>

<?php echo form_hidden("id",$category['id']); ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= $category['name'] ?>">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
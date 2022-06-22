<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- create products form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
</div>
<!-- new product form -->
<h1>New Products</h1>
<?php echo form_open('products/create'); ?>
<div class="form-group">
    <label for="barcode">Barcode</label>
    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter barcode">
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
</div>
<div class="form-group">
    <label for="company_name">Company Name</label>
    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name">
</div>

<!-- category_id -->
<div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
        <option selected>select</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>

<!-- supplier_id -->
<div class="form-group">
    <label for="supplier_id">Category</label>
    <select class="form-select" id="supplier_id" name="supplier_id" aria-label="Default select example">
        <option selected>select</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>

<div class="form-group">
    <label for="wholesale_price">Wholesale Price</label>
    <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" placeholder="Enter wholesale price">
</div>
<div class="form-group">
    <label for="retail_price">Wholesale Price</label>
    <input type="text" class="form-control" id="retail_price" name="retail_price" placeholder="Enter retail price">
</div>
<div class="form-group">
    <label for="purchase_price">Purchase Price</label>
    <input type="text" class="form-control" id="purchase_price" name="purchase_price" placeholder="Enter purchase price">
</div>
<div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" rows="3"></textarea>
</div>

<div class="form-group">
    <label for="tax">Tax</label>
    <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter tax">
</div>

<button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
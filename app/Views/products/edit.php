<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<!-- edit product form -->
<div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>        
        </div>
    <?php endif; ?>
</div>
<!-- edit product form -->
<h1>Product Info</h1>
<?php echo form_open('products/edit/'.$product['id']); ?>

<?php echo form_hidden("id",$product['id']); ?>
<div class="form-group">
    <label for="barcode">Barcode</label>
    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter barcode" value="<?= $product['barcode'] ?>">
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?= $product['name'] ?>">
</div>
<div class="form-group">
    <label for="company_name">Company Name</label>
    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name" value="<?= $product['company_name'] ?>">
</div>
<div class="form-group">
    <label for="category_id">Cateogry Name</label>
    <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Enter category name" value="<?= $product['category_id'] ?>">
</div>
<div class="form-group">
    <label for="supplier_id">Supplier Name</label>
    <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="Enter supplier name" value="<?= $product['supplier_id'] ?>">
</div>
<div class="form-group">
    <label for="wholesale_price">Wholesale Price</label>
    <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" placeholder="Enter wholesale price" value="<?= $product['wholesale_price'] ?>">
</div>
<div class="form-group">
    <label for="retail_price">Retail Price</label>
    <input type="text" class="form-control" id="retail_price" name="retail_price" placeholder="Enter retail price" value="<?= $product['retail_price'] ?>">
</div>
<div class="form-group">
    <label for="purchase_price">Purchase Price</label>
    <input type="text" class="form-control" id="purchase_price" name="purchase_price" placeholder="Enter purchase price" value="<?= $product['purchase_price'] ?>">
</div>
<div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" value="<?= $product['quantity'] ?>">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"><?= $product['description'] ?></textarea>
</div>
<div class="form-group">
    <label for="tax">Tax</label>
    <input type="text" class="form-control" id="tax" name="tax" placeholder="Enter tax" value="<?= $product['tax'] ?>">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close(); ?>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<?= $this->endSection(); ?>
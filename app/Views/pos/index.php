<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="card m-2">
    <div class="card-header">
        <h2>Add Sale</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label for="price" class="form-label">Select Price</label>
                <select class="form-select" id="price" name="price" aria-label="Default select example">
                    <option value="-1" selected>Select</option>
                    <option value="1">Wholesale Price</option>
                    <option value="2">Retail Price</option>
                    <option value="3">Purchase Price</option>
                </select>
            </div>
            <div class="col-md-4">
                <div>
                    <label for="invoice" class="form-label">Invoice:</label>
                    <input type="text" class="form-control" id="invoice" name="invoice" placeholder="Invoice No." />
                    <label class="text-secondary">Keep blank to auto generate</label>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <label for="date" class="form-label">Sale Date</label>
                    <input type="datetime-local" class="form-control" id="date" name="date" />
                </div>
            </div>

            <div class="col-md-6">
                <div>
                    <label for="customer" class="form-label">Customer</label>
                    <input type="search" class="form-control" id="customer" name="customer" />
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div class="m-2">
                            <h6>Billing Address:</h6>
                            <p>53/2, North Manikdi, Dhaka Cantonment, Dhaka-1206</p>
                        </div>
                        <div class="m-2">
                            <h6>Shipping Address:</h6>
                            <p>53/2, North Manikdi, Dhaka Cantonment, Dhaka-1206</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="sr" class="form-label">Sales Representative</label>
                    <input type="search" class="form-control" id="sr" name="sr" />
                </div>
                <div class="card my-2">
                    <div class="card-body">
                        <div class="m-2">
                            <h6>Name:</h6>
                            <p>Syed Zayed Hossain</p>
                        </div>
                        <div class="m-2">
                            <h6>Mobile:</h6>
                            <p>01629999666</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card m-2 mt-3">
    <div class="card-header">
        Add Product(s)
    </div>
    <div class="card-body">
        <div>
            <input type="text" class="form-control auto" id="productsearch" name="productsearch" placeholder="Enter Product Name/SKU/Scan Bar Code" />
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product(s)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Warranty</th>
                        <th scope="col">x</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>x</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-3">
                <p><b>Item(s):</b> 0.00</p>
            </div>
            <div class="col-md-3">
                <p><b>Total: </b> &#2547; 0.00</p>
            </div>
        </div>
    </div>
</div>

<div class="card m-2 mt-3">
    <div class="card-header">
        Add Discount
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label for="discount" class="form-label">Discount Type</label>
                <select class="form-select" id="discount" name="discount" aria-label="Default select example">
                    <option value="-1" selected>Select</option>
                    <option value="1">Fixed</option>
                    <option value="2">Percentage</option>
                </select>
            </div>
            <div class="col-md-4">
                <div>
                    <label for="discountamount" class="form-label">Discount Amount</label>
                    <input type="text" class="form-control" id="discountamount" name="discountamount" placeholder="0.00" />
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div>
                    <p><b>Discount Amount:(-)</b> <span>0.00</span></p>
                </div>
            </div>
            <div class="pt-3">
                <label for="salenote" class="form-label">Sale Note</label>
                <textarea class="form-control" name="salenote" id="salenote"></textarea>
            </div>
        </div>
    </div>
    <div class="text-end me-3">
        <p><b>Total Payable: </b> <span>0.00</span></p>
    </div>
</div>
<div class="card m-2 mt-3">
    <div class="card-header">
        Add Payment
    </div>
    <div class="card-body">
        <p><b>Advanced Balance: </b> <span>0.00</span></p>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <label for="amount2" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount2" name="amount2" />
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <label for="paidto" class="form-label">Paid to</label>
                    <input type="datetime-local" class="form-control" id="paidto" name="paidto" />
                </div>
            </div>
            <div class="col-md-4">
                <label for="paymethod" class="form-label">Payment Method</label>
                <select class="form-select" id="paymethod" name="paymethod" aria-label="Default select example">
                    <option value="-1" selected>Select</option>
                    <option value="1">Cash</option>
                    <option value="2">Card</option>
                    <option value="3">Cheque</option>
                    <option value="3">Bkash</option>
                    <option value="3">Nagad</option>
                </select>
            </div>
            <div class="col-md-4">
                <div>
                    <label for="payaccount" class="form-label">Payment Account</label>
                    <input type="search" class="form-control" id="payaccount" name="payaccount" />
                </div>
            </div>

            <div class="col-md-4">
                <div>
                    <label for="paydate" class="form-label">Payment Date</label>
                    <input type="datetime-local" class="form-control" id="paydate" name="paydate" />
                </div>
            </div>

            <div class="pt-3">
                <label for="paynote" class="form-label">Payment Note</label>
                <textarea class="form-control" name="paynote" id="paynote"></textarea>
            </div>
        </div>
        <hr>
        <div class="text-end">
            <p><b>Advanced Balance: </b> <span>0.00</span></p>
        </div>
    </div>
</div>
<div class=" text-center">
    <button type="button" class="btn btn-success m-2">Save</button>
    <button type="button" class="btn btn-info m-2">Save & Print</button>
</div>

<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
<script>
    $(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search.php",
		minLength: 1
	});				

});
</script>
<!-- <script>
    $(document).ready(function() {
        $('#expenses').DataTable();
    } );
</script> -->
<?= $this->endSection(); ?>
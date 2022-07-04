<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>

<h1>Sales</h1>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="col-md-3 col-sm-6">
                    <h3>Filter</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h5>Location</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5>Customer</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5>Payment Status</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5>Date Range</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-3">
                        <h5>User</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-3">
                        <h5>Shipping Status</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-3">
                        <h4></h4>
                        <h5>Subscriptions</h5>
                        <div class="dropdown content-center">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%">
                                All
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">All Sales</h3>
                <h3 class="card-title"><a href="<?= base_url('/pos'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a></h3>


            </div>
            <div class="card-body">
                <div class="row text-center ">

                    <div class="col-12">
                        <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                        <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                        <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                        <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>


                    </div>

                </div>

                <div class="table-responsive pt-3">
                    <table class="table table-striped table-hover table-bordered border-light table-scroll table-wrap" id="sales">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Action</th>
                                <th>Date</th>
                                <th>Invoice No.</th>
                                <th>Customer name</th>
                                <th>Contact number</th>
                                <th>Location</th>
                                <th>Payment Method</th>
                                <th>Net Total</th>
                                <th>Discount</th>
                                <th>Grand Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale) : ?>
                                <tr>
                                    <td class="d-flex justify-content-center">
                                        <a href="<?= base_url('' . $sale['id']); ?>" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-print"></i></a>
                                        <a href="<?= base_url('' . $sale['id']); ?>" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-file-pdf"></i></a>
                                    </td>
                                    <td><?= $sale['created']; ?></td>
                                    <td><?= $sale['id']; ?></td>
                                    <td><?= $sale['custname']; ?></td>
                                    <td><?= $sale['custmob']; ?></td>
                                    <td><?= $sale['custaddress']; ?></td>
                                    <td><?= $sale['accname']; ?></td>
                                    <td><?= $sale['nettotal']; ?></td>
                                    <td><?= $sale['discount']; ?></td>
                                    <td><?= $sale['grandtotal']; ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>



<?= $this->endSection(); ?>




<?= $this->section('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#sales').DataTable();
    });
</script>
<?= $this->endSection(); ?>
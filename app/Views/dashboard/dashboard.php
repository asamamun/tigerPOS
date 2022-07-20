<?= $this->extend('layouts/default'); ?>

<?= $this->section('contents'); ?>
<div class="row">
    <div class="col-6">
        <h1>Dashboard</h1>
    </div>
    <div class="col-6">
        <div class="dropdown ">
            <button class="btn btn-light dropdown-toggle position-absolute top-50 end-0 translate-middle-y mt-3 " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter By Date
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">Yesterday</a></li>
                <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                <li><a class="dropdown-item" href="#">Last month</a></li>
                <li><a class="dropdown-item" href="#">This month</a></li>
                <li><a class="dropdown-item" href="#">Last 6 Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
                <li><a class="dropdown-item" href="#">last year</a></li>
                <li><a class="dropdown-item" href="#">last Financial year</a></li>
                <li><a class="dropdown-item" href="#">this Financial year</a></li>
                <li><a class="dropdown-item" href="#">Custom Range</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-user-large"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL USER</p>
                        <h4> <?= $totalusers; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-basket-shopping"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL SALES</p>
                        <h4>&#2547; <?= $totalsales; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-cart-shopping"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PURCHASE</p>
                        <h4>&#2547; <?= $totalpurchase; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-circle-dollar-to-slot"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL EXPENSE</p>
                        <h4>&#2547; <?= $totalexpense; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-muted">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-people-carry-box"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL ORDER</p>
                        <h4><?= $totalorder; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-secondary">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-box"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PACKED</p>
                        <h4>&#2547; 12564</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-danger">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-cart-shopping"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">PURCHASE DUE</p>
                        <h4>&#2547; 12564</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3">
        <div class="card bg-light">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center ">
                        <h1 class="mt-2"><i class="fa-solid fa-file-lines"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">INVOICE DUE</p>
                        <h4>&#2547; 12564</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- last 30 days sales -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Sales Last 30 Days</h4>
                <div class="card-options">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="categories">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10-05-2022</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>11-05-2022</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>12-05-2022</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>13-05-2022</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>14-05-2022</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>15-05-2022</td>
                                <td>100000</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Montly sales report -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Monthly Sales Report</h4>
                <div class="card-options">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-csv"></i> CSV</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-excel"></i> Excel</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="categories">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>January</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>February</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>March</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>April</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>May</td>
                                <td>100000</td>
                            </tr>
                            <tr>
                                <td>June</td>
                                <td>100000</td>
                            </tr>

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
    // $(document).ready(function() {
    //     $('#users').DataTable();
    // } );
</script>
<?= $this->endSection(); ?>
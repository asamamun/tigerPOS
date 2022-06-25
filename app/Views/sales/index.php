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
                        <div class="dropdown show">
                            <a class="btn btn-light dropdown-toggle border-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%">
                                All
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5>Customer</h5>
                        <div class="dropdown show">
                            <a class="btn btn-light dropdown-toggle border-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%">
                                All
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5>Payment Status</h5>
                        <div class="dropdown show">
                            <a class="btn btn-light dropdown-toggle border-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%">
                                All
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h5>Date Range</h5>
                        <div class="dropdown show">
                            <a class="btn btn-light dropdown-toggle border-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%">
                                All
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-3">
                        <h5>User</h5>
                        <div class="dropdown show">
                            <a class="btn btn-light dropdown-toggle border-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%">
                                All
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-3">
                        <h5>Shipping Status</h5>
                        <div class="dropdown show">
                            <a class="btn btn-light dropdown-toggle border-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%">
                                All
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mt-3">
                        <h4></h4>
                        <h5>Subscriptions</h5>
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
                <h3 class="card-title"><a href="<?= base_url('/sales/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a></h3>


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
                                <th>#</th>
                                <th>Action</th>
                                <th>Date</th>
                                <th>Invoice No.</th>
                                <th>Customer name</th>
                                <th>Contact number</th>
                                <th>Location</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Total Amount</th>
                                <th>Total Paid</th>
                                <th>Sell Due</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

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
    $(document).ready(function() {
        $('#sales').DataTable();
    });
</script>
<?= $this->endSection(); ?>
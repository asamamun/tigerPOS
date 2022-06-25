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
    <div class="col-md-3">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center">
                        <h1><i class="fa-solid fa-money-check"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PURCHASE</p>
                        <h2>&#2547; 12564</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center">
                        <h1><i class="fa-solid fa-money-check"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PURCHASE</p>
                        <h2>&#2547; 12564</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center">
                        <h1><i class="fa-solid fa-money-check"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PURCHASE</p>
                        <h2>&#2547; 12564</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <div class="card-body text-center">
                        <h1><i class="fa-solid fa-money-check"></i></h1>
                    </div>
                </div>
                <div class="col-9">
                    <div class="card-body">
                        <p class="card-title fw-bold">TOTAL PURCHASE</p>
                        <h2>&#2547; 12564</h2>
                    </div>
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